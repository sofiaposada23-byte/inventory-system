<?php

include 'connect.php';



$stmt = $pdo->query("SELECT * FROM products ORDER BY name");

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>

<html>

<head><title>Inventory List</title></head>

<body>

<img src="logo.png" alt="Logo" width="200"><br><br>

<h1>Current Inventory</h1>

<table border="1" cellpadding="5">

    <tr>

        <th>Barcode</th>

        <th>Name</th>

        <th>Quantity</th>

    </tr>

    <?php foreach ($products as $p): ?>

        <tr>

        <td><?= htmlspecialchars($p['barcode']) ?></td>

        <td><?= htmlspecialchars($p['name']) ?></td>

        <td><?= htmlspecialchars($p['quantity']) ?></td>

    </tr>

    <?php endforeach; ?>

</table>

<br>

<a href="add.php">Add Product</a> | <a href="delete.php">Delete Product</a>

</body>


