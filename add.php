<?php
include 'connect.php';

$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $barcode = $_POST['barcode'];
    $name = $_POST['name'];
    $qty = $_POST['quantity'];

    if (strlen($barcode) !== 12 || !ctype_digit($barcode)) {
	    $msg = "Barcode must be exactly 12 digits.";
    } else {
	    $stmt = $pdo->prepare("INSERT INTO products (barcode, name, quantity) VALUES (?, ?, ?)");
	    try {
		$stmt->execute([$barcode, $name, $qty]);
		$msg = "Product added successfully.";
	    } catch (PDOException $e) {
		    $msg = "Error: " . $e->getMessage();
	    }
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Product</title></head>
<body>
<h1>Add Product</h1>
<?php if ($msg) echo "<p>$msg</p>"; ?>
<form method="post">
    Barcode (12 digits): <input type="text" name="barcode" maxlength="12" required><br><br>
    Name: <input type="text" name="name" required><br><br>
    Quantity: <input type="number" name="quantity" min="0" required><br><br>
    <input type="submit" value="Add Product">
</form>
<br><a href="list.php">View Inventory</a>
</body>
</html>

