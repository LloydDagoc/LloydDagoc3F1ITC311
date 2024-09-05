<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
<?php
include 'dbcon.php';

if(isset($_GET['id'])){
    $prodID = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM products WHERE prodID = ?");
    $stmt->execute([$prodID]);

    echo "Deletion is Success!<br><a href='read.php'>Back</a>";
}
?>
</body>
</html>