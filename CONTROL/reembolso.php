<?php
session_start();
if(!isset($_SESSION["Usuario"])){  
    echo "<script>window.location.href='../pedidos.php?error=1'</script>";
}else{
    include '../MODELO/config.php';
    $idPedido=$_GET['pedido'];
    $idUsuario= $_SESSION['Id'];
    $insert = $db->query("UPDATE pedidos SET Reembolsado = 'Si' WHERE pedidos.id = $idPedido AND pedidos.idUsuario = $idUsuario");
    echo "<script>window.location.href='../pedidos.php?success=$idPedido'</script>";
}