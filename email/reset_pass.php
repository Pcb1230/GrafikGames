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
      <div class="row">
        <div class="col-12 imagenGrafik1">
          <a href="../home.php"><img src="../imgs/logoGrafikGames.png"  id="imagenGrafikGames1" alt="Logo de la Pagina"></a>
      </div>
    </div>
        <form method="POST" action="submit_new.php">
            <div class="form">
                <h1>
                    <span>Escribe Tu Nueva Contraseña</span>
                    <i></i>
                </h1>
                
                <div class="col-12 input-box">
                    <input type="hidden" name="email" value="<?php   $email=$_GET['key']; echo $email;?>">
                    <input type="password" placeholder="Nueva Contraseña" name="password" required>
                    <i></i>
                </div>
				<?php
		?>
                <button class="col-6" id="botonEnviar" name="submit_password" type="submit">Enviar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>