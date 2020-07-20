<!doctype html>
<html lang="en">
  <head>
    <title>Crear cuenta</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
<body>

<div class="container">

	<?php

	include './Conexion.php';

	
	
	
	$checkuser = "SELECT * FROM usuarios WHERE username = '$_POST[username]' ";

	
	$result = $con-> query($checkuser);

	
	$count = mysqli_num_rows($result);

	
	if ($count == 1) {
	echo '<script type="text/javascript">
              alert( "El Usuario ya existe");
              window.location.href="Frm_Crear_us.php";
              </script>';
	} else {	
                    $nombre = $_POST['nombre'];
                    $username = $_POST['username'];
                    $pass = $_POST['password'];


                    $passHash = password_hash($pass, PASSWORD_DEFAULT);


                    $query = "INSERT INTO usuarios (nombre, username, password) VALUES ('$nombre', '$username', '$passHash')";

                    if (mysqli_query($con, $query))
                    {
                        echo '<script type="text/javascript">
                                alert( "El Usuario creado exitosamente");
                                window.location.href="Frm_Crear_us.php";
                                </script>';
                        
                    } else {
                                    echo "Error: " . $query . "<br>" . mysqli_error($con);
                    }	
	}	
	mysqli_close($con);
	?>
</div>
	
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>