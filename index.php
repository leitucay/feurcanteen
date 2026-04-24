<?php
session_start();

// If user is already logged in
if (isset($_SESSION['user'])) {

    $role = $_SESSION['user']['role'];

    if ($role == 'admin') {
        header("Location: admin/dashboard.php");
        exit();
    } elseif ($role == 'cashier') {
        header("Location: cashier/dashboard.php");
        exit();
    } else {
        header("Location: student/menu.php");
        exit();
    }

} else {
    // If not logged in, go to login page
    header("Location: login.php");
    exit();
}
?>
