<?php

include_once("connections/connections.php");

$con = connection();

$sql = "SELECT * FROM products ORDER BY id ASC";
$products = $con ->query($sql) or die ($con->error);
$row = $products -> fetch_assoc();


// do{
//     echo $row ['firstname'] . " " . $row['lastname'] . "<br>";


// }while($row = $student -> fetch_assoc());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Information</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <h1>PRODUCTS INFORMATION</h1>
    <br>
    <br>

    <a href="insert.php"> <button class="btn">Add New</button></a>
    <div class="container">
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>DESCRIPTION</th>
            <th>PRICE</th>
            <th>QUANTITY</th>
            <th>ACTION</th>
        </tr>
        </thead>
        <tbody>
        <?php do{ ?>
        <tr>
        <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['quantity']; ?></td>

            <td>
                        <a href='edit.php?id=<?php echo $row['id'];?>'>Edit</a>
                        <a href='delete.php?id=<?php echo $row['id'];?>'>Delete</a>
            </td>
        </tr>
        <?php }while($row = $products -> fetch_assoc()) ?>

        </tbody>
    </table>
    </div>
</body>
</html>
