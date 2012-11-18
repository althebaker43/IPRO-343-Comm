import java.io.*;
import java.net.ServerSocket;

class JServerSocketTest
{
    public static void main (String[] args)
    {
        int server_sock_port = 4000;
        ServerSocket server_sock = null;

        System.out.println ("INFO: Starting Server Socket Test...");
        System.out.printf ("INFO: Using socket %d\n", server_sock_port);

        try
        {
            server_sock = new ServerSocket (server_sock_port);
        }
        catch (IOException ioexcp)
        {
            System.err.println ("ERROR: IO Exception occurred while opening the socket.");
            System.exit (-1);
        }

        if (server_sock != null)
        {
            System.out.println ("INFO: Waiting to accept connection...");
            try
            {
                server_sock.accept();
            }
            catch (IOException ioexcp)
            {
                System.err.println ("ERROR: IO exception occurred while accepting connection.");
                System.exit (-1);
            }
            System.out.println ("INFO: Connection accepted!");
        }

        System.out.println ("INFO: Finished Server Socket Test.");
    }
}
