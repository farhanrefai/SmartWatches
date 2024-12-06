<?php 
require("inc/db.php");

$id = isset($_GET['id']) ? $_GET['id']:null;
try {
    if (isset($id)){
        $query = "SELECT * FROM products WHERE productID = ?";
        $statement = mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($statement,"s",$id);

    }else{
        echo "Error";
    }
    
    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);

    //fetching the products data
    $product = mysqli_fetch_assoc($result);

} catch (Exception $e) {
    echo "Error " . $e->getMessage();
    exit();
}


?>

<?php include("inc/header.php") ?>
    <div class="container">
        <a href="index.php" class="btn btn-light mb-3"><< Go Back</a>
        <!-- Show  a Product -->
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <strong><i class="fa fa-database"></i> Show Product</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Product ID</th>
                                <td><?= $product['productID'] ?></td>
                                <th>Product Name</th>
                                <td><?= $product['productName'] ?></td>
                            </tr>   
                            <tr>
                                <th>Price</th>
                                <td>Rs <?= number_format($product['price'], 2) ?></td>
                                <th>quantity</th>
                                <td><?= $product['quantity'] ?></td>
                            </tr>  
                            
                        </table>
                    </div>
                    <div class="col-3">
                        <img src="<?= $product['image'] ?>" alt="<?= $product['productName'] ?>" class="img-fluid img-thumbnail">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Show a product -->
        <br>
    </div><!-- /.container -->
<?php include("inc/footer.php") ?>