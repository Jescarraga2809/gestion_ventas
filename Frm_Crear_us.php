<html>
    <head>
        <title>Registros</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="stilos.css" type="text/css" />
    </head>
    <body>

   <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
                               
       <a class="navbar-brand" href="Index.php">Inicio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="Catalogo.php">Catalogo</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Categorias
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="Lavadoras.php">Lavadoras</a>
                            <a class="dropdown-item" href="Estufas.php">Estufas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="Neveras.php">Neveras</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ingresar_datos_bd.php">Ingreso Producto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Frm_Crear_us.php">Crear Usuario</a>
                    </li>
                    

                </ul>
                
            </div>
        </nav>
        
        <div id="contenedor1">
            <div id="contenid">
                <div class="container">
                    <div class="col-12"> <center><h1>Crear Usuario</h1></center>
                        <div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1></h1>
				<p></p>		
			</div>
	</div>
	
	<div class="row">	
		<div class="col-sm-12 col-md-6 col-lg-6">
		
		
		
                <form method="post" action="crear_cuenta.php" method="POST">
			<div class="form-group">				
				<input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre" required>			
		  </div>
		  
		  <div class="form-group">				
				<input type="username" class="form-control" name="username" aria-describedby="emailHelp" placeholder="Ingrese su Usuario" required>
			</div>
		  
		  <div class="form-group">				
				<input type="password" class="form-control" name="password" placeholder="Crear contraseña" required>
			</div>
		  
		  <button type="submit" class="btn btn-success btn-block">Enviar</button>
		</form>		
		</div>		
		
	</div>
</div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
    
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
</body>
</html>

