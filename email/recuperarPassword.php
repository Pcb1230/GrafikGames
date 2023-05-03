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
                      <h3>Introduce un Correo Valido</h3>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              <?php
              }
      ?>
    </div>
        <form method="POST">
            <div class="form">
                <h1>
                    <span>Recupera Tu Contraseña</span>
                    <i></i>
                </h1>
                
                <div class="col-12 input-box">
                    <input type="email" placeholder="Tu Email" name="customer_email" required>
                    <i></i>
                </div>
				<?php
			if (isset($_POST['send'])){
				include("sendemail.php");//Mando a llamar la funcion que se encarga de enviar el correo electronico
				/*Configuracion de variables para enviar el correo*/
				$mail_username="pedrocasado2001@gmail.com";//Correo electronico saliente ejemplo: tucorreo@gmail.com
				$mail_userpassword="tiiapiqudkiqdoxe";//Tu contraseña de gmail
				$mail_addAddress=$_POST['customer_email'];//correo electronico que recibira el mensaje
				$template="email_template.html";//Ruta de la plantilla HTML para enviar nuestro mensaje
				
				/*Inicio captura de datos enviados por $_POST para enviar el correo */
				$mail_setFromEmail=$_POST['customer_email'];
				// $mail_setFromName=$_POST['customer_name'];
				// $txt_message=$_POST['message'];
				$mail_subject="Recupera Tu Password";
				
				//sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);//Enviar el mensaje
				sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_subject,$mail_addAddress,$template);//Enviar el mensaje
			}
		?>
                <button class="col-6" id="botonEnviar" name="send" type="submit">Enviar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>