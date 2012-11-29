#include <stdio.h>
#include <time.h>
#include <string.h>

int
main (void)
{
    time_t current_time;
    char current_time_buf [1024];
    char* current_time_str = &current_time_buf[0];
    char* current_time_newline = NULL;

    current_time = time (NULL);
    current_time_str = ctime (&current_time);

    // Get rid of newline in time string
    if ( (current_time_newline = strchr (current_time_str, '\n')) != NULL)
    {
        *current_time_newline = '\0';
    }

    printf ("Content-Type: text/javascript\n\n");
    printf ("CurrentTime=\"%s\";\n\n", current_time_str);

    return 0;
}
