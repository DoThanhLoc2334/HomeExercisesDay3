<?php
include 'connectDb.php';
$conn = connectDb();
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $getImage = "SELECT image FROM products WHERE id = $id";
    $result = $conn->query($getImage);
    if($result && $result->num_rows > 0){
        $row = $result->fetch_assoc();
        $imagePath = $row['image'];
        if(file_exists($imagePath)){
            unlink( $imagePath); // Delete the image file
    }
    
    $sql = "DELETE FROM products WHERE id = $id";
    if($conn->query($sql) === TRUE){
        header("Location: viewProduct.php");
        exit();
    }else{
        echo "Error deleting record: " . $conn->error;
    }

} else{
    echo "No product found with the given ID.";
}
} else {
    echo "Invalid request.";
}
?>