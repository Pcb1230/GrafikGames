<?php
if(isset($_POST['submit_password'])){
  $email=$_POST['email'];
  $pass=$_POST['password'];
  include('../MODELO/config.php');   
  $sql = " SELECT * from informacion WHERE informacion.email ='".$email."'";
  $handle = $db->prepare($sql);
  $handle->execute();
  $getUser = $handle->fetch(PDO::FETCH_ASSOC);
  $sql = "
          UPDATE password set password='$pass' WHERE id='".$getUser["id"]."';
          UPDATE informacion SET codigo = 0 WHERE id='".$getUser["id"]."'";
  $handle = $db->prepare($sql);
  $handle->execute();
  unset($_SESSION['emailPassword']);
  header("Location:../Login.php?success");
}
?>