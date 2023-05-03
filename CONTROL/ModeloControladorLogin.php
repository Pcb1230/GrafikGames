<?php
require '../MODELO/consultas.php';

//Datos del formulario de registro
$user=$_POST['usuario'];
$contrasena=$_POST['password'];
//Metemos los datos
$obj = new Consultas("usuario");
$Login=array();
$Login = $obj->select($user, $contrasena);
//$ArrayImg = $obj->img($user, $contrasena);
$id = $Login[0]->id;
$img= $Login[0]->Imagen;
$tipo = $Login[0]->Tipo;
//$img = $ArrayImg[0]->Imagen;

if(count($Login)>0){
    session_start();
    header("Location: ../home.php");
    $_SESSION["Usuario"]=$user;
    $_SESSION["ImagenUsuario"]=$img;
    $_SESSION["Id"]=$id;
    $_SESSION["tipo"]=$tipo;
    //setcookie("Usuario",$user,time()+3600,"/");
    //setcookie("Password",$contrasena,time()+10);
    //setcookie("ImagenUsuario",$img,time()+3600,"/");
    if($user=="Admin"){
        header("Location: ../Administracion.php");
    }
}else{
    header("Location: ../Login.php?error=1");
}


