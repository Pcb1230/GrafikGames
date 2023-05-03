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
        h2,h4{
          color: white;
          text-align: center;
        }
        a{
          color: white;
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
        input {
          border: 1px solid transparent;
          padding: 10px;
          font-size: 16px;
        }
        ::placeholder{
            color:white
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
        input[type="text"], input[type="file"],textarea {
            background : transparent;
            width: 100%;
            color :white
        }
        .form-control::-webkit-file-upload-button{
          /*background: #0d6efd;*/
          background: cyan;
        }
        .form-control:hover {
          border-color: cyan;
        }
        .perfil{
          width:60px;
          height:60px;
        }
    </style>
  </head>
  <body>
    <div class="container mt-3">
      
    <?php
        include "header.php";
        ?>
        <?php
        if(isset($_GET["error"])&& $_GET["error"]==1){
          echo "<h4 style='color:green' class='text-center'>Se ha subido el mod correctamente</h4>";
        }
        if(isset($_GET["error"])&& $_GET["error"]==2){
          echo "<h4 style='color:red' class='text-center'>Ha habido un error subiendo el Archivo</h4>";
        }
        if(isset($_GET["error"])&& $_GET["error"]==3){
          echo "<h4 style='color:red' class='text-center'>Hay archivos vacios</h4>";
        }
        if(isset($_GET["error"])&& $_GET["error"]==4){
          echo "<h4 style='color:red' class='text-center'>Para subir mods deberas iniciar sesion</h4>";
        }        
        ?>
        <form class="mt-5" action="CONTROL/upload.php" method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-12">
                <div class="row">
                <form action="CONTROL/upload.php" method="post" enctype="multipart/form-data">
                    <div class="col-6 mt-3">
                        <input class="text-center" type="text" name="nombre" placeholder="Nombre del Mod">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="imagen"><h4>Imagen del Mod:</h4></label><br>
                        <input class="form-control form-control-dark" type="file" id="imagen" name="imagen">
                    </div>
                    <div class="col-6 mt-3">
                        <textarea class="text-center" placeholder="Descripcion Del Mod" name="descripcion" id="descripcion" cols="83" rows="5"></textarea>
                    </div>
                    <div class="col-6 mt-3">
                    <label for="imagen"><h4>Archivo a subir:</h4></label><br>
                    <input class="form-control" type="file" id="archivo" name="archivo">
                    </div>
                    <div class="col-12 justify-content-center text-center mt-3">
                    <button class="btn btn-cyan text-center" type="submit" name="submit" value="enviar">Enviar</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </form>

        <?php
        include "footer.php";
        ?>

                
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
   </body>
</html>