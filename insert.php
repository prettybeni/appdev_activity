<?php

include_once("connections/connections.php");

$con = connection();

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    
    $sql = "INSERT INTO `products`( `name`, `description`,  `price`, `quantity`) VALUES ('$name','$description','$price','$quantity')";
    $con ->query($sql) or die($con->error);

    echo header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Information</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        body{
            width: 50%;
            text-align: center;
        }
        .container{
            border: 2px solid black;
            margin: 50px;
            padding:50px;
            text-align: center;
            
        }
        .form{
            display:inline;
        }

    </style>

</head>
<body>
    <div class="container">
        <form action="" method="post" class="form">
            <label for="">Name</label>
            <input type="text" name="name" id="search">

            <label for="">Description</label>
            <input type="text" name="description" id="search">

            <label for="">Price</label>
            <input type="text" name="price" id="search">

            <label for="">Quantity</label>
            <input type="text" name="quantity" id="search">


            <input type="submit" name="submit" value="Submit">

        </form>
    </div>
    
</body>
</html>