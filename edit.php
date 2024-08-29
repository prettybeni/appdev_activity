<?php

include_once("connections/connections.php");

$con = connection();

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if (!isset($_GET["id"])){
        header("location:index.php");
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM products WHERE id=$id";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();

    if (!$row){
        header("location:index.php");
        exit;        
    }

    $name = "";
    $description = "";
    $price = "";
    $quantity = "";

    $errorMessage = "";
    $successMessage = "";

} else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

    do {
        if (empty($id) || empty($name) || empty($description) || empty($price) || empty($quantity)) {
            $errorMessage = "All the fields are required";
            break;
        }
        
        $sql = "UPDATE products SET name = '$name', description='$description', price= '$price', quantity = '$quantity' WHERE id='$id'";

        $result = $con->query($sql);
        if(!$result){
            $errorMessage = "Invalid query: " . $con->error;
            break;
        }
        $successMessage = "Products added correctly";
        header("location:index.php");
        exit;

    } while (false);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Products</title>
   
</head>
<body>
    <div class="container my-5">
        <h2>Products</h2>

        <?php
        if(!empty($errorMessage)){
            echo"
            <div class= 'alert alert-warning alert dismissible fade show' role = 'alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";

        }
        ?>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="description" value="<?php echo $row['description'];?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="price" value="<?php echo $row['price'];?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="quantity" value="<?php echo $row['quantity'];?>">
                </div>
            </div>

            <?php
            if(!empty($successMessage)){
                echo"
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class= 'alert alert-success alert-dismissible fade show' role= 'alert'>
                            <strong>$successMessage</strong>
                            <button type= 'button' class='btn-close' data-bs-dismiss= 'alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
            <div class="row mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col sm-3 d-grid">
                <a class="btn btn-outline-primary" href="/index.php" role="button">Cancel</a>

            </div>
        </form>

    </div>
    
</body>
</html>