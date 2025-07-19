<?php
include 'connectUserDb.php';
$conn = connectUserDb();

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];

$sql = "UPDATE users SET username = ?, password = ?, email = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $username, $password, $email, $_POST['id']);

if ($stmt->execute()) {
    header("Location: viewUser.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

?>
