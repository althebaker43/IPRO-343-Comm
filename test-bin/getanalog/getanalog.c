#include <stdio.h>

int
main (void)
{
    FILE* ain2;
    int ain2_value = 0;
    const char* ain2_path = "/sys/devices/platform/omap/tsc/ain2";
    const char* ain2_mode = "r";
    int ain2_scanf_retval = EOF;
    
    printf ("Content-Type: text/javascript\n\n");

    ain2 = fopen (ain2_path,
                  ain2_mode);
    if (ain2 == NULL)
    {
        printf ("AnalogValue=\"NA\";\n\n");
        return -1;
    }

    ain2_scanf_retval = fscanf (ain2,
                                "%d",
                                &ain2_value);
    if (ain2_scanf_retval == EOF)
    {
        printf ("AnalogValue=\"NA\";\n\n");
        return -1;
    }

    printf ("AnalogValue=\"%d\";\n\n",
            ain2_value);

    return 0;
}
