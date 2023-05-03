<?php
session_start();
if(!isset($_SESSION["Usuario"])){  
    echo "<script>window.location.href='../uploadmods.php?error=4'</script>";
}else{
include '../MODELO/upload.php';
$targetDir = "../imgs/mods/";
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$targetDir2 = "../Mods/";
$imagen= basename($_FILES["imagen"]["name"]);
$archivo= basename($_FILES["archivo"]["name"]);
$PathImagenes = $targetDir . $imagen;
$PathArchivo = $targetDir2 . $archivo;
if(isset($_POST["submit"]) && !empty($_FILES["imagen"]["name"]) && !empty($_FILES["archivo"]["name"])){
        if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $PathImagenes) && move_uploaded_file($_FILES["archivo"]["tmp_name"], $PathArchivo) ){
            // Insert image file name into database
            //$insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$imagen."', NOW())");
            $insert = $db->query("INSERT INTO mods(nombre,imagen,descripcion,archivo) VALUES ('".$nombre."','/imgs/Mods/".$imagen."','".$descripcion."','".$archivo."');");
            if($insert){
                header("Location:../uploadmods.php?error=1");
            }else{
                header("Location:../uploadmods.php?error=2");
            } 
        }
}else{
    header("Location:../uploadmods.php?error=3");
}
}
?>