<?php 
//import statement from db.php
require("inc/db.php");

if ($_POST) {
    $productName = ($_POST['ProductName']);
    $price = (float) ($_POST['price']);
    $availability =  $_POST['availability'];
    $quantity = (int) $_POST['quantity'];
    $image   = ($_POST['image']);

    try {
        $query = "INSERT INTO products(ProductName,price,status,quantity,image)
        values (?, ?, ?, ?, ?)";
        // no data will shown in UI these are prepared statements
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt,"sdsis",$productName,$price,$availability,$quantity,$image);
        
        
        if (mysqli_stmt_execute($stmt)) {
            header("Location: create.php?status=created");
            exit();
        }
        header("Location: create.php?status=fail_create");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    header("Location: create.php?status=fail_create");
    exit();
}
?>