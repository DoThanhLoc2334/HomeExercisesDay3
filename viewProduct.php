<?php
require_once "connectDb.php";
$conn = connectDb();
$result = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<head><title>Product List</title></head>
<body>
<h2>Product List</h2>
<a href="create.php">Add New Product</a>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th><th>Name</th><th>Price</th><th>Quantity</th><th>Image</th><th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td>$<?= $row['price'] ?></td>
        <td><?= $row['quantity'] ?></td>
        <td><img src="<?= $row['image'] ?>" width="80"></td>
        <td>
            <a href="update.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this product?')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
