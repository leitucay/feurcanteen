<?php
include '../db.php';

$result = $conn->query("SELECT * FROM orders WHERE status='pending'");

while ($row = $result->fetch_assoc()) {
?>
    <div>
        Order ID: <?php echo $row['id']; ?>
        Total: <?php echo $row['total_amount']; ?>

        <a href="update.php?id=<?php echo $row['id']; ?>">Accept</a>
    </div>
<?php } ?>
