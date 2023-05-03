<?php

if(isset($_GET["borrar"])){
    require '../MODELO/consultas.php';
    $obj = new Consultas("usuario");
    $borrar = $obj->borrarUsuario($_GET['borrar']);
    header("Location:../Administracion.php?success.php");
}else{
    require 'MODELO/consultas.php';
    $obj = new Consultas("usuario");
    $Login=array();
    $Login = $obj->selectUsuarios();
}





