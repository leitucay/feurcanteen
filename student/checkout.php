<?php
include '../db.php';
session_start();

$user_id = $_SESSION['user']['id'];
$cart = $_SESSION['cart'];

$total = 0;

$conn->query("INSERT INTO orders (user_id, total_amount, status, order_type) 
              VALUES ('$user_id', '0', 'pending', 'online')");

$order_id = $conn->insert_id;

foreach ($cart as $product_id) {
    $result = $conn->query("SELECT * FROM products WHERE id=$product_id");
    $product = $result->fetch_assoc();

    $price = $product['price'];
    $total += $price;

    $conn->query("INSERT INTO order_items (order_id, product_id, quantity, subtotal)
                  VALUES ('$order_id', '$product_id', 1, '$price')");
}

$conn->query("UPDATE orders SET total_amount='$total' WHERE id='$order_id'");

unset($_SESSION['cart']);

echo "Order placed successfully!";
?>
