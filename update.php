<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "products";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn ->connect_error){
    die("Connection failed: " . $conn-> connect_error);
}

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM crud WHERE id= $id";
    $result = $conn-> query($sql);
    $row = $result -> fetch_assoc();
}

if (isset($_POST ['update'])){
    $id = $_POST ['id'];
    $name = $_POST ['name'];
    $description = $_POST ['description'];
    $price = $_POST ['price'];
    $quantity = $_POST ['quantity'];

    $sql = "UPDATE crud SET name = '$name', description = '$description', price = '$price', quantity = '$quantity' WHERE id = $id";
    if ($conn -> query($sql) === TRUE){
        header ("Location: read.php");
    } else{
        echo "Error updating record: " . $conn-> error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>
    <form method="post" action ="">
        <input type="hidden" name = "id" value = "<?php echo $row ['id']; ?> ">
        Name: <input type="text" name = "name" value = "<?php echo $row ['name']; ?>" required> <br>
        Description: <input type="text" name = "description" value = "<?php echo $row ['description']; ?>" required>> <br>
        Price: <input type="number" name = "price" value = "<?php echo $row ['price']; ?>" required> <br>
        Quantity: <input type="number" name = "quantity" value = "<?php echo $row ['quantity']; ?>" required> <br>
        <input type="submit" name = "update" value = "Update">
    </form>
  
</body>
</html>