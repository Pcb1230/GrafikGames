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
        .card-img-top{
          width: 100%;
          height: 215px;
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
    require_once('MODELO/config.php');    
    $sql = "SELECT * FROM mods";
    $handle = $db->prepare($sql);
    $handle->execute();
    $getAllProducts = $handle->fetchAll(PDO::FETCH_ASSOC);
?>
    <div class="row border-top mt-5">
        <?php
                    if(isset($_GET["error"])&& $_GET['error']==1){
                      echo "<h4 style='color:red' class='text-center mt-3'>Para descargar mods deberas iniciar sesion</h4>";                             
                  }
        foreach($getAllProducts as $product){
            $imgUrl = $product["imagen"];
        ?>
            <div class="col-md-3  mt-5 d-flex align-items-stretch">
                <div class="card">
                     <a href="mods.php?mod=<?php echo $product['id']?>">
                        <img class="card-img-top" src="<?php echo $imgUrl ?>" alt="<?php echo $product['nombre'] ?>">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="mods.php?mod=<?php echo $product['id'] ?>">
                                <?php echo $product['nombre']; ?>
                            </a>
                        </h5>

                        <p class="card-t">
                            <?php echo substr($product['descripcion'],0,100) ?> ...
                        </p>
                        <p class="card-text">
                            <a href="mods.php?mod=<?php echo $product['id']?>" class="btn btn-cyan w-100 btn-sm">
                                Ver
                            </a>
                        </p>
                    </div>
                </div>
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