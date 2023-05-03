<?php
session_start();
$total=0;
foreach($_SESSION['cart_items'] as $cartItem){
  $total=$total+str_replace('.','',$cartItem['total_price']);
}
  require 'stripe/init.php';

  \Stripe\Stripe::setApiKey("sk_test_51N1lg1ExqbW9LhSthBGkt4NqpLy6VeEBpWQbv1H7CP9WXRzENgY7f91xvcz8yy9ZGUyPI10egIOXXGhqCRkgpILM00DZd7OppG");

  $token = $_POST["stripeToken"];

  $charge = \Stripe\Charge::create([
    "amount" => $total,
    "currency" => "eur",
    "description" => "Pago en mi tienda...",
    "source" => $token
  ]);

  header("LOCATION:../CONTROL/pedido.php");
?>