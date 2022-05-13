<html>
    <head>
        <title> display image </title>
    </head>
    <body>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <thead>
                    <tr>
                        <th> image </th>
                        <th> image </th>
                    </tr>
                </thead>
                <?php

                    if( empty(session_id()) && !headers_sent()){
                        session_start();
                    }
                    echo "ayaaaa";
                    require_once 'connect.php';
                    echo "ya mosahel";
                    $db = new connect();
                    echo "aaaaaaaaaaa";
                    $conn = $db->connection();

                    echo "yaraaaaaaab";

                    $query = "select * from car";
                    $query_run = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_array($query_run))
                    {
                        ?>
                        <tr>
                            <td>
                                <?php echo '<img src="data:image;base64, '.base64_encode($row ['image']).'" alt = "image" style="width:300px; height:300px;">'; ?>
                            </td>
                        </tr>

                        <?php
                    }
                ?>
            </table>
        </form>
    </body>
</html>