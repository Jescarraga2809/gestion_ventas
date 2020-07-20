<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styl.css">
    
    
  </head>
  <body>
  
  
    <?php 
    include_once './layouts/carrusel.php';
    include_once './layouts/menu.php';
    include("./layouts/header.php");?> 
      

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">

            
            <div class="row mb-5">
                <?php
                
                    include_once('./conexion.php');
                    $resultado = mysqli_query($con, "SELECT id_producto, nombre_prod, valor, imagen FROM producto ");
                    while($fila = mysqli_fetch_array($resultado))
                    {

                    

                ?>
              <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border" >
                  <figure class="block-4-image ">
                      <a href="Detalles.php?id_producto=<?php echo $fila['id_producto']; ?>"><img src="<?php echo $fila['imagen'];  ?>" class="img-fluid"></a>
                  </figure>
                  <div class="block-4-text p-4">
                      <h3><a href="Detalles.php?id_producto=<?php echo $fila['id_producto']; ?>"><?php echo $fila['nombre_prod']; ?></a></h3>
                    
                    <p class="text-primary font-weight-bold">$<?php echo $fila['valor']; ?></p>
                  </div>
                </div>
              </div>

                      <?php
                          }
                      ?>
            


            </div>
            
          </div>

          <div class="col-md-3 order-1 mb-5 mb-md-0">
              <?php include("./layouts/categorias_derecha.php"); ?> 

              

            </div>
          </div>
        </div>

        <div class="row">
          <?php include("./layouts/Categorias_Final.php"); ?> 
        </div>
        
      </div>
    </div>
    <?php include("./layouts/header.php"); ?> 

    
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>