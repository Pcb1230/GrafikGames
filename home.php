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
    </style>
  </head>
  <body>
    <div class="container mt-3">
      
    <?php
        include "header.php";
        ?>


        <div class="row mt-5 border-top justify-content-center"><!--Destacados-->
          <div class="col-10 mt-5">
            <h2>Juegos destacados</h2>
            <div id="carouseldestacados" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="row">
                    <div class="col-8">
                      <img src="imgs/mw2/d1.jpg" alt="Modern Warfare II" class="d-flex w-100">
                    </div>
                    <div class="col-4">

                      <div class="row justify-content-center">
                        <h4>Call of Duty®: Modern Warfare® II</h4>
                        <div class="col-6"><img src="imgs/mw2/d2.jpg" alt="Modern Warfare II" class="d-flex w-100"></div>
                        <div class="col-6"><img src="imgs/mw2/d3.jpg" alt="Modern Warfare II" class="d-flex w-100"></div>
                      </div>

                      <div class="row mt-4">
                        <div class="col-6"><img src="imgs/mw2/d4.jpg" alt="Modern Warfare II" class="d-flex w-100"></div>
                        <div class="col-6"><img src="imgs/mw2/d5.jpg" alt="Modern Warfare II" class="d-flex w-100"></div>
                      </div>

                      <div class="row mt-4 text-center">
                        <div class="col mt-5">
                          <a href="juegos.php?juego=1"><button class="btn btn-cyan" type="button">Comprar</button></a>
                        </div>
                      </div>
                       
                    </div>
                  </div>
                </div>

                <div class="carousel-item">
                  <div class="row">
                    <div class="col-8">
                      <img src="imgs/hp/d1.jpg" alt="" class="d-flex w-100">
                    </div>
                    <div class="col-4">

                      <div class="row justify-content-center">
                        <h4>Hogwarts Legacy</h4>
                        <div class="col-6"><img src="imgs/hp/d2.jpg" alt="Hogwarts Legacy" class="d-flex w-100"></div>
                        <div class="col-6"><img src="imgs/hp/d3.jpg" alt="Hogwarts Legacy" class="d-flex w-100"></div>
                      </div>

                      <div class="row mt-4">
                        <div class="col-6"><img src="imgs/hp/d4.jpg" alt="Hogwarts Legacy" class="d-flex w-100"></div>
                        <div class="col-6"><img src="imgs/hp/d5.jpg" alt="Hogwarts Legacy" class="d-flex w-100"></div>
                      </div>

                      <div class="row mt-4 text-center">
                        <div class="col mt-5">
                          <a href="juegos.php?juego=4"><button class="btn btn-cyan" type="button">Comprar</button></a>
                        </div>
                      </div>
                       
                    </div>
                  </div>
                </div>

                <div class="carousel-item">
                  <div class="row">
                    <div class="col-8">
                      <img src="imgs/ah/d1.jpg" alt="Atomic_Heart" class="d-flex w-100">
                    </div>
                    <div class="col-4">

                      <div class="row justify-content-center">
                        <h4>Atomic Heart</h4>
                        <div class="col-6"><img src="imgs/ah/d2.jpg" alt="Atomic_Heart" class="d-flex w-100"></div>
                        <div class="col-6"><img src="imgs/ah/d3.jpg" alt="Atomic_Heart" class="d-flex w-100"></div>
                      </div>

                      <div class="row mt-4">
                        <div class="col-6"><img src="imgs/ah/d4.jpg" alt="" class="d-flex w-100"></div>
                        <div class="col-6"><img src="imgs/ah/d5.jpg" alt="" class="d-flex w-100"></div>
                      </div>

                      <div class="row mt-4 text-center">
                        <div class="col mt-5">
                          <a href="juegos.php?juego=5"><button class="btn btn-cyan" type="button">Comprar</button></a>
                        </div>
                      </div>
                       
                    </div>
                  </div>
                </div>

              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouseldestacados" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouseldestacados" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>

        <div class="row mt-5 border-top"><!--Carrousel y foro-->
            <div class="col-12 col-md-8 mt-5"><!--Carrousel-->
            <h3 class="text-center">Algunos de Nuestros Juegos</h3>
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="imgs/mw2.jpg" class="d-flex w-100">
                        <h2>Modern Warfare II</h2>
                      </div>
                      <div class="carousel-item">
                        <img src="imgs/rdr2.jpg" class="d-flex w-100">
                        <h2>Read Dead Redemption II</h2>
                      </div>
                      <div class="carousel-item">
                        <img src="imgs/nfs.jpg" class="d-flex w-100">
                        <h2>Need for Speed: Unbound</h2>
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
            
            <div class="d-none d-md-block col-md-4 mt-5"><!--Foro-->
              <h2>Consulta nuestro Foro</h2>
              <ul  id="foro">
              <?php
              require_once('MODELO/config.php');    
              $sql = "SELECT * FROM foro";
              $handle = $db->prepare($sql);
              $handle->execute();
              $getForo = $handle->fetchAll(PDO::FETCH_ASSOC);

                    if(isset($_GET["error"])&& $_GET['error']==1){
                      echo "<h4 style='color:red' class='text-center mt-3'>Para descargar mods deberas iniciar sesion</h4>";                             
                    }
                    foreach($getForo as $foro){
              ?>
              <p><?php echo $foro['Usuario']?>: <?php echo $foro['Mensaje']?></p>
              <?php 
              }
              ?>
              </ul>
                <form action="" id="frmajax" method="POST" class="d-flex mt-5">
                    <input id="mensaje" type="text" name="mensaje" class="form-control me-2" placeholder="Escribe aqui...">
                    <button id="btnguardar" class="btn btn-cyan">Enviar</button>
                </form>
            </div>
        </div>

        <div class="row mt-5 border-top"><!--Noticias y demas-->
        <!--
            <div class="col-6 col-md-4 mt-5">
            <h3 class="text-center">Noticias Sobre Juegos</h3>
                <div id="carousel2" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item">
                        <img src="imgs/mw2.jpg" class="d-flex w-100">
                        <h2>Modern Warfare II</h2>
                      </div>
                      <div class="carousel-item active">
                        <img src="imgs/rdr2.jpg" class="d-flex w-100">
                        <h2>Read Dead Redemption II</h2>
                      </div>
                      <div class="carousel-item">
                        <img src="imgs/nfs.jpg" class="d-flex w-100">
                        <h2>Need for Speed: Unbound</h2>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel2" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>-->

            <div class="col-12 col-md-8 mt-5"><!--Reviews-->
            <h3 class="text-center">Mira nuestras Reviews</h3>
                <div id="carousel3" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item">
                        <img src="imgs/mw2.jpg" class="d-flex w-100 ">
                        <h3 class="text-center">Modern Warfare II</h3>
                        <p>Call of Duty: Modern Warfare 2 llegó el pasado viernes a las tiendas de forma oficial
                           dejándonos con una segunda entrega de este reinicio de la subsaga Modern Warfare, que comenzó
                            con muy buen pie en el año 2019 con una entrega que nos parecía ideal para construir los Call
                             of Duty del futuro a partir de esa base jugable.</p>
                      </div>
                      <div class="carousel-item">
                        <img src="imgs/rdr2.jpg" class="d-flex w-100">
                        <h3 class="text-center">Read Dead Redemption II</h3>
                        <p>Que tras cinco años Rockstar Games lance ahora su primer título original
                           en la actual generación de consolas, dice mucho de una compañía atípica,
                            que juega con sus propias reglas y que compite contra sí misma, intentando
                             superarse con cada nuevo sandbox, un desafío que comenzaron en 2001 con el
                              histórico Grand Theft Auto III.</p>
                      </div>
                      <div class="carousel-item active">
                        <img src="imgs/nfs.jpg" class="d-flex w-100 mh-100">
                        <h3 class="text-center">Need for Speed: Unbound</h3>
                        <p>con Need for Speed Unbound, que supone la esperada vuelta de Criterion Games a la saga
                           , la cuestión principal radica en su estructura,
                             una idea buenísima que logra mantenernos tensos en todo momento, pero que a la vez supone el Talón de
                              Aquiles del título que llega este 2 de diciembre a PC, PS5 y Xbox Series X/S.
                          </p>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel3" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel3" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>

            <div class="mh-25 d-none d-md-block col-md-4 mt-5"><!--Especificaciones-->
                <h2>Comprueba los requisitos de tu juego favorito</h2>
                <form class="d-flex mt-3">
                  <div class="autocomplete" style="width:300px;">
                    <input onblur='vacio()' id="nombreSpecs" type="text" class="form-control me-2" placeholder="Escribe aqui...">
                    </div>
                    <button type="button" class="btn btn-cyan" style="margin-left: 0.5em;" onclick="specs()">Enviar</button>
                </form>
                <ul id="lista">
                </ul>
            </div>
        </div>



        <?php
        include "footer.php";
        ?>

                
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <!-- <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script> -->
    <script src="js/home.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript">
      window.onload = function () {
          OpenBootstrapPopup();
          cargarspecs();
      };
      function OpenBootstrapPopup() {
          $("#modalId").modal('show');
      }
  </script>

<script type="text/javascript">
  var usuario = "<?php echo $_SESSION["Usuario"];?>";
	$(document).ready(function(){
		$('#btnguardar').click(function(){
			var datos=$('#frmajax').serialize();
			$.ajax({
				type:"POST",
				url:"CONTROL/foro.php",
				data:datos,

			});
      escribirforo(usuario);
			return false;
		});
	});
</script>

</body>
</html>

