<?php
    $host = "127.0.0.1";
    $port = 5353;
    set_time_limit(0);

    $sock = socket_create(AF_INET,SOCK_STREAM, 0) or die("Could not create socket! 😢\n");
    $result = socket_bind($sock, $host, $port) or die("Could not bind the socket! 😢\n");


    $result = socket_listen($sock, 3) or die("Could not set up the socket listener! 😢\n");
    echo"listening for connections";

    class Communicate{
        function readline(){
            return rtrim(fgets(STDIN));
        }
    }

    do
    {
        $accept = socket_accept($sock) or die("Could not accept incoming connection!");
        $msg = socket_read($accept,1024) or die("Could not read the input\n");

        $msg = trim($msg);
        echo "Client says:\t".$msg."\n\n";

        $line = new Communicate();
        echo "Enter Reply:\t";
        $reply = $line->readline();

        socket_write($accept, $reply, strlen($reply)) or die("Could not write output!");

    }while(true);{
        socket_close($accept,$sock);
    }

?>