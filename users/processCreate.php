<?php
include 'connectUserDb.php';
$conn = connectUserDb();

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];

$sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $password, $email);

if ($stmt->execute()) {
    header("Location: viewUser.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

?>
