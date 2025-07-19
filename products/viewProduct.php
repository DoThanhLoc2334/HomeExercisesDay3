<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="createProduct.php" class="btn btn-secondary">Create New Product</a>
            </div>
        </div>

        <form action="viewProduct.php" method="get" class="mb-4">
            <div class="row g-2">
                <div class="col-md-10">
                    <input type="text" name="name" class="form-control" placeholder="Search by product name..." value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>"/>
                </div>
                <div class="col-md-2">
                    <input type="submit" value="Search" class="btn btn-primary w-100"/>
                </div>
            </div>
        </form>

        <h2>List of Products</h2>
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price (USD)</th>
                    <th>Stock Quantity</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connectDb.php';
                $conn = connectDb();

                $sql = "SELECT id, name, price, stock, image FROM products";
                if (isset($_GET['name']) && $_GET['name'] !== '') {
                    $search = $conn->real_escape_string($_GET['name']);
                    $sql .= " WHERE name LIKE '%$search%'";
                }

                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars(number_format($row['price'], 2)) . "</td>";
                        echo "<td>" . htmlspecialchars($row['stock']) . "</td>";
                        echo "<td><img src='" . htmlspecialchars($row['image']) . "' alt='Product Image' width='80' height='80'></td>";
echo "<td>
    <a href='updateProduct.php?id=" . $row['id'] . "' class='btn btn-success btn-sm'>Update</a>
    <a href='deleteProduct.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Bạn có chắc muốn xóa sản phẩm này không?');\">Delete</a>
</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No products found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
