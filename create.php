<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "products";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die ("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['create'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO crud (name, description, price, quantity) VALUES ('$name', '$description', '$price', '$quantity')";
    if($conn->query($sql) === TRUE) {
        header("Location: read.php");
    } else{
        echo "Error: " . $sql . "<br>" . $conn-> error;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <h2>Create Product</h2>
    <form method="post" action ="">
        Name: <input type="text" name = "name" required> <br>
        Description: <input type="text" name = "description"> <br>
        Price: <input type="number" name = "price" required> <br>
        Quantity: <input type="number" name = "quantity" required> <br>
        <input type="submit" name = "create" value = "Create">
    </form>
</body>
</html>
