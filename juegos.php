<?php
session_start();
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grafik Games</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="icon" href="imgs/logoGrafikGames.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        body{
          background-image: url(imgs/background.png);
        }
        h2,h4{
          color: white;
          text-align: center;
        }
        a{
          color: white;
        }
        .img{
          display: block;
          margin-left: auto;
          margin-right: auto;
          width:3em;
        }
        #cuenta{
          color: rgba(255, 255, 255, 0.9);
          font-size: 20px;
          font-weight: 500;
          padding: 0.5em 1.2em;
          background-color: rgba(0, 0, 255, 0);
          border: none;
          position: relative;
        }

        #cuenta:hover {
          color: rgba(255, 255, 255, 1);
          transition: all 0.2s ease;
        }
        a{
          color: white;
          text-decoration: none;
        }
        a:hover{
          color: white;
        }
        li,h3,p{
          color: white;
        }
        #foro{
          overflow: auto;
          height: 24.5em;
        }
        .autocomplete {
          position: relative;
          display: inline-block;
        }

        input {
          border: 1px solid transparent;
          background-color: #f1f1f1;
          padding: 10px;
          font-size: 16px;
        }

        input[type=text] {
          background-color: #f1f1f1;
          width: 100%;
        }

        input[type=submit] {
          background-color: DodgerBlue;
          color: #fff;
          cursor: pointer;
        }

        .autocomplete-items {
          position: absolute;
          border: 1px solid #d4d4d4;
          border-bottom: none;
          border-top: none;
          z-index: 99;
          /*position the autocomplete items to be the same width as the container:*/
          top: 100%;
          left: 0;
          right: 0;
        }

        .autocomplete-items div {
          padding: 10px;
          cursor: pointer;
          background-color: #fff; 
          border-bottom: 1px solid #d4d4d4; 
        }

        /*when hovering an item:*/
        .autocomplete-items div:hover {
          background-color: #e9e9e9; 
        }

        /*when navigating through the items using the arrow keys:*/
        .autocomplete-active {
          background-color: DodgerBlue !important; 
          color: #ffffff; 
        }
        .btn-cyan{
          background-color: transparent;
          border: solid cyan;
          color:white
        }
        .btn-cyan:hover{
            background-color: cyan;
            color:black
        }
        .btn-purple{
          background-color: rgb(255, 0, 255);
        }
        .cart-container{
            color: white;
        }
        .modal-body{
            background-image: url(imgs/background.png);
        }
        .card-body{
          background-color: black;
        }
        .card-img-top{
          width: 100%;
          height: 215px;
        }
        .perfil{
          width:60px;
          height:60px;
        }
        .btn-menu,.btn-menu:hover{
          background-color: cyan;
        }
    </style>
  </head>
  <body onload="cargar()">
    <div class="container mt-3">
        <!-- <?php
        //include "header.php";
        ?> -->
        <div class="row  align-items-center"><!--header-->
            <div class="col col-lg-2 d-none d-md-block"> <img src="imgs/logoGrafikGames (1).png" alt="Logo"></div><!--logo-->

            <div class="col col-lg-8 text-center"><img src="imgs/GrafikLetras.png" alt="Logo 2"></div><!--Nombre-->
            <div class="col col-lg-2 text-center">
                          <?php
                            if(isset($_SESSION["Usuario"])){
                              echo '<figure class="figure">';
                              echo '<img src="'.$_SESSION["ImagenUsuario"].'" class="figure-img img-fluid rounded-5 perfil" alt="imagen usuario">';
                              echo '<figcaption class="figure-caption"><h3>'.$_SESSION["Usuario"].'</h3></figcaption>';
                              echo '<div class="row  align-items-center">';
                              if($_SESSION["tipo"]=="Administrador"){
                                  echo '
                                  <div class="dropdown">
                                  <button class="btn btn-menu dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Menu Administrador
                                  </button>
                                  <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="?cookiedestroy">Cerrar Sesion</a></li>
                                    <li><a class="dropdown-item" href="Administracion.php">Administrar Usuarios</a></li>
                                  </ul>
                                </div>
                                  ';                                    
                              }else{
                                echo '
                                <div class="dropdown">
                                <button class="btn btn-menu dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Menu Usuario
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                  <li><a class="dropdown-item" href="?cookiedestroy">Cerrar Sesion</a></li>
                                  <li><a class="dropdown-item" href="Perfil.php">Administrar Perfil</a></li>
                                  <li><a class="dropdown-item" href="pedidos.php">Pedidos</a></li>
                                </ul>
                              </div>
                                ';                                  
                              };
                              echo '</div>';
                              echo '</figure>';
                          }else{
                                echo '<figure class="figure">';
                                echo '<a href="Login.php"><img src="imgs/Login.png" class="figure-img img-fluid rounded" alt="imagen usuario"></a>';
                                echo '<figcaption class="figure-caption"><button id="cuenta"><a href="Login.php">Login</a></button></figcaption>';
                                echo '</figure>';
                            }
                            if(isset($_GET["cookiedestroy"])){
                                session_destroy();
                                //setcookie("Usuario","",time()-3600,"/");
                                //setcookie("ImagenUsuario","",time()-3600,"/");
                                echo "<script>window.location.href='home.php'</script>";
                            }
                          ?>
            </div>
        </div>
        <div class="row"><!--Navegador-->
            
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="home.php">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="juegos.php">Tienda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Workshop
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a href="workshop.php" class="dropdown-item">Ver Mods</a></li>
                            <li><a href="uploadmods.php" class="dropdown-item">Subir tus Mods</a></li>
                        </ul>
                      </li>
                  </ul>
                  <form action="CONTROL/buscar.php" method="POST" autocomplete="on" class="d-flex">
                    <div class="autocomplete" style="width:300px;">
                    <input  id="buscar" type="text" name="buscar" class=" form-control me-2 h-100" placeholder="Busqueda">
                    </div>
                    <button id="btnbusqueda" type="submit" name="busqueda" class="btn btn-outline-success" style="margin-left: 1em;">Buscar</button>
                    <a href="cart.php">
                      <img src="imgs/shopping-cart.png" alt="Carrito">
                      <span class="badge text-bg-primary" id="cartitems">
                      <?php 
                        //echo (isset($_SESSION['cart_items']) && count($_SESSION['cart_items'])) > 0 ? count($_SESSION['cart_items']):'';
                        if(isset($_SESSION['cart_items']) && count($_SESSION['cart_items'])>0){
                          echo count($_SESSION['cart_items']);
                        }else{
                          echo 0;
                        }
                      ?>
                    </span>
                  </a>
                </form>
                </div>
              </nav>
        </div>

        <div class="collapse" id="carrito"><!--Carrito-->
        <div class="row border-top">
            <div class="col mt-5">
                <div class="cart-container d-flex flex-column">
                    <h2>Carrito</h2>
                    <table>
                      <thead>
                        <tr>
                        <th><strong>Producto</strong></th>
                        <th><strong>Precio</strong></th>
                      </tr>
                      </thead>
                      <tbody id="carttable">
                      </tbody>
                    </table>
                    <hr>
                    <table id="carttotals">
                      <tr>
                        <td><strong>Productos</strong></td>
                        <td><strong>Total</strong></td>
                      </tr>
                      <tr>
                        <td>x <span id="itemsquantity">0</span></td>
                       
                        <td><span id="total">0</span>€</td>
                      </tr></table>
            
                      
                    <div class="cart-buttons d-flex justify-content-center">  
                      <button id="emptycart" class="btn btn-purple">Vaciar Carrito</button>
                      <button id="checkout"  class="btn btn-cyan">Pagar</button>
                    </div>
                  </div>
            </div>
        </div>
        </div>


    <div id="cuerpo" class="row justify-content-center border-top mt-5">
        <?php
                if(isset($_GET['error'])&& $_GET['error']==1){
                  echo '<h4 style="color:red" class="text-center mt-3">El campo de busqueda esta vacio</h4>';
                }
                if(isset($_GET['error'])&& $_GET['error']==2){
                  echo '<h4 style="color:red" class="text-center mt-3">No hemos encontrado el juego que has introducido</h4>';
                }
        require_once('MODELO/config.php');
        if(isset($_GET['buscar'])){
          $sql = "SELECT * FROM juegos WHERE nombre= '".$_GET["buscar"]."';";
          $handle = $db->prepare($sql);
          $handle->execute();
          $getAllProducts = $handle->fetchAll(PDO::FETCH_ASSOC);
          foreach($getAllProducts as $product){
              $imgUrl = $product["imagen"];
          ?>
          <div id="<?php echo $product["id"];?>" class="col-md-5 mt-5 d-flex align-items-stretch">
                  <div class="card">
                      <a href="juego.php?juego=<?php echo $product['id']?>">
                          <img class="card-img-top" src="<?php echo $imgUrl ?>" alt="<?php echo $product['nombre'] ?>">
                      </a>
                      <div class="card-body rounded-2">
                          <h5 class="card-title">
                              <a href="juego.php?juego=<?php echo $product['id'] ?>">
                                  <?php echo $product['nombre']; ?>
                              </a>
                          </h5>

                          <p class="card-t">
                              <?php echo substr($product['descripcion'],0,100) ?> ...
                          </p>
                          <a href="juego.php?juego=<?php echo $product['id']?>">
                                  <button class="btn btn-cyan btn-sm w-100">Ver</button>
                              </a>
                      </div>
                  </div>
              </div>
          <?php
          }
        }else{
          $sql = "SELECT * FROM juegos";
          $handle = $db->prepare($sql);
          $handle->execute();
          $getAllProducts = $handle->fetchAll(PDO::FETCH_ASSOC);
          foreach($getAllProducts as $product){
              $imgUrl = $product["imagen"];
        ?>
                  <div id="<?php echo $product["id"];?>" class="col-md-3 mt-5 d-flex align-items-stretch">
                  <div class="card">
                      <a href="juego.php?juego=<?php echo $product['id']?>">
                          <img class="card-img-top" src="<?php echo $imgUrl ?>" alt="<?php echo $product['nombre'] ?>">
                      </a>
                      <div class="card-body rounded-2">
                          <h5 class="card-title">
                              <a href="juego.php?juego=<?php echo $product['id'] ?>">
                                  <?php echo $product['nombre']; ?>
                              </a>
                          </h5>

                          <p class="card-text">
                              <?php echo substr($product['descripcion'],0,100) ?> ...
                          </p>
                              <a href="juego.php?juego=<?php echo $product['id']?>">
                                  <button class="btn btn-cyan btn-sm w-100">Ver</button>
                              </a>
                      </div>
                  </div>
              </div>
        <?php
        }}
        ?>
        
    </div>
                
        <?php
        include "footer.php";
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="js/tienda.js"></script>
    <script src="js/cart.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- <script src="js/carrito.js"></script> -->
 </body>
</html>