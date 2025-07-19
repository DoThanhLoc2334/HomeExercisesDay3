<?php
include 'connectDb.php';
$conn = connectDb();

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Update Product</h2>

    <form action="processUpdate.php" method="post" enctype="multipart/form-data" class="border p-4 bg-white rounded shadow">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $product['name']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price ($)</label>
            <input type="number" name="price" class="form-control" value="<?php echo $product['price']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock Quantity</label>
            <input type="number" name="stock" class="form-control" value="<?php echo $product['stock']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Current Image</label><br>
            <img src="<?php echo $product['image']; ?>" alt="Product Image" width="120" class="img-thumbnail">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Upload New Image (optional)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="viewProduct.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
