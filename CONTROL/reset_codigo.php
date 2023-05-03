<?php
include '../MODELO/config.php';
$codigo= $_POST['codigo'];
$sql = "SELECT * FROM usuario u INNER JOIN informacion i ON u.id=i.id WHERE i.codigo=".$codigo;
          $handle = $db->prepare($sql);
          $handle->execute();
          $comprobar = $handle->fetchAll(PDO::FETCH_ASSOC);