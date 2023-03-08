<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Cart</title>
</head>
<body>
  <h1>Cart</h1>
  <?php
  session_start();
  if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
  }

  $database = file_get_contents('database.json');
  $cart = json_decode($database, true)['cart'];

  if (count($cart) === 0) {
    echo '<p>Your cart is empty.</p>';
  } else {
    echo '<ul>';
    $totalPrice = 0;
    foreach ($cart as $index => $item) {
      $totalPrice += $item['price'];
      echo '<li>' . $item['name'] . ' - $' . $item['price'];
      echo '<form method="post" action="remove-item.php">';
      echo '<input type="hidden" name="index" value="' . $index . '">';
      echo '<button type="submit" name="remove">Clear</button>';
      echo '</form>';
      echo '</li>';
    }
    echo '</ul>';
    echo '<p>Total price: $' . $totalPrice . '</p>';
    echo '<form method="post" action="checkout.php">';
    echo '<button type="submit" name="checkout">Proceed to Checkout</button>';
    echo '</form>';
  }
  ?>

  <a href="home.php">GO HOME</a>


</body>
</html>
