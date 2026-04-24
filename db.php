<?php$host = "localhost";
$dbname = "your_db";
$username = "your_user";
$password = "your_pass";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die('DB COnnection Failed');
}
?>
