#include <stdio.h>

int main ()
{
    FILE* outfile = NULL;
    const char* outfile_mode = "w";
    const char* outfile_content = "Hello, world!";

    printf( "Starting streamtest...\n" );

    outfile = fopen ("test.txt", 
                     outfile_mode);

    if (outfile == NULL)
    {
        printf( "ERROR: Could not open output file.\n" );
        return -1;
    }

    fprintf (outfile,
             "%s",
             outfile_content);

    fclose (outfile);

    printf ("Finished streamtest.\n");

    return 0;
}
