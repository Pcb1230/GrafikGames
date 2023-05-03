<?php
session_start();
include '../MODELO/upload.php';
if(isset($_GET['admin'])){
    $nuevoUsuario = $_POST["usuario"];
    $id = $_POST['id'];
    if(isset($_POST["submit"]) && !empty($nuevoUsuario)){
            //$insert = $db->query("UPDATE usuario SET Imagen = 'imgs/Usuarios/".$imagen."' WHERE usuario.id =".$_SESSION["Id"]);
            $insert = $db->query("UPDATE usuario SET usuario = '".$nuevoUsuario."' WHERE usuario.id =".$id);
            if($insert){
                header("Location:../usuario.php?modificarUsuario=".$id."&&success=1");//usuario cambiado correctamente
            }else{
                header("Location:../usuario.php?modificarUsuario=".$id."&&error=1"); //Error modificando el usuario
            }
        }else{
            header("Location:../usuario.php?modificarUsuario=".$id."&&error=2");//usuario vacio
        }




}else{
$nuevoUsuario = $_POST["usuario"];
if(isset($_POST["submit"]) && !empty($nuevoUsuario)){
                //$insert = $db->query("UPDATE usuario SET Imagen = 'imgs/Usuarios/".$imagen."' WHERE usuario.id =".$_SESSION["Id"]);
                $insert = $db->query("UPDATE usuario SET usuario = '".$nuevoUsuario."' WHERE usuario.id =".$_SESSION["Id"]);
                if($insert){
                    $_SESSION["Usuario"]=$nuevoUsuario;
                    header("Location:../Perfil.php?error=4");//usuario cambiado correctamente
                }else{
                    header("Location:../Perfil.php?error=5"); //Error modificando el usuario
                }
}else{
    header("Location:../Perfil.php?error=6");//usuario vacio
}
}
?>