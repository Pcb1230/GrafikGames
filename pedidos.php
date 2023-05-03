<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tus Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="icon" href="imgs/logoGrafikGames.png">
    <style>
        body{
          background-image: url(imgs/background.png);
        }
        h2,h4{
          color: white;
          text-align: center;
        }
        a,h5{
          color: white;
        }
        th{
            font-size: 25px;
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
        .btn-purple{
          background-color: rgb(255, 0, 255);
        }
        .modal-body{
            background-image: url(imgs/background.png);
        }
        .perfil{
          width:60px;
          height:60px;
        }
        .btn-menu,.btn-menu:hover{
          background-color: cyan;
        }
        .btn-cyan:hover{
            background-color: cyan;
            color:black
        }
    </style>
  </head>
  <body>
    <div class="container mt-3">
      
    <?php
        include "header.php";
        ?>

<div class="row  align-items-center mt-5">
            <div class="col-12 border-top">
                <h2 class="mt-5">Tus Pedidos</h2>
                <?php
                if(isset($_GET['success'])){
                  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <h4 style='color:black'>Pedido Reembolsado, en 24h/48h recibiras el reembolso</h4>
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>
                  ";
                }
                  if(!isset($_SESSION["Usuario"])){  
                    echo "<script>window.location.href='home.php?error=4'</script>";
                  }else{
                  ?>
            </div>
            <div class="col-12 mt-5">
            <?php
            include 'MODELO/config.php';
            $sql = "SELECT id,Fecha,Total from pedidos WHERE idUsuario=".$_SESSION['Id']." AND Reembolsado !='Si'";
            $handle = $db->prepare($sql);
            $handle->execute();
            $getPedidos = $handle->fetchAll(PDO::FETCH_ASSOC);
            if(count($getPedidos)==0){
                echo '<h2>Todavia no tienes ningun pedido</h2>';
            }else{
                ?>
            <div class="row">
                <div class="col-2"><h5>Nº de Pedido</h5></div>
                <div class="col-2"><h5>Fecha</h5></div>
                <div class="col-2"><h5>Total</h5></div>
                <div class="col-2"></div>
                <div class="col-2"></div>
            </div>
                <?php

              foreach($getPedidos as $pedidos){
            ?>
            <div class="row text-center mt-3">
                <div class="col-2"><h5><?php echo $pedidos['id']?></h5></div>
                <div class="col-2"><h5><?php echo $pedidos['Fecha']?></h5></div>
                <div class="col-2"><h5><?php echo $pedidos['Total']?>€</h5></div>
                <div class="col-3"><a href="pedido.php?pedido=<?php echo $pedidos['id'];?>"><button class='btn btn-cyan'>Ver Pedido</button></a></div>
                <div class="col-3"><a href="CONTROL/reembolso.php?pedido=<?php echo $pedidos['id'];?>"><button class='btn btn-cyan'>Reembolsar</button></a></div>
            </div>
            <?php
              }
            }
            ?>
            </div>
            <?php
              }
            ?>
        </div>

        



        <?php
        include "footer.php";
        ?>

                
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>