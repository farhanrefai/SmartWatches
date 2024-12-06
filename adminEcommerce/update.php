<?php 
require("inc/db.php");

if ($_POST) {
    $productID = $_POST['productID'];
    $productName = $_POST['productName'];
    $price = (float) $_POST['price'];
    $availability = $_POST['status'];
    $image   = $_POST['image'];
    $quantity = (int) $_POST['quantity'];
    
    try {
        $query = 'UPDATE products SET productName = ?, price = ?, status = ?, image = ?, quantity = ? WHERE productID = ?';

        $stmt = mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($stmt, "sdssis",$productName,$price,$availability,$image,$quantity,$productID);
        

        if (mysqli_stmt_execute($stmt)) {
            header("Location: edit.php?id=".$productID."&status=updated");
            exit();
        }
        header("Location: edit.php?id=".$productID."&status=fail_update");
        exit();

    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    header("Location: edit.php?id=".$productID."&status=fail_update");
    exit();
}
?>