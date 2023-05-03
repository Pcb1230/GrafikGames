<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>¡REGÍSTRATE!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="EstiloRegistro.css">
    <link rel="icon" href="imgs/logoGrafikGames.png">

  </head>
  <body>
    
    <div class="container col-12 border-bottom">
        <div class="row">
            <div class="col-12">
                <div class="col-12 imagenGrafik1">
                    <img src="imgs/logoGrafikGames.png" id="imagenGrafikGames1">
                </div>
                <p></p>
                <h1 class = "text-center "><span>¡Bienvenido a Grafik! <br><br> Donde sabemos que es lo mejor para ti</span></h1>
                <p><br></p>
                <h4 class="text-center"><a href="#formulario"><span><button id="botonEnviar">&#8595 &#8595 &#8595</button></a></span></h4>
            </div>
            
        </div>

        
    </div>

    

    <div class="container col-6 contenido">

        <div class="col-12 imagenGrafik2">
            <img src="imgs/logoGrafikGames.png" id="imagenGrafikGames2">
        </div>

        <form action="CONTROL/ModeloControlador.php" method="POST">

            <div class="form">
                <h1>
                    <span>Regístrate</span>
                    <i></i>
                </h1>
                
                <div class="row">
                    <div class="col-3 input-box">
                        <input type="text" name="usuario" required>
                        <span>Usuario</span>
                        <i></i>
                    </div>
                    
                    <div class="col-3 input-box">
                       <input type="text" name="nombreApellidos" required>
                        <span>Nombre y Apellidos</span>
                        <i></i> 
                    </div>
                    
                </div>
    
                <div class="row">
                    
                    <div class="input-box ">
                        <input type="password" name="password" id="contraseña" required>
                        <span>Contraseña</span>
                        <i></i>
                    </div>
    
                    <div class="input-box ">
                        <input type="password" id="contraseña2" onblur="comprobarcontraseña()" required>
                        <span>Repetir Contraseña</span>
                        <i></i>
                    </div>
                </div>
    
    
                <div class="row">
                    
                    <div class="input-box">
                        <input type="text" name="email" id="email" onblur="comprobarcorreo()" required>
                        <span>Correo Electronico</span>
                        <i></i>
                    </div>

                    
                    <div class="input-box">
                        <input type="text" id="direccion" name="direccion" onblur="comprobarTarjeta()" required>
                        <span>Dirección</span>
                        <i></i>
                    </div>
                </div>
    
                <label for="form"> <span>Sexo:</span></label>
                <div class="row" id="divSexo">
                    
                    <div class="col-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" id="radioHombre" value="hombre">
                            <label class="form-check-label" for="inlineRadio1"> <span>Hombre</span> </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" id="radioMujer" value="mujer">
                            <label class="form-check-label" for="inlineRadio2"><span>Mujer</span></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" id="radioSinGenero" value="--">
                            <label class="form-check-label" for="inlineRadio2"> <span>Prefiero no decirlo</span></label>
                        </div>
                    </div>
    
                    <i class="col-12"></i>
                </div>
    
                <div class="row">
                    <div class="input-box">
                        <input type="date" name="fecha" required  style="font-size:medium;">
                        <i></i>
                    </div>
                    
                    <div class="input-box">
                        <select id="pais" name="pais" class="form-control" onblur="comprobarTarjeta()">
                        <option disabled selected value="">Selecciona tu país</option>
                            <option value="Afganistán">Afganistán</option>
                            <option value="Albania">Albania</option>
                            <option value="Alemania">Alemania</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Antigua y Barbuda">Antigua y Barbuda</option>
                            <option value="Arabia Saudita">Arabia Saudita</option>
                            <option value="Argelia">Argelia</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaiyán">Azerbaiyán</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bangladés">Bangladés</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Baréin">Baréin</option>
                            <option value="Bélgica">Bélgica</option>
                            <option value="Belice">Belice</option>
                            <option value="Benín">Benín</option>
                            <option value="Bielorrusia">Bielorrusia</option>
                            <option value="Birmania/Myanmar">Birmania/Myanmar</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia y Herzegovina">Bosnia y Herzegovina</option>
                            <option value="Botsuana">Botsuana</option>
                            <option value="Brasil">Brasil</option>
                            <option value="Brunéi">Brunéi</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Bután">Bután</option>
                            <option value="Cabo Verde">Cabo Verde</option>
                            <option value="Camboya">Camboya</option>
                            <option value="Camerún">Camerún</option>
                            <option value="Canadá">Canadá</option>
                            <option value="Catar">Catar</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Chipre">Chipre</option>
                            <option value="Ciudad del Vaticano">Ciudad del Vaticano</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoras">Comoras</option>
                            <option value="Corea del Norte">Corea del Norte</option>
                            <option value="Corea del Sur">Corea del Sur</option>
                            <option value="Costa de Marfil">Costa de Marfil</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Croacia">Croacia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Dinamarca">Dinamarca</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egipto">Egipto</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Eslovaquia">Eslovaquia</option>
                            <option value="Eslovenia">Eslovenia</option>
                            <option value="España">España</option>
                            <option value="Estados Unidos">Estados Unidos</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Etiopía">Etiopía</option>
                            <option value="Filipinas">Filipinas</option>
                            <option value="Finlandia">Finlandia</option>
                            <option value="Fiyi">Fiyi</option>
                            <option value="Francia">Francia</option>
                            <option value="Gabón">Gabón</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Granada">Granada</option>
                            <option value="Grecia">Grecia</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea ecuatorial">Guinea ecuatorial</option>
                            <option value="Guinea-Bisáu">Guinea-Bisáu</option>
                            <option value="Haití">Haití</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hungría">Hungría</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Irak">Irak</option>
                            <option value="Irán">Irán</option>
                            <option value="Irlanda">Irlanda</option>
                            <option value="Islandia">Islandia</option>
                            <option value="Islas Marshall">Islas Marshall</option>
                            <option value="Islas Salomón">Islas Salomón</option>
                            <option value="Israel">Israel</option>
                            <option value="Italia">Italia</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japón">Japón</option>
                            <option value="Jordania">Jordania</option>
                            <option value="Kazajistán">Kazajistán</option>
                            <option value="Kenia">Kenia</option>
                            <option value="Kirguistán">Kirguistán</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Laos">Laos</option>
                            <option value="Lesoto">Lesoto</option>
                            <option value="Letonia">Letonia</option>
                            <option value="Líbano">Líbano</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libia">Libia</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lituania">Lituania</option>
                            <option value="Luxemburgo">Luxemburgo</option>
                            <option value="Macedonia del Norte">Macedonia del Norte</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malasia">Malasia</option>
                            <option value="Malaui">Malaui</option>
                            <option value="Maldivas">Maldivas</option>
                            <option value="Malí">Malí</option>
                            <option value="Malta">Malta</option>
                            <option value="Marruecos">Marruecos</option>
                            <option value="Mauricio">Mauricio</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="México">México</option>
                            <option value="Micronesia">Micronesia</option>
                            <option value="Moldavia">Moldavia</option>
                            <option value="Mónaco">Mónaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Níger">Níger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Noruega">Noruega</option>
                            <option value="Nueva Zelanda">Nueva Zelanda</option>
                            <option value="Omán">Omán</option>
                            <option value="Países Bajos">Países Bajos</option>
                            <option value="Pakistán">Pakistán</option>
                            <option value="Palaos">Palaos</option>
                            <option value="Panamá">Panamá</option>
                            <option value="Papúa Nueva Guinea">Papúa Nueva Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Perú">Perú</option>
                            <option value="Polonia">Polonia</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Reino Unido">Reino Unido</option>
                            <option value="República Centroafricana">República Centroafricana</option>
                            <option value="República Checa">República Checa</option>
                            <option value="República del Congo">República del Congo</option>
                            <option value="República Democrática del Congo">República Democrática del Congo</option>
                            <option value="República Dominicana">República Dominicana</option>
                            <option value="República Sudafricana">República Sudafricana</option>
                            <option value="Ruanda">Ruanda</option>
                            <option value="Rumanía">Rumanía</option>
                            <option value="Rusia">Rusia</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Cristóbal y Nieves">San Cristóbal y Nieves</option>
                            <option value="San Marino">San Marino</option>
                            <option value="San Vicente y las Granadinas">San Vicente y las Granadinas</option>
                            <option value="Santa Lucía">Santa Lucía</option>
                            <option value="Santo Tomé y Príncipe">Santo Tomé y Príncipe</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leona">Sierra Leona</option>
                            <option value="Singapur">Singapur</option>
                            <option value="Siria">Siria</option>
                            <option value="Somalia">Somalia</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Suazilandia">Suazilandia</option>
                            <option value="Sudán">Sudán</option>
                            <option value="Sudán del Sur">Sudán del Sur</option>
                            <option value="Suecia">Suecia</option>
                            <option value="Suiza">Suiza</option>
                            <option value="Surinam">Surinam</option>
                            <option value="Tailandia">Tailandia</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Tayikistán">Tayikistán</option>
                            <option value="Timor Oriental">Timor Oriental</option>
                            <option value="Togo">Togo</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad y Tobago">Trinidad y Tobago</option>
                            <option value="Túnez">Túnez</option>
                            <option value="Turkmenistán">Turkmenistán</option>
                            <option value="Turquía">Turquía</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Ucrania">Ucrania</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistán">Uzbekistán</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Yibuti">Yibuti</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabue">Zimbabue</option>
                        </select>
                        </select>
                    </div>
                </div>
                
                <div class="row justify-content-center col-12">
                    <div class="input-box" id="tarjeta" style="display:none;" >
                        <input type="text" name="Tarjeta" required>
                        <span>Tarjeta de Credito</span>
                        <i></i>
                    </div>
                </div>
                
                <div class="row justify-content-between col-12">
                    <div class="col-8 checkboxgrande">
                        <div class="form-check form-check-inline justify-content-around checkboxpequeñonotificaciones">
                            <input class="form-check-input" type="hidden" name="notificaciones" id="notificaciones2" value="No">
                            <input class="form-check-input" type="checkbox" name="notificaciones" id="notificaciones" value="Si">
                            <label class="form-check-label labelcheckbox" for="notificaciones"><span>Activar notificaciones</span> </label>
                        </div>
                        
                        <div class="form-check form-check-inline justify-content-around checkboxpequeñorevista">
                            <input class="form-check-input" type="hidden" name="revista" id="revista2" value="No">
                            <input class="form-check-input" type="checkbox" name="revista" id="revista" value="Si">
                            <label class="form-check-label labelcheckbox" for="revista"><span> Recibir revista digital</span></label><br><br>
                        </div>
                    </div>
                
                <button type="submit" id="botonEnviar">Enviar</button>

            </div>

        </form>
        <p id="textocorreo" style="display: none;color: red;"></p>
        <p id="contraseñacoincide" style="display: none;color: red;"></p>
        <p id="textoContraseña" style="display: none;color: red;"></p>
    </div>

    <div class="row text-center" style="margin-top: -12em;">
        <div class="col">
            <h3 class="align-self-center" style="color: white;">¿Ya tienes cuenta? o ¿no quieres crearla todavia?</h3><br>
            <h4 class="align-self-center" style="color: white;">Continua a la pagina principal</h4>
            <button onclick="location.href='home.php'" class="mt-2" type="button" id="botonEnviar">Inicio</button>
        </div>
    </div>
        <a name="formulario"></a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="js/javascript.js"></script>
    <script>
    form.addEventListener('submit', () => {
    if(document.getElementById("notificaciones").checked) {
        document.getElementById('notificaciones2').disabled = true;
    }
    });
    form.addEventListener('submit', () => {
    if(document.getElementById("revista").checked) {
        document.getElementById('revista2').disabled = true;
    }
    });
    </script>
    </body>
</html>