<?php
include '../db.php';

$id = $_GET['id'];

$conn->query("UPDATE orders SET status='preparing' WHERE id=$id");

header("Location: dashboard.php");
?>
