<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "products";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn -> connect_error){
    die ("Connection failed: .$conn->connect_error");
}

$sql = "SELECT * FROM crud";
$result = $conn -> query ($sql);

$conn -> close();
?>

<!DOCTYPE html>
<head>
    <title>All Products</title>
</head>
<body>
    <h2>All Products</h2>
    <table border = "1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Created_At</th>
            <th>Updated_At</th>
            <th>Actions</th>
        </tr>
        <?php if ($result -> num_rows > 0): ?>
            <?php while($row = $result -> fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row ['id']; ?></td>
                    <td><?php echo $row ['name']; ?></td>
                    <td><?php echo $row ['description']; ?></td>
                    <td><?php echo $row ['price']; ?></td>
                    <td><?php echo $row ['quantity']; ?></td>
                    <td><?php echo $row ['created_at']; ?></td>
                    <td><?php echo $row ['updated_at']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $row['id']; ?> ">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?> " onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="8">No products found</td>
            </tr>
        <?php endif; ?>
    </table>
    <br>
    <a href="create.php">Create New Record</a>
</body>
</html>