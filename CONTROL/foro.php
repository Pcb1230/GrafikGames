<?php
session_start();
if(!isset($_SESSION["Usuario"])){  
    //echo "<script>window.location.href='../home.php?error=3'</script>";
    header("LOCATION:../home.php?error=3");
}else{
    if(empty($_POST["mensaje"])){
        echo "<script>window.location.href='../home.php?error=4'</script>";
    }else{
        include '../MODELO/upload.php';
        $mensaje=$_POST["mensaje"]; 
        $insert = $db->query("INSERT INTO foro (Usuario, Mensaje) VALUES ('".$_SESSION["Usuario"]."','".$mensaje."')");
        // if($insert){
        //     header("Location:../home.php");
        // }
    }
}
