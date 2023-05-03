<?php
    session_start();
    include '../MODELO/upload.php';
if(isset($_GET['admin'])&& $_SESSION['tipo']=='Administrador'){
    $nuevoEmail = $_POST["email"];
    $id = $_POST['id'];
    if(isset($_POST["submit"]) && !empty($nuevoEmail)){
                    $insert = $db->query("UPDATE informacion SET email = '".$nuevoEmail."' WHERE informacion.id =".$id);
                    if($insert){
                        header("Location:../usuario.php?modificarUsuario=".$id."&&success=1");//email cambiado correctamente
                    }else{
                        header("Location:../usuario.php?modificarUsuario=".$id."&&error=1"); //Error modificando el email
                    }
    }else{
        header("Location:../usuario.php?modificarUsuario=".$id."&&error=2");//email vacio
    }
}else{
$nuevoEmail = $_POST["email"];
if(isset($_POST["submit"]) && !empty($nuevoEmail)){
                $insert = $db->query("UPDATE informacion SET email = '".$nuevoEmail."' WHERE informacion.id =".$_SESSION["Id"]);
                if($insert){
                    header("Location:../Perfil.php?error=7");//email cambiado correctamente
                }else{
                    header("Location:../Perfil.php?error=8"); //Error modificando el email
                }
}else{
    header("Location:../Perfil.php?error=9");//email vacio
}
}
?>