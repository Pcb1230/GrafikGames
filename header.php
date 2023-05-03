<div class="row  align-items-center"><!--header-->
            <div class="col col-lg-2 d-none d-md-block"> <img src="imgs/logoGrafikGames (1).png" alt="Logo 1"></div><!--logo-->

            <div class="col col-lg-8 text-center"><img src="imgs/GrafikLetras.png" alt="Logo 2"></div><!--Nombre-->
            <div class="col col-lg-2 text-center">
                          <?php
                          session_start();
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
                                  <li><a class="dropdown-item" href="pedidos.php">Pedidos</a></li>
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
                            
                            if(isset($_GET["cookie"])){
                              setcookie("Aceptar","si", time()+100*24*60*60,"/");
                                echo "<script>window.location.href='home.php'</script>";
                            }
                            if(isset($_GET["cookiedestroy"])){
                                //setcookie("Usuario","",time()-3600,"/");
                                //setcookie("ImagenUsuario","",time()-3600,"/");
                                session_destroy();
                                //header("Location:home.php"); Da Error en headers
                                echo "<script>window.location.href='home.php'</script>";
                            }
                            if(!isset($_COOKIE["Aceptar"])){
                                echo '<div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                          <div class="modal-content">
                                            <div class="modal-body">
                                              <h5 style="color: white;">Tu privacidad</h5>
                                              <h6 style="color: white;">Al hacer clic en "Aceptar cookies", acepta que Grafik Games puede almacenar cookies en su dispositivo y divulgar información de acuerdo con nuestra Política de cookies.</h6>
                                              <div class="row">
                                                <div class="col-6"><a href="?cookie"><button type="button" class="btn btn-cyan" data-bs-dismiss="modal">Aceptar cookies</button></a></div>
                                                <div class="col-6"><a href="https://www.google.es/"><button type="button" style="background-color: transparent;border: solid #FF00FF;color:white;" class="btn btn-purple ">No aceptar cookies</button></a></div>
                                              </div>
                                              </div>
                                          </div>
                                        </div>
                                      </div>';
                            }
                            if(isset($_GET["error"])&& $_GET['error']==1){
                                echo '<div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                          <div class="modal-content">
                                            <div class="modal-body">
                                              <h5 style="color: red;">Solo los Administradores pueden Acceder a esta pagina</h5>
                                                <div class="col-12"><button type="button" style="color:white" class="btn btn-primary " data-bs-dismiss="modal">Aceptar</button></div>
                                              </div>
                                          </div>
                                        </div>
                                      </div>';                                
                            }
                            if(isset($_GET["error"])&& $_GET['error']==2){
                              echo '<div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                          <div class="modal-body">
                                            <h5 style="color: red;">Para acceder tienes que iniciar sesion</h5>
                                              <div class="col-12"><button type="button" style="color:white" class="btn btn-primary " data-bs-dismiss="modal">Aceptar</button></div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>';                                
                          }
                          if(isset($_GET["error"])&& $_GET['error']==3){
                            echo '<div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                      <div class="modal-content">
                                        <div class="modal-body">
                                          <h5 style="color: red;">Para escribir en el foro tienes que iniciar sesion</h5>
                                            <div class="col-12"><button type="button" style="color:white" class="btn btn-primary " data-bs-dismiss="modal">Aceptar</button></div>
                                          </div>
                                      </div>
                                    </div>
                                  </div>';                                
                        }
                        if(isset($_GET["error"])&& $_GET['error']==4){
                          echo '<div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                      <div class="modal-body">
                                        <h5 style="color: red;">Inicia Sesion para ver tu Pedidos</h5>
                                          <div class="col-12"><button type="button" style="color:white" class="btn btn-primary " data-bs-dismiss="modal">Aceptar</button></div>
                                        </div>
                                    </div>
                                  </div>
                                </div>';                                
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
                </div>
              </nav>
        </div>