<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}

if (isset($_POST['remove'])) {
  $index = $_POST['index'];

  $database = file_get_contents('database.json');
  $data = json_decode($database, true);
  $cart = $data['cart'];

  if (isset($cart[$index])) {
    unset($cart[$index]);
    $data['cart'] = array_values($cart);
    file_put_contents('database.json', json_encode($data));
  }
}

header('Location: cart.php');
exit();
?>