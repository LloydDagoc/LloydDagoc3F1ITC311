<?php
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $createdat = $_POST['createdat'];
    $updatedat =  $_POST['updatedat'];

    $stmt = $pdo->prepare("INSERT INTO products (name, description, price, quantity, createdat, updatedat) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $description, $price, $quantity, $createdat, $updatedat]);

    echo "Product created successfully!";
}
?>

<h2>Create New Product</h2>
<form method="POST">
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" required></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td><input type="text" name="description" required></td>
        </tr>
        <tr>
            <td>Price:</td>
            <td><input type="text" name="price" required></td>
        </tr>
        <tr>
            <td>Quantity:</td>
            <td><input type="number" name="quantity" required></td>
        </tr>
        <tr>
            <td>Createdat:</td>
            <td> <input type="datetime-local"name="createdat" autocomplete="off"></td>
        </tr>
        <tr>
            <td>Updatedat:</td>
            <td> <input type="datetime-local"name="updatedat" autocomplete="off"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Create Product"></td>
        </tr>
        
        <tr>
        <td colspan= "2"><a href="read.php" type="button" >Retrieve Data</a></td>
        </tr>
    </table>
</form>