<?php 
require("inc/db.php");

if (isset($_GET['id'])) {
    // Delete record
    try {

        $query = "DELETE FROM products WHERE productID = ? LIMIT 1";
        $statement = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($statement, "s", $_GET['id']);
    
        
        if(mysqli_stmt_execute($statement)) { 
            header("Location: index.php?status=deleted");
            exit();
        }
        header("Location: index.php?status=fail_delete");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    // Redirect to index.php
    header("Location: index.php?status=fail_delete");
    exit();
}