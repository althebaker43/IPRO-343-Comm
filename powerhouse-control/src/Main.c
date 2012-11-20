#include <stdio.h>
#include <stdarg.h>
#include <string.h>

#include "Main.h"

#define LOG_BUFSIZE 1024

void
Print_To_Log (const char* format,
              ...)
{
    va_list arg_p;

    char log_entry_buf [LOG_BUFSIZE];
    int log_entry_pos = 0;

    log_entry_pos = sprintf (&log_entry_buf[log_entry_pos],
                             "[");
    log_entry_pos = sprintf (&log_entry_buf[log_entry_pos],
                             "] : ");
                             

    int log_fprint_retval;
    
    va_start (arg_p,
              format);

    log_entry_pos = vsprintf (&log_entry_buf[log_entry_pos],
                              format,
                              arg_p);
    
    va_end (arg_p);

    log_fprint_retval = fprintf (log_file,
                                 &log_entry_buf[0]);

    return;
}
