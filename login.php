<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        $_SESSION['user'] = $user;

        if ($user['role'] == 'admin') {
            header("Location: admin/dashboard.php");
            exit();
        } elseif ($user['role'] == 'cashier') {
            header("Location: cashier/dashboard.php");
            exit();
        } else {
            header("Location: student/menu.php");
            exit();
        }

    } else {
        echo "Invalid login";
    }
}
?>
