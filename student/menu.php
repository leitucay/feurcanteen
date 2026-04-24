<?php
include '../db.php';

$result = $conn->query("SELECT * FROM products");

while ($row = $result->fetch_assoc()) {
?>
    <div>
        <h3><?php echo $row['name']; ?></h3>
        <p><?php echo $row['price']; ?></p>
        <button>Add to Cart</button>
    </div>
<?php } ?>
