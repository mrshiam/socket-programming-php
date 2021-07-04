<html>
    <body>
        <div align="center">
            <form method="POST">
                <table>
                    <tr>
                        <td>
                            <label>Enter Your Message✍</label>
                            <input type="text" name="textMessage">
                            <input type="submit" name="btn" value="Send">
                        </td>
                    </tr>
                    <?php 
                        $host = "127.0.0.1";
                        $port = 5353;

                        if(isset($_POST['btn'])){
                            $msg = $_REQUEST['textMessage'];
                            $sock = socket_create(AF_INET,SOCK_STREAM, 0);
                            
                            socket_connect($sock, $host, $port);

                            socket_write($sock, $msg, strlen($msg));

                            $reply = socket_read($sock, 1924);
                            $reply = trim($reply);
                            $reply = "server says:\t".$reply;
                        }
                    
                    ?>
                    <tr>
                        <td>
                            <textarea rows="10" cols="20">
                                <?php echo @$reply; ?>
                            </textarea>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>

</html>