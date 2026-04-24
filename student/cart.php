<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['add'])) {
    $id = $_GET['add'];
    $_SESSION['cart'][] = $id;
}

echo "<h2>Cart</h2>";

foreach ($_SESSION['cart'] as $item) {
    echo "Product ID: " . $item . "<br>";
}

echo '<a href="checkout.php">Proceed to Checkout</a>';
?>
