#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <errno.h>
#include <fcntl.h>
#include <netdb.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/socket.h>

#include "Main.h"
#include "Comm.h"

int
Init_Comm (char* host,
           int port)
{
    FILE* log;

    char port_str_buf [1024];
    char* port_str = &port_str_buf[0];

    struct addrinfo addr_info_hints;
    struct addrinfo* addr_info_results;
    struct addrinfo* addr_info_result_pres;
    int addr_info_retval;
    
    int socket_fd;
    int socket_flags;
    int socket_fcntl_retval;

    int connect_retval;

    sprintf (port_str, "%d", port);
   
    Print_To_Log ("INFO: Initializing communications.");
    Print_To_Log ("INFO: Using host %s.",
                  host);
    Print_To_Log ("INFO: Using port %s.",
                  port_str);

    memset (&addr_info_hints,
            0,
            sizeof (struct addrinfo));
    addr_info_hints.ai_family = AF_UNSPEC;
    addr_info_hints.ai_socktype = SOCK_STREAM;
    addr_info_hints.ai_protocol = 0;
    addr_info_hints.ai_flags = 0;

    // Get address info structures
    addr_info_retval = getaddrinfo (host,
                                    port_str,
                                    &addr_info_hints,
                                    &addr_info_results);
    if (addr_info_retval != 0)
    {
        Print_To_Log ("ERROR: Could not get address information: %s",
                      gai_strerror (addr_info_retval));
        return -1;
    }

    // Go through address info structures and try connecting
    for (addr_info_result_pres = addr_info_results;
         addr_info_result_pres != NULL;
         addr_info_result_pres = addr_info_result_pres->ai_next)
    {
        socket_fd = socket (addr_info_result_pres->ai_family,
                            addr_info_result_pres->ai_socktype,
                            addr_info_result_pres->ai_protocol);
        if (socket_fd == -1)
        {
            continue;
        }

        connect_retval = connect (socket_fd,
                                  addr_info_result_pres->ai_addr,
                                  addr_info_result_pres->ai_addrlen);
        if (connect_retval != -1)
        {
            break;
        }
    }

    if (addr_info_result_pres == NULL)
    {
        Print_To_Log ("ERROR: Could not establish connection.");
        return -1;
    }

    freeaddrinfo (addr_info_results);

    // Get socket file flags
    socket_flags = fcntl (socket_fd,
                          F_GETFL);
    if (socket_flags == -1)
    {
        Print_To_Log ("ERROR: Could not get socket file flags.");
        return -1;
    }

    // Set socket file flags for nonblocking operations
    socket_fcntl_retval = fcntl (socket_fd,
                                 F_SETFL,
                                 socket_flags | O_NONBLOCK);
    if (socket_fcntl_retval == -1)
    {
        Print_To_Log ("ERROR: Could not set socket file flags.");
        return -1;
    }

    // Open socket
    socket_file = fdopen (socket_fd,
                          "r+");
    if (socket == NULL)
    {
        Print_To_Log ("ERROR: Could not open socket stream.");
        return -1;
    }

    Print_To_Log ("INFO: Communications initialized.");

    return 0;
}
