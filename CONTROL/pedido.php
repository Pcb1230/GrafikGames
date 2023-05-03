<?php
session_start();
if(!isset($_SESSION["Usuario"])){  
    echo "<script>window.location.href='../cart.php?error=1'</script>";
}else{
    $fecha = date("d/m/Y");
    include '../MODELO/config.php';
    $total=0;
    foreach($_SESSION['cart_items'] as $cartItem){
        $total=$total+$cartItem['total_price'];
    }
    $insert = $db->query("INSERT INTO pedidos (id, idUsuario, Usuario, Total, Fecha, Rembolsado) VALUES (NULL, '".$_SESSION['Id']."', '".$_SESSION['Usuario']."','".$total."','".$fecha."','No')");
    $idPedido = $db->lastInsertId();
    foreach($_SESSION['cart_items'] as $cartItem){
        
        $insert2 = $db->query("INSERT INTO pedidos_detalles (id, idPedido, idJuego, Juego, Precio, Cantidad, Total) VALUES (NULL, '".$idPedido."', '".$cartItem['product_id']."', '".$cartItem['product_name']."', '".$cartItem['product_price']."', '".$cartItem['qty']."', '".$cartItem['total_price']."')");
    }
    unset($_SESSION['cart_items']);
    echo "<script>window.location.href='../cart.php?success'</script>";
}