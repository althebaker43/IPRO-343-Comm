#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <errno.h>
#include <netdb.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/socket.h>

#include "Main.h"

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

    int connect_retval;

    sprintf (port_str, "%d", port);
   
    fprintf (log,
             "INFO: Initializing communications.\n");
    fprintf (log,
             "INFO: Using host %s.\n",
             host);
    fprintf (log,
             "INFO: Using port %s.\n",
             port_str);

    memset (&addr_info_hints,
            0,
            sizeof (struct addrinfo));
    addr_info_hints.ai_family = AF_UNSPEC;
    addr_info_hints.ai_socktype = SOCK_STREAM;
    addr_info_hints.ai_protocol = 0;
    addr_info_hints.ai_flags = 0;

    addr_info_retval = getaddrinfo (host,
                                    port_str,
                                    &addr_info_hints,
                                    &addr_info_results);
    
    if (addr_info_retval != 0)
    {
        fprintf (log,
                 "ERROR: Could not get address information: %s\n",
                 gai_strerror (addr_info_retval));
        exit (EXIT_FAILURE);
    }

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
        fprintf (log,
                 "ERROR: Could not establish connection.\n");
        exit (EXIT_FAILURE);
    }

    freeaddrinfo (addr_info_results);

    fprintf (log,
             "INFO: Communications initialized.\n");

    return 0;
}
