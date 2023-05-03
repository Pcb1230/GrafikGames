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
          background-color: transparent;
          border: solid cyan;
          color:white;
          position: relative;
          animation-name: example;
          animation-duration: 1s;
        }
        @keyframes example {
          0%   {top:200px;}
          100% {top:0px;}
        }
        h2,h1,h4{
          color: white;
          text-align: center;
        }
        .btn-menu,.btn-menu:hover{
          background-color: cyan;
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
        .btn:hover{
          color:white;
        }
        .btn-cyan{
          background-color: cyan;
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
        #modificar{
          display: none;
        }
    </style>
  </head>
  <body>
    <div class="container mt-3">
      
    <?php
        include "header.php";
        ?>
        <?php
          require_once('MODELO/config.php');    
          $sql = "SELECT * FROM usuario INNER JOIN informacion ON usuario.id = informacion.id WHERE usuario.usuario='".$_SESSION["Usuario"]."'";
          $handle = $db->prepare($sql);
          $handle->execute();
          $getUser = $handle->fetch(PDO::FETCH_ASSOC);
        if(!isset($_SESSION["Usuario"])){  
          echo "<script>window.location.href='home.php?error=2'</script>";
        }
        if(isset($_GET["error"])&& $_GET["error"]==1){
          echo "<h4 style='color:green' class='text-center'>Imagen actualizada correctamente</h4>";
        }
        if(isset($_GET["error"])&& $_GET["error"]==2){
          echo "<h4 style='color:red' class='text-center'>Ha habido un error subiendo el Archivo</h4>";
        }
        if(isset($_GET["error"])&& $_GET["error"]==3){
          echo "<h4 style='color:red' class='text-center'>La Imagen esta vacia</h4>";
        }
        if(isset($_GET["error"])&& $_GET["error"]==4){
          echo "<h4 style='color:green' class='text-center'>Usuario actualizado correctamente</h4>";
        }
        if(isset($_GET["error"])&& $_GET["error"]==5){
          echo "<h4 style='color:red' class='text-center'>Ha habido un error modificando el Usuario</h4>";
        }
        if(isset($_GET["error"])&& $_GET["error"]==6){
          echo "<h4 style='color:red' class='text-center'>El usuario esta vacio</h4>";
        }
        if(isset($_GET["error"])&& $_GET["error"]==7){
          echo "<h4 style='color:green' class='text-center'>Email actualizado correctamente</h4>";
        }
        if(isset($_GET["error"])&& $_GET["error"]==8){
          echo "<h4 style='color:red' class='text-center'>Ha habido un error modificando el Email</h4>";
        }
        if(isset($_GET["error"])&& $_GET["error"]==9){
          echo "<h4 style='color:red' class='text-center'>El email esta vacio</h4>";
        }
        ?>
        <div class="row text-center border-top mt-3">
        <h1 class="mt-3">Bienvenido/a</h1>
          <div class="col-6 mt-3">
            <button onclick="datos()" class="btn btn-cyan">Tus datos</button>
          </div>
          <div class="col-6 mt-3">
            <button onclick="modificar()" class="btn btn-cyan">Modificar Datos</button>
          </div>
        </div>

        <div id="datos" class="border-top mt-3">
          <div class="row  justify-content-center mt-3">
            <div class="col-6">
              <h3 for="user">Usuario:</h3>
              <div class="d-flex justify-content-center">
                <h5 id="user" class="text-center rounded-5 bg-cyan w-50"><?php echo $getUser['usuario']?></h5>
              </div>
            </div>

            <div class="col-6">
            <h3 for="nombre">Nombre y Apellidos:</h3>
            <div class="d-flex justify-content-center">
          <h5 id="nombre" class="text-center rounded-5 bg-cyan w-50"><?php echo $getUser['Nombre y Apellidos']?></h5>
            </div>
            </div>
          </div>

          <div class="row ">
            <div class="col-6">
            <h3 for="email">Email:</h3>
            <div class="d-flex justify-content-center">
          <h5 id="email" class="text-center rounded-5 bg-cyan w-auto"><?php echo $getUser['email']?></h5>
          </div>
            </div>
            <div class="col-6">
            <h3 for="direccion">Direccion:</h3>
            <div class="d-flex justify-content-center">
          <h5 id="direccion" class="text-center rounded-5 bg-cyan w-50"><?php echo $getUser['direccion']?></h5>
          </div>
            </div>
          </div>
          
          <div class="row ">
            <div class="col-6">
            <h3 for="fecha">Fecha de Nacimiento:</h3>
            <div class="d-flex justify-content-center">
          <h5 id="fecha" class="text-center rounded-5 bg-cyan w-50"><?php echo $getUser['fecha']?></h5>
          </div>
            </div>
            <div class="col-6">
            <h3 for="sexo">Sexo:</h3>
            <div class="d-flex justify-content-center">
          <h5 id="sexo" class="text-center rounded-5 bg-cyan w-50"><?php echo $getUser['sexo']?></h5>
          </div>
            </div>
          </div>
          
          
          <div class="row">
          <div class="col-6">
            <h3 for="pais">Pais:</h3>
            <div class="d-flex justify-content-center">
            <h5 id="pais" class="text-center rounded-5 bg-cyan w-50"><?php echo $getUser['pais']?></h5>
            </div>
          </div>
            <div class="col-6">
            <h3 for="tarjeta">Tarjeta:</h3>
            <div class="d-flex justify-content-center">
            <h5 id="tarjeta" class="text-center rounded-5 bg-cyan w-50"><?php echo $getUser['Tarjeta']?></h5>
            </div>
            </div>
          </div>
          
        </div>

        <div id="modificar" class="border-top mt-3">
        <form class="mt-5" action="CONTROL/uploadimg.php" method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                <form action="CONTROL/uploadimg.php" method="post" enctype="multipart/form-data">
                    <div class="col-1 mt-3">
                        <img class="rounded-5 perfil" src="<?php echo $_SESSION["ImagenUsuario"]?>" alt="Imagen Usuario">
                    </div>
                    <div class="col-4 mt-3">
                        <label for="imagen"><h4>Nueva Imagen:</h4></label><br>
                    <input class="form-control" type="file" id="imagen" name="imagen">
                    </div>
                    <div class="col-1 mt-3">
                    <button class="btn btn-cyan" type="submit" name="submit" value="enviar">Cambiar Imagen</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </form>

        <form class="mt-5" action="CONTROL/cambioUsu.php" method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                <form action="CONTROL/cambioUsu.php" method="post" enctype="multipart/form-data">
                    <div class="col-1 mt-3 w-auto h-auto">
                        <h4><?php echo $_SESSION["Usuario"]?></h4>
                    </div>
                    <div class="col-4 mt-3">
                        <input class="border rounded" placeholder="Nuevo Usuario" id="usuario" name="usuario" type="text">
                    </div>
                    <div class="col-1 mt-3">
                    <button class="btn btn-cyan" type="submit" name="submit" value="enviar">Cambiar Usuario</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </form>

        <form class="mt-5" action="CONTROL/cambioEmail.php" method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                <form action="CONTROL/cambioEmail.php" method="post" enctype="multipart/form-data">
                    <div class="col-1 mt-3 w-auto h-auto">
                        <h4><?php echo $getUser['email']?></h4>
                    </div>
                    <div class="col-4 mt-3">
                        <input class="border rounded" placeholder="Nuevo Email" id="email" name="email" type="text">
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
        include "footer.php";
        ?>

                
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script>
    function datos(){
        document.getElementById("datos").style.display = "block";
        document.getElementById("modificar").style.display = "none";
    }
    function modificar(){
        document.getElementById("datos").style.display = "none";
        document.getElementById("modificar").style.display = "block";
    }
    </script>
</body>
</html>
i {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 3px;
  border-radius: 1.5px;
  background: linear-gradient(45deg, #2196f3, #ff4685);
  transition: 0.5s;
  z-index: 1;
  pointer-events: none;
}