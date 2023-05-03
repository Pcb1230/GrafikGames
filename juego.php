<?php 
    session_start();
    require_once('MODELO/config.php');    
    
    if(isset($_GET['juego']) && !empty($_GET['juego']) && is_numeric($_GET['juego']))
    {
        $sql = "SELECT * from juegos WHERE id =:productID";
        $handle = $db->prepare($sql);
        $params = [
                ':productID' =>$_GET['juego'],
            ];
        $handle->execute($params);
        if($handle->rowCount() == 1 )
        {
            $getProductData = $handle->fetch(PDO::FETCH_ASSOC);
            $imgUrl = $getProductData["imagen"];
        }
        else
        {
            $error = '404! No record found';
        }

    }
    else
    {
        $error = '404! No record found';
    }

    if(isset($_POST['add_to_cart']) && $_POST['add_to_cart'] == 'add to cart')
    {
        $productID = $_POST['product_id'];
        $productQty = $_POST['product_qty'];
        
        $sql = "SELECT * from juegos WHERE id =:productID";

        $prepare = $db->prepare($sql);
        
        $params = [
                ':productID' =>$productID,
            ];
        
        $prepare->execute($params);
        $fetchProduct = $prepare->fetch(PDO::FETCH_ASSOC);

        $calculateTotalPrice = number_format($productQty * $fetchProduct['precio'],2);
        
        $cartArray = [
            'product_id' =>$productID,
            'qty' => $productQty,
            'product_name' =>$fetchProduct['nombre'],
            'product_price' => $fetchProduct['precio'],
            'total_price' => $calculateTotalPrice,
            'imagen' =>$fetchProduct['imagen']
        ];
        
        if(isset($_SESSION['cart_items']) && !empty($_SESSION['cart_items']))
        {
            $productIDs = [];
            foreach($_SESSION['cart_items'] as $cartKey => $cartItem)
            {
                $productIDs[] = $cartItem['product_id'];
                if($cartItem['product_id'] == $productID)
                {
                    $_SESSION['cart_items'][$cartKey]['qty'] = $productQty;
                    $_SESSION['cart_items'][$cartKey]['total_price'] = $calculateTotalPrice;
                    break;
                }
            }

            if(!in_array($productID,$productIDs))
            {
                $_SESSION['cart_items'][]= $cartArray;
            }

            $successMsg = true;
            
        }
        else
        {
            $_SESSION['cart_items'][]= $cartArray;
            $successMsg = true;
        }

    }
	
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
        p,h5{
            color: white;
        }
        body{
          background-image: url(imgs/background.png);
        }
        .btn-menu,.btn-menu:hover{
          background-color: cyan;
        }
        .perfil{
          width:60px;
          height:60px;
        }
        h2,h4,h1{
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
        .cart-container{
            color: white;
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
        .modal-body{
            background-image: url(imgs/background.png);
        }
        .card-body{
          background-color: black;
        }
    </style>
  </head>
  <body onload="cargar()">
    <div class="container mt-3">
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



        <?php if(isset($getProductData) && is_array($getProductData)){?>
      <?php if(isset($successMsg) && $successMsg == true){?>
            <div class="row mt-3">
                <div class="col-md-12">
                    <!-- <div class="alert alert-success alert-dismissible">
                         <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <img src="<?php echo $imgUrl ?>" class="rounded img-thumbnail mr-2" style="width:150px;"><?php echo $getProductData['nombre']?> se ha añadido al carrito. <a href="cart.php" class="alert-link">Ver Carrito</a>
                    </div> -->
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <img src="<?php echo $imgUrl ?>" class="rounded img-thumbnail mr-2" style="width:150px;"><?php echo $getProductData['nombre']?> se ha añadido al carrito. <a href="cart.php" class="alert-link">Ver Carrito</a>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
         <?php }?>
        <div id="cuerpo" class="row border-top mt-5"><!--Cuerpo de la pagina-->
        <div id="alerts" style="color: white;"></div>
            <div class="col-8 mt-5"><!--Carrousel-->
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="<?php echo $getProductData['carousel-1']?>" class="d-flex w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="<?php echo $getProductData['Carousel-2']?>" class="d-flex w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="<?php echo $getProductData['Carousel-3']?>" class="d-flex w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="<?php echo $getProductData['Carousel-4']?>" class="d-flex w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="<?php echo $getProductData['Carousel-5']?>" class="d-flex w-100">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            <div class="col-4 mt-5"><!--INFO Producto-->
                <img class="img-thumbnail" src="<?php echo $imgUrl;?>">
                <h2 class="productname"><?php echo $getProductData['nombre']?></h2>
                <p class="mt-5"><?php echo $getProductData['informacion']?></p>
                <form class="form-inline" method="POST">
                  <div class="row">
                    <div class="col-2"><h5 class="price"><?php echo $getProductData['precio']?>€</h5></div>
                    <div class="col-3"><input type="number" name="product_qty" id="productQty" class="form-control" placeholder="Quantity" min="1" max="1000" value="1">
                        <input type="hidden" name="product_id" value="<?php echo $getProductData['id']?>"></div>
                  </div>
                    <div class="form-group mb-2 ml-2 mt-3">
                        <button type="submit" class="btn btn-cyan" name="add_to_cart" value="add to cart">Añadir al Carrito</button>
                    </div>
                </form>
                <!-- <h5 class="price"><?php echo $getProductData['precio']?>€
                  <input class=" mx-5" id="cantidad" type="number" min="1" max="5" value="1">
                </h5>
                <button class="addtocart btn btn-cyan">Comprar</button> -->
            </div>
            <div class="col-12 mt-5"><!--Descripcion-->
                <h5 class="border-bottom">ACERCA DE ESTE JUEGO</h5>
                <p class="col-10"><?php echo $getProductData['descripcion']?></p>
                    <h5 class="border-bottom mt-5">DESCRIPCIÓN DEL CONTENIDO PARA ADULTOS</h5>
                    <p class="col-10">Los desarrolladores describen su contenido así:
                        Este juego puede incluir contenido no apto para todas las edades o para verlo en el trabajo: violencia o gore frecuentes, contenido general para adultos</p>
            </div>
        </div>

    <?php
    }
    ?>
    <?php
        include "footer.php";
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>    
    <script src="js/cart.js"></script>
    <script src="js/tienda.js"></script>
    </body>
</html>