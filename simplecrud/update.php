<?php
include 'dbcon.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize input data
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $price = htmlspecialchars($_POST['price']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $createdat = date('Y-m-d H:i:s');
    $updatedat = $createdat;
    $prodID = intval($_POST['prodID']);

   try{
    $stmt = $pdo->prepare("UPDATE products SET name = ?, description = ?, quantity = ?, price = ?, createdat = ?, updatedat = ? WHERE prodID = ?");
    $stmt->execute([$name, $description, $quantity, $price, $createdat, $updatedat, $prodID]);

    echo "Product updated successfully!";
  
    header("Location: read.php");
    exit(); 
     }  catch (PDOException $e) {
    echo "Error updating record: " . $e->getMessage();
   }
}

// Fetch the product details if `id` is set in the URL
if (isset($_GET['id'])) {
    $prodID = intval($_GET['id']); // Retrieve and sanitize prodID from GET data
    $stmt = $pdo->prepare("SELECT * FROM products WHERE prodID = ?");
    $stmt->execute([$prodID]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<h2>Update Product</h2>
<form method="POST">
    <input type="hidden" name="prodID" value="<?php echo htmlspecialchars($product['prodID']); ?>">
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td><input type="text" name="description" value="<?php echo htmlspecialchars($product['description']); ?>" required></td>
        </tr>
        <tr>
            <td>Price:</td>
            <td><input type="number" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required></td>
        </tr>
        <tr>
            <td>Quantity:</td>
            <td><input type="text" name="quantity" value="<?php echo htmlspecialchars($product['quantity']); ?>" required></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Update Product"></td>
        </tr>
    </table>
</form>
