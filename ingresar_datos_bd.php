
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
                            <a class="dropdown-item" href="Neveras.php">Neveras</a>
                            <a class="dropdown-item" href="Estufas.php">Estufas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="Lavadoras.php">Lavadoras</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ingresar_datos_bd.php">Ingreso Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Frm_Crear_us.php">Crear Usuarios</a>
                    </li>
                    

                </ul>
                
            </div>
        </nav>
        
        <div id="contenedor1">
            <div id="contenid">
                <div class="container">
                    <div class="col-12"> <center><h1>Ingreso Productos</h1></center>
                        <form method="POST" enctype="multipart/form-data" action="ingresar_datos_bd.php" >
                            
                       
                    
                            <div class="row">

                                    <div class="col-3">
                                            <label for="doc">Nombre</label>
                                            <input type="text" name="nombre" class="form-control" id="nombre" >
                                    </div>

                                    <div class="col-3">
                                           <label for="doc">Marca</label>
                                           <select id="categoria" name="marca" class="form-control" id="marca">
                                           <option value="0">Seleccione: </option>
                                            <?php
                                                include "./Conexion.php";
                                                $m_marca = mysqli_query($con, "Select * from marca");
                                                while ($valor = mysqli_fetch_array($m_marca)){
                                                    echo '<option value="'.$valor[id_marca].'">'.$valor[nombre_marca].'</option>';
                                                }
                                            ?>
                                                                               
                                    </select> 
                                    </div>
                                    <div class="col-3">
                                        <label for="doc">Referencia</label>
                                        <input type="text" name="referencia" class="form-control" id="referencia" >
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="doc">Capacidad</label>
                                    <input type="text" name="capacidad" class="form-control" id="capacidad" >
                                </div>
                                <div class="col-3">
                                    <label for="nombre">Panel de control </label>
                                    <input type="text"  name="panel_control" class="form-control" id="panel_control" >
                                </div>
                                <div class="col-3">
                                    <label for="doc">Color</label>
                                    <input type="text" name="color" class="form-control" id="color">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="doc">Garantía</label>
                                    <input type="text" name="garantia" class="form-control" id="garantia">
                                </div>
                                <div class="col-3">
                                    <label for="dir">Valor</label>
                                    <input type="text" name="valor" class="form-control" id="valor">
                                </div>
                                <div class="col-3">
                                    <label for="doc">Categoria</label>
                                    
                                    <select id="categoria" name="t_p" class="form-control" id="t_p">
                                       <option value="0">Seleccione: </option>
                                       <?php
                                       include "./Conexion.php";
                                       $mostrar = mysqli_query($con, "Select * from tipo_producto");
                                            while ($valores = mysqli_fetch_array($mostrar)){
                                                echo '<option value="'.$valores[id_tipo_producto].'">'.$valores[nombre_tip_prod].'</option>';
                                            }
                                       ?>
                                                                               
                                    </select> 
                                    
                                    
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    
                                </div> 
                                <div class="col-4">
                                    <label for="nombre">Imagen </label>
                                    <input type="file"  name="imagen" class="form-control" id="imagen" >
                                </div>
                                
                            </div>
                            <center>
                                <input data-toggle="modal" data-target="#exampleModal" type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
                            </center>
                        </form>
                    </div>
                    <br>
                    <br>
                    
                    <?php
                            include("Conexion.php");
                                if(isset($_POST['btn_registrar']))
                                    {         
                                        $id = 'null';
                                        $nombre    =filter_input(INPUT_POST, "nombre");
                                        $marca    =filter_input(INPUT_POST, "marca");
                                        $referencia    =filter_input(INPUT_POST, "referencia");
                                        $capacidad    =filter_input(INPUT_POST, "capacidad");
                                        $panel    =filter_input(INPUT_POST, "panel_control");
                                        $color    =filter_input(INPUT_POST, "color");
                                        $garantia    =filter_input(INPUT_POST, "garantia");
                                        $valor    =filter_input(INPUT_POST, "valor");
                                        $t_p   =filter_input(INPUT_POST, "t_p");
                                        
                                        $imagen = $_FILES["imagen"]["name"];
                                        $ruta=$_FILES["imagen"]["tmp_name"];
                                        $destino = "img/".$imagen;
                                        copy($ruta, $destino);

                                        $insertar = "INSERT INTO producto  (id_producto, nombre_prod, marca, referencia_prod, capacidad, panel_control, color, garantia, valor, imagen, id_tipo_producto )         
                                                values 
                                                    ('$id','$nombre','$marca', '$referencia','$capacidad','$panel','$color','$garantia','$valor','$destino', '$t_p');";
                                        $execute = mysqli_query($con, $insertar);
                                        if (!$execute){
                                            echo 'error al ingresar datos'. mysqli_error($con);
                                        }else{
                                            echo '<script type="text/javascript">
                                            alert( "Datos almacenado correctamente");
                                            window.location.href="ingresar_datos_bd.php";
                                            </script>'
                                            
                                            ;
                                           
                                            
                                             mysqli_close($con);
                                        }
                                           
                                           
                                        }
                                        
                                ?>
                            <div class="col-md-4"></div>
                </div>
            </div>
        </div>
    
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
</body>
</html>
