<?php
include 'connectDb.php'; 
$conn = connectDb();
$productId = $_POST['id'];

$name = $_POST['name'];
$price = $_POST['price'];
$stock = $_POST['stock'];

$imagePath = '';

if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $uploadDir = 'uploads/';
    $imageName = basename($_FILES['image']['name']);
    $targetFile = $uploadDir . $imageName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $imagePath = $targetFile;
    }
}

$sql = "UPDATE products SET name='$name', price='$price', stock='$stock', image='$imagePath' WHERE id='$productId'";

if ($conn->query($sql) === TRUE) {
    header("Location: viewProduct.php");
    exit();
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
