<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grafik Games</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="icon" href="../imgs/logoGrafikGames.png">
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
          height: 19em;
        }
                /*the container must be positioned relative:*/
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
        .btn-menu,.btn-menu:hover{
          background-color: cyan;
        }

    </style>
  </head>
  <body>
    <div class="container mt-3">


        <?php
        include 'header.php';
      if($_SESSION["tipo"]!="Administrador"){
        echo "<script>window.location.href='home.php?error=1'</script>";  
      }
        ?>
    
        <div class="row  align-items-center mt-5">
        <div class="col-12 border-top">
                <h2 class="mt-5">Usuarios</h2>
                <?php
                if(isset($_GET['success'])){
                  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <h4 style='color:black'>Usuario eliminado correctamente</h4>
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>
                  ";
                }
                  ?>
          </div>
          <div class="col-12 mt-5">
            <?php
            include 'MODELO/config.php';
            $sql = "SELECT id,usuario from usuario WHERE id!=1";
            $handle = $db->prepare($sql);
            $handle->execute();
            $getUsuarios = $handle->fetchAll(PDO::FETCH_ASSOC);
            if(count($getUsuarios)==0){
                echo '<h2>No hay Usuarios Regsitrados</h2>';
            }else{
                ?>
                <?php

              foreach($getUsuarios as $usuarios){
            ?>
            <div class="row text-center mt-3">
                <div class="col-3"><h5><?php echo $usuarios['usuario']?></h5></div>
                <div class="col-3"><a href="usuario.php?usuario=<?php echo $usuarios['id'];?>"><button class='btn btn-cyan'>Detalles</button></a></div>
                <div class="col-3"><a href="usuario.php?modificarUsuario=<?php echo $usuarios['id'];?>"><button class='btn btn-cyan'>Modificar</button></a></div>
                <div class="col-3"><a href="CONTROL/usuarios.php?borrar=<?php echo $usuarios['id'];?>"><button class='btn btn-cyan'>Borrar</button></a></div>
            </div>
            <?php
              }
            }
            ?>
            </div>
        </div>
                
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <!-- <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script> -->
</body>
</html>