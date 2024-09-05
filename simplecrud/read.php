<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
<?php
include 'dbcon.php';

$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Products List</h2>
<table border="1">
    <tr>
        <th>Product ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><?php echo $product['prodID']; ?></td>
        <td><?php echo $product['name']; ?></td>
        <td><?php echo $product['description']; ?></td>
        <td><?php echo $product['quantity']; ?></td>
        <td><?php echo $product['price']; ?></td>
        <td><?php echo $product['createdat']; ?></td>
        <td><?php echo $product['updatedat']; ?></td>
        <td>
            <a href="update.php?id=<?php echo $product['prodID']; ?>">Edit</a> |
            <a href="delete.php?id=<?php echo $product['prodID']; ?>">Delete</a>
        </td>
        <a href="create.php" type="button" >Create</a>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>