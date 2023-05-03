<?php
session_start();
include '../MODELO/upload.php';
$targetDir = "../imgs/Usuarios/";
$imagen= basename($_FILES["imagen"]["name"]);
$PathImagenes = $targetDir . $imagen;
if(isset($_GET['admin'])&& $_SESSION['tipo']=='Administrador'){
    $id = $_POST['id'];
    if(isset($_POST["submit"]) && !empty($_FILES["imagen"]["name"])){
        if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $PathImagenes)){
            // Insert image file name into database
            //$insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$imagen."', NOW())");
                $insert = $db->query("UPDATE usuario SET Imagen = 'imgs/Usuarios/".$imagen."' WHERE usuario.id =".$id);
                if($insert){
                    header("Location:../usuario.php?modificarUsuario=".$id."&&success=1");
                }else{
                    header("Location:../usuario.php?modificarUsuario=".$id."&&error=1");
                } 
        }
}else{
    header("Location:../usuario.php?modificarUsuario=".$id."&&error=2");
}
}else{
    if(isset($_POST["submit"]) && !empty($_FILES["imagen"]["name"])){
        if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $PathImagenes)){
            // Insert image file name into database
            //$insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$imagen."', NOW())");
                $insert = $db->query("UPDATE usuario SET Imagen = 'imgs/Usuarios/".$imagen."' WHERE usuario.id =".$_SESSION["Id"]);
                if($insert){
                    $_SESSION["ImagenUsuario"]="imgs/Usuarios/".$imagen;
                    header("Location:../Perfil.php?error=1");
                }else{
                    header("Location:../Perfil.php?error=2");
                } 
                header("Location:../Perfil.php?error=4");
        }
}else{
    header("Location:../Perfil.php?error=3");
}
}
?>