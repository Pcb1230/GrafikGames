<?php
session_start();
$email = $_SESSION['emailPassword'];
if($email == false){
  header('Location: recuperarPassword.php?error=1');
}
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
        <div class="row">
            <?php
            if(isset($_GET['error'])&& $_GET['error']==1){
            ?>
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    <h3 style="width:100%;">Codigo Erroneo</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>
            <div class="col-md-4 offset-md-4 form">
                <form action="nuevaPassword.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Verificacion de Codigo</h2>
                    <div class="form-group">
                        <input class="form-control" type="number" name="codigo" placeholder="Introduce el codigo" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-reset-otp" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html> -->
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recupera Tu Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../EstiloRegistro.css">
    <link rel="icon" href="../imgs/logoGrafikGames.png">

  </head>
  <style>
#cuenta{
    color: rgba(255, 255, 255, 0.9);
    font-size: 20px;
    font-weight: 500;
    padding: 0.5em 1.2em;
    background: linear-gradient(45deg, #2196f3, #ff4685);
    border: none;
    position: relative;
}

#cuenta:hover {
    color: rgba(255, 255, 255, 1);
    box-shadow: 0 4px 16px rgba(49, 138, 172, 1);
    transition: all 0.2s ease;
}
a{
display: flex;
justify-content: center;
text-decoration: none;
}

#parrafo{
  position: relative;
  margin-top: -12em;
  color: white;
}
#imagenGrafikGames1{
  margin-top:7em;
  margin-bottom: -2em;
  width: 25%;
}
input::placeholder{
	color: white;
}


  </style>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 imagenGrafik1">
          <a href="../home.php"><img src="../imgs/logoGrafikGames.png"  id="imagenGrafikGames1" alt="Logo de la Pagina"></a>
      </div>
      <?php
            if(isset($_GET['error'])&& $_GET['error']==1){
              ?>
                  <div class="col-md-5 col-12 alert alert-danger alert-dismissible fade show text-center" role="alert">
                      <h3>Codigo Erroneo</h3>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              <?php
              }
      ?>
    </div>
        <form action="nuevaPassword.php" method="POST">
            <div class="form mt-3 mt-md-3">
                <h1>
                    <span>Verificacion De Codigo</span>
                    <i></i>
                </h1>
                
                <div class="col-12 input-box">
                    <input type="number" placeholder="Introduce el codigo" name="codigo" required>
                    <i></i>
                </div>
                <button class="col-6" id="botonEnviar" name="send" type="submit">Enviar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>