<?php
include 'connectDb.php'; 
$conn = connectDb();

$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

$imagePath = '';

if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $uploadDir = 'uploads/';
    $imageName = basename($_FILES['image']['name']);
    $targetFile = $uploadDir . $imageName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $imagePath = $targetFile;
    }
}

$sql = "INSERT INTO products (name, price, stock, image) 
        VALUES ('$name', '$price', '$quantity', '$imagePath')";

if ($conn->query($sql) === TRUE) {
    header("Location: viewProduct.php");
    exit();
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
