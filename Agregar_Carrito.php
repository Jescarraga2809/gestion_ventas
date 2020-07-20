<?php
    session_start();
    include("./Conexion.php");
    if(isset($_SESSION['carrito']))
    {
        if(isset($_GET['id_producto']))
        {
            $arreglo = $_SESSION['carrito'];
            $encontro = false;
            $numero = 0;
            for($i=0; $i<count($arreglo); $i++)
            {
                if($arreglo[$i]['Id'] == $_GET['id_producto'])
                {
                    $encontro = true;
                    $numero=$i;
                    
                }
            }
            if($encontro == true)
            {
                $arreglo[$numero]['Cantidad']= $arreglo[$numero]['Cantidad']+1;
                $_SESSION['carrito']=$arreglo;
            }else{
                $nombre = "";
                $precio = "";
                $imagen = "";
                $res = $con-> query("select * from producto where id_producto=".$_GET['id_producto']) or die($conexion ->error);
                $fila = mysqli_fetch_array($res);
                $nombre = $fila[1];
                $precio = $fila[8];
                $imagen = $fila[9];
                $arregloNuevo = array(
                   'Id' => $_GET['id_producto'],
                    'Nombre' => $nombre,
                    'Precio' => $precio,
                    'Imagen' => $imagen,
                    'Cantidad' => 1
                );
                array_push($arreglo,$arregloNuevo);
                $_SESSION['carrito']=$arreglo;
                
                
            }
        }
        
    }else{
        if(isset($_GET['id_producto']))
        {
            $nombre = "";
            $precio = "";
            $imagen = "";
            $res = $con-> query("select * from producto where id_producto=".$_GET['id_producto']) or die($conexion ->error);
            $fila = mysqli_fetch_array($res);
            $nombre = $fila[1];
            $precio = $fila[8];
            $imagen = $fila[9];
            $arreglo[] = array(
               'Id' => $_GET['id_producto'],
                'Nombre' => $nombre,
                'Precio' => $precio,
                'Imagen' => $imagen,
                'Cantidad' => 1
            );
            $_SESSION['carrito']=$arreglo;
        }
    }
    
    
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tienda </title>
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
    
  </head>
  <body>
  
  <div class="site-wrap">
  <?php include("./layouts/header.php");
      include_once './layouts/menu.php';?> 

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Imagen</th>
                    <th class="product-name">Producto</th>
                    <th class="product-price">Precio</th>
                    <th class="product-quantity">Cantidad</th>
                    <th class="product-total">Total</th>
                    
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        $total = 0;
                        if(isset($_SESSION['carrito']))
                        {
                            $arregloCarrito = $_SESSION['carrito'];
                            for ($i = 0; $i<count($arregloCarrito); $i++)
                            {
                                $total = $total + ($arregloCarrito[$i]['Precio']) * ($arregloCarrito[$i]['Cantidad']);
                                
                                
                            
                        
                    
                    ?>
                  <tr>
                    <td class="product-thumbnail">
                        <img src="<?php echo $arregloCarrito[$i]['Imagen']; ?>" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $arregloCarrito[$i]['Nombre']; ?></h2>
                    </td>
                    <td><?php echo $arregloCarrito[$i]['Precio']; ?></td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus btnIncrementar" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center txtCantidad"
                               data-precio="<?php echo $arregloCarrito[$i]['Precio']; ?>"
                               data-id="<?php echo $arregloCarrito[$i]['Id']; ?>"
                                value="<?php echo $arregloCarrito[$i]['Cantidad']; ?>" 
                                placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus btnIncrementar" type="button">&plus;</button>
                        </div>
                      </div>

                    </td>
                    <td class="cant<?php echo $arregloCarrito[$i]['Id']; ?>">$<?php echo $arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad']; ?></td>
                    <td><a href="#" class="btn btn-primary btn-sm btnEliminar"  data-id="<?php echo $arregloCarrito[$i]["Id"]; ?>">X</a></td>
                  </tr>
                    <?php
                            } }
                    ?>
                  
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                  <a href="index.php"> <button class="btn btn-primary btn-sm btn-block">Cancelar</button></a>
              </div>
              <div class="col-md-6">
                  <a href="Catalogo.php"><button class="btn btn-outline-primary btn-sm btn-block" >Sigue Comprando</button></a>
              </div>
            </div>
            
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">VALOR DE TU COMPRA</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                      <strong class="text-black">$<?php echo number_format($total, 0,".",'');  ?></strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$  <?php echo number_format($total, 0,".",'');  ?></strong>
                  </div>
                </div>
                        
                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" data-toggle="modal" data-target="#exampleModal" >REALIZA TU COMPRA</button>
                    
                     
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="container">
                                                        <table  >
                                                               <tbody>
                                                                    <tr >
                                                                        <td><img src="img/bancolombia.jpg" width="90px" height="70px" /></td>
                                                                        <td><img src="img/PSE.png" width="90px" height="70px" /></td>
                                                                        <td><img src="img/efecty.png" width="90px" height="70px" /></td>
                                                                        <td><img src="img/codensa.png" width="90px" height="70px" /></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="4"><center><h5 class="modal-title" id="exampleModalLabel">ELECTRODOMESTICOSYA!</h5></center></td>
                                                                    </tr>
                                                                </tbody>
                                                        </table>                                                             
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        
                                                        <section id="sect3">
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="col-form-label">Nombre</label>
                                                                <input type="text" class="form-control" id="recipient-name">
                                                            
                                                           
                                                                <label for="recipient-name" class="col-form-label">E-mail</label>
                                                                <input type="text" class="form-control" id="recipient-name">
                                                            
                                                            
                                                                <label for="recipient-name" class="col-form-label">Dirección</label>
                                                                <input type="text" class="form-control" id="recipient-name">
                                                            
                                                            
                                                                <label for="recipient-name" class="col-form-label">Teléfono</label>
                                                                <input type="text" class="form-control" id="recipient-name">
                                                                
                                                                <label for="recipient-name" class="col-form-label">N Cuenta</label>
                                                                <input type="text" class="form-control" id="recipient-name">
                                                            </div>
                                                        </section>
                                                        <div class="modal-footer">
                                                            <a href="index.php"><button type="button" class="btn btn-primary">Comprar</button> </a>
                                                            
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                       
                                                         
                                                    </div>
                                                    
                                                    
                                                </div>
                                                                             
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                    </div>
                </div>
              </div>
               
            </div>
          </div>
        </div>
      </div>
    </div>

   
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
  <script>
      $(document).ready(function (){
          $(".btnEliminar").click(function (event){
              event.preventDefault();
              var id_producto = $(this).data('id');
              $.ajax({
                  method:'POST',
                  url:'./eliminar_prod_car.php',
                  data:{
                     id:id;
                  }             
                }).done(function (respuesta){
                    boton.parent('td').parent('tr').remove();
                });
          });
          $(".txtCantidad").keyup(function (){
             var cantidad = $(this).val();
              var precio = $(this).data('precio');
              var id = $(this).data('id'); 
              incrementar(cantidad,precio,id);
          });
          $(".btnIncrementar").click(function() {
              var precio =$(this).parent('div').parent('div').find('input').data('precio');
              var id =$(this).parent('div').parent('div').find('input').data('id');
              var cantidad =$(this).parent('div').parent('div').find('input').val();
              incrementar(cantidad,precio,id);
})
          function incrementar(cantidad, precio, id){
              var mult = parseFloat(cantidad) * parseFloat(precio);
              $(".cant"+id).text("$"+mult);
              $.ajax({
                  method:'POST',
                  url:'./actualizar.php',
                  data:{
                     id:id,
                     cantidad:cantidad,
                  }             
                }).done(function (respuesta){
                    
                });
          }
      });
  </script>
      
  
  
  </body>
</html>