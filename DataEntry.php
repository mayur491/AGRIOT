<html>
    <body bgcolor="6688cc">
        <?php
        $user = 'root';
        $pass = '';
        $db = 'agridb';

        $con = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

        //echo"Great Work!!!<br>";
        //$a = $_POST['Id'];
        $b = $_POST['Country'];
        $c = $_POST['Station'];
        $d = $_POST['Altitude'];
        $e = $_POST['Latitude'];
        $f = $_POST['Lat'];
        $g = $_POST['Longitude'];
        $h = $_POST['Lon'];

        //echo $a," ",$b," ",$c,"<br>",

        $sql = "INSERT INTO data (Id,Country,Station,Altitude,Latitude,Lat,Longitude,Lon) VALUES (NULL,'$b','$c','$d','$e','$f','$g','$h')";

        if (!mysqli_query($con, $sql)) {
            echo 'Not Inserted';
        } else {
            ?> <center><h4> <?php
            //echo 'Inserted';
            ?>
            </h4><br><img src="images/thankyou.jpg" alt="Smiley face" height=500 width=700>
        </center>
                    <?php
                }

                header("refresh:1; url=DataEntry.html");
                ?>
</body>
</html>