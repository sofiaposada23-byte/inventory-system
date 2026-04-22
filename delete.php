<?php
include 'connect.php';



$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $barcode = $_POST['barcode'];

    $stmt = $pdo->prepare("DELETE FROM products WHERE barcode = ?");

    $stmt->execute([$barcode]);

    $msg = $stmt->rowCount() ? "Product deleted." : "No product found with that barcode.";

}

?>

<!DOCTYPE html>

<html>

<head><title>Delete Product</title></head>

<body>

<h1>Delete Product</h1>

<?php if ($msg) echo "<p>$msg</p>"; ?>

<form method="post">

    Barcode (12 digits): <input type="text" name="barcode" maxlength="12" required><br><br>

    <input type="submit" value="Delete Product">

</form>

<br><a href="list.php">View Inventory</a>

</body>

</html>
