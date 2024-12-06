<?php 
require("inc/db.php");

// Check if 'id' is set in the URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

try {
    if (isset($id)) {
        $query = "SELECT * FROM products WHERE productID = ?";
        $statement = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($statement, "s", $id);
    } else {
        echo "Error";
    }

    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);

    // Fetch the product data
    $product = mysqli_fetch_assoc($result);

} catch (Exception $e) {
    echo "Error " . $e->getMessage();
    exit();
}
?>

<?php include("inc/header.php") ?>
    <div class="container">
    <a href="index.php" class="btn btn-light mb-3"><< Go Back</a>
        <?php if (isset($_GET['status']) && $_GET['status'] == "updated") : ?>
        <div class="alert alert-success" role="alert">
            <strong>Updated</strong>
        </div>
        <?php endif ?>
        <?php if (isset($_GET['status']) && $_GET['status'] == "fail_update") : ?>
        <div class="alert alert-danger" role="alert">
            <strong>Fail Update</strong>
        </div>
        <?php endif ?>
        <!-- Create Form -->
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <strong><i class="fa fa-edit"></i> Edit Product</strong>
            </div>
            <div class="card-body">
                <form action="update.php" method="post">
                    <input type="hidden" name="productID" value="<?= $product['productID'] ?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="productName" class="col-form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="productName" placeholder="productName" required value="<?= $product['productName'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name" class="col-form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="price" required value="<?= $product['price'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="price" class="col-form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="quantity" required value="<?= $product['quantity'] ?>" >
                        </div>
                       
                        <div class="form-group col-md-4">
                            <label for="image" class="col-form-label">Image</label>
                            <input type="text" class="form-control" name="image" id="image" placeholder="Image URL" value="<?= $product['image'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image" class="col-form-label">Status</label>
                            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?= $product['status'] ?>">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Save</button>
                </form>
            </div>
        </div>
        <!-- End create form -->
        <br>
    </div><!-- /.container -->
<?php include("inc/footer.php") ?>