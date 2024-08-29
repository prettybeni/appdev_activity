<?php

include_once("connections/connections.php"); 
$con = connection();

if (isset($_GET["id"])) {
    $id = $_GET["id"];


    $sql = "DELETE FROM products WHERE id = '$id'";
    $result = $con->query($sql);

    if (!$result) {
        echo "Error: " . $con->error;
    } else {
        echo "Record deleted successfully";
    }
}

header("location:index.php");
exit;
?>