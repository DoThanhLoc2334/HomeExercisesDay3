<?php
include 'connectDb.php';
$conn = connectDb();

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

$imagePath = '';

if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $uploadDir = 'uploads/';
    $imageName = basename($_FILES['image']['name']);
    $targetFile = $uploadDir . $imageName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $imagePath = $imageName; 
    }
}

if (!empty($imagePath)) {
    $sql = "UPDATE products SET name='$name', price='$price', stock='$quantity', image='$imagePath' WHERE id=$id";
} else {
    $sql = "UPDATE products SET name='$name', price='$price', stock='$quantity' WHERE id=$id";
}

if ($conn->query($sql) === TRUE) {
    header("Location: viewProduct.php");
    exit();
} else {
    header("Location: updateProduct.php?id=$id");
    exit();
}

$conn->close();
?>
