
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            $user = "root";
            $pass = "";
            $server = "localhost";
            $db = "ventas_bd";
            
            $con = mysqli_connect($server,$user,$pass,$db) or die("Error al conectar".mysql_error());
            
           
           
        
        ?>
    </body>
</html>
