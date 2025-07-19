<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2>Update User</h2>
    <form action="processUpdate.php" method="post">
        <div class="mb-3">
            <label>Username:</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <button type="submit" class="btn btn-success">Update</button>
        <a href="viewUser.php" class="btn btn-secondary">Back</a>
    </form>
</body>
</html>
