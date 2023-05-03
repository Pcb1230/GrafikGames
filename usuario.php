<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grafik Games</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="icon" href="imgs/logoGrafikGames.png">
    <style>
        body{
          background-image: url(imgs/background.png);
        }
        .bg-cyan{
          /* background-color:#08e3ff; */
          background-color: #059eb2;
        }
        h2,h1,h4{
          color: white;
          text-align: center;
        }
        .btn-menu,.btn-menu:hover{
          background-color: cyan;
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
        h5{
          color:black
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
        input[type="text"], input[type="file"],textarea {
            background : transparent;
            width: 100%;
            color :white
        }
        input[type=submit] {
          background-color: DodgerBlue;
          color: #fff;
          cursor: pointer;
        }
        .form-control::-webkit-file-upload-button{
          background: cyan;
        }
        .form-control:hover {
          border-color: cyan;
        }
        .btn-cyan{
          background-color: transparent;
          border: solid cyan;
          color:white;
        }
        .btn-cyan-animated{
          background-color: transparent;
          border: solid cyan;
          color:white;
          position: relative;
          animation-name: example;
          animation-duration: 1s;
          min-width: 50%;
          max-width: 100%;
        }
        @keyframes example {
          0%   {top:200px;}
          100% {top:0px;}
        }
        .btn-purple{
          background-color: rgb(255, 0, 255);
        }
        .perfil{
          width:60px;
          height:60px;
        }
        ::placeholder{
          color: white;
        }
    </style>
  </head>
  <body>
    <div class="container mt-3">
      
    <?php
        include "header.php";
        ?>
        <?php
        if(!isset($_SESSION["Usuario"]) && $_SESSION["tipo"]!="Administrador"){  
          echo "<script>window.location.href='home.php?error=1'</script>";
        }
        if(isset($_GET["success"])&& $_GET["success"]==1){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <h4 style='color:black'>Usuario modificado</h4>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        if(isset($_GET["error"])&& $_GET["error"]==1){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <h4 style='color:black'>Error Modificando el usuario</h4>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        if(isset($_GET["error"])&& $_GET["error"]==2){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <h4 style='color:black'>Campo Vacio</h4>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }

        if(isset($_GET['usuario'])){
            require_once('MODELO/config.php');    
            $sql = "SELECT * FROM usuario INNER JOIN informacion ON usuario.id = informacion.id WHERE usuario.id='".$_GET['usuario']."'";
            $handle = $db->prepare($sql);
            $handle->execute();
            $getUser = $handle->fetch(PDO::FETCH_ASSOC);
        ?>

        <div id="datos" class="border-top mt-3">
          <div class="row justify-content-center mt-3">
            <div class="col-6">
              <h3 for="user">Usuario:</h3>
              <div class="d-flex justify-content-center">
                <h5 id="user" class="rounded-5 text-center btn-cyan-animated w-50"><?php echo $getUser['usuario']?></h5>
              </div>
            </div>

            <div class="col-6">
            <h3 for="nombre">Nombre y Apellidos:</h3>
            <div class="d-flex justify-content-center">
          <h5 id="nombre" class=" rounded-5 text-center btn-cyan-animated w-50"><?php echo $getUser['Nombre y Apellidos']?></h5>
            </div>
            </div>
          </div>

          <div class="row ">
            <div class="col-6">
            <h3 for="email">Email:</h3>
            <div class="d-flex justify-content-center">
          <h5 id="email" class=" rounded-5 text-center btn-cyan-animated"><?php echo $getUser['email']?></h5>
          </div>
            </div>
            <div class="col-6">
            <h3 for="direccion">Direccion:</h3>
            <div class="d-flex justify-content-center">
          <h5 id="direccion" class=" rounded-5 text-center btn-cyan-animated"><?php echo $getUser['direccion']?></h5>
          </div>
            </div>
          </div>
          
          <div class="row ">
            <div class="col-6">
            <h3 for="fecha">Fecha de Nacimiento:</h3>
            <div class="d-flex justify-content-center">
          <h5 id="fecha" class=" rounded-5 text-center btn-cyan-animated"><?php echo $getUser['fecha']?></h5>
          </div>
            </div>
            <div class="col-6">
            <h3 for="sexo">Sexo:</h3>
            <div class="d-flex justify-content-center">
          <h5 id="sexo" class=" rounded-5 text-center btn-cyan-animated"><?php echo $getUser['sexo']?></h5>
          </div>
            </div>
          </div>
          
          
          <div class="row ">
          <div class="col-6">
            <h3 for="pais">Pais:</h3>
            <div class="d-flex justify-content-center">
            <h5 id="pais" class=" rounded-5 text-center btn-cyan-animated"><?php echo $getUser['pais']?></h5>
            </div>
          </div>
            <div class="col-6">
            <h3 for="tarjeta">Tarjeta:</h3>
            <div class="d-flex justify-content-center">
            <h5 id="tarjeta" class=" rounded-5 text-center btn-cyan-animated"><?php echo $getUser['Tarjeta']?></h5>
            </div>
            </div>
          </div>
        </div>
        <?php
        };
        if(isset($_GET['modificarUsuario'])){
            require_once('MODELO/config.php');    
            $sql = "SELECT * FROM usuario INNER JOIN informacion ON usuario.id = informacion.id WHERE usuario.id='".$_GET['modificarUsuario']."'";
            $handle = $db->prepare($sql);
            $handle->execute();
            $getUser = $handle->fetch(PDO::FETCH_ASSOC);
        ?>

        <div id="modificar" class="border-top mt-3">
        <form class="mt-5" action="CONTROL/uploadimg.php?admin" method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                <form action="CONTROL/uploadimg.php?admin" method="post" enctype="multipart/form-data">
                    <div class="col-1 mt-3">
                        <img class="rounded-5 perfil" src="<?php echo $getUser['Imagen']?>" alt="Imagen Usuario">
                    </div>
                    <div class="col-4 mt-3">
                        <label for="imagen"><h4>Nueva Imagen:</h4></label><br>
                    <input class="form-control" type="file" id="imagen" name="imagen">
                    <input style="display:none" class="form-control" type="text" id="id" name="id" value="<?php echo $getUser['id']?>">
                    </div>
                    <div class="col-1 mt-3">
                    <button class="btn btn-cyan" type="submit" name="submit" value="enviar">Cambiar Imagen</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </form>

        <form class="mt-5" action="CONTROL/cambioUsu.php?admin" method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                <form action="CONTROL/cambioUsu.php?admin" method="post" enctype="multipart/form-data">
                    <div class="col-1 mt-3 w-auto h-auto">
                        <h4><?php echo $getUser['usuario']?></h4>
                    </div>
                    <div class="col-4 mt-3">
                        <input class="border rounded" placeholder="Nuevo Usuario" id="usuario" name="usuario" type="text">
                        <input style="display:none" class="form-control" type="text" id="id" name="id" value="<?php echo $getUser['id']?>">
                    </div>
                    <div class="col-1 mt-3">
                    <button class="btn btn-cyan" type="submit" name="submit" value="enviar">Cambiar Usuario</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </form>

        <form class="mt-5" action="CONTROL/cambioEmail.php?admin" method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                <form action="CONTROL/cambioEmail.php?admin" method="post" enctype="multipart/form-data">
                    <div class="col-1 mt-3 w-auto h-auto">
                        <h4><?php echo $getUser['email']?></h4>
                    </div>
                    <div class="col-4 mt-3">
                        <input class="border rounded" placeholder="Nuevo Email" id="email" name="email" type="text">
                        <input style="display:none" class="form-control" type="text" id="id" name="id" value="<?php echo $getUser['id']?>">
                    </div>
                    <div class="col-1 mt-3">
                    <button class="btn btn-cyan" type="submit" name="submit" value="enviar">Cambiar Email</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </form>
        </div>
        <?php
        }
        ?>

        <?php
        include "footer.php";
        ?>

                
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>