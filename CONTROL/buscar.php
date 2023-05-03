<?php
$dato = $_POST["buscar"];
if(empty($dato)){
    header("LOCATION:../juegos.php?error=1");
}else{
include '../MODELO/upload.php';
$select = $db->query("SELECT * FROM juegos WHERE juegos.nombre = '".$dato."';");
$juego = mysqli_fetch_assoc($select);
if($juego!=null){
    header("LOCATION:../juegos.php?buscar=".str_replace(" ","+",$dato));
}else{
    header("LOCATION:../juegos.php?error=2");
}

}

