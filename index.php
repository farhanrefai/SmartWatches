<?php
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'smartwatch';

    //connecting to the databse
    $connection = mysqli_connect($host,$username,$password,$database);

    // checking the connection
    if(!$connection){
        die("Connection failed" .mysqli_connect_error());
    }

    $query = "Select * from products where watchType='Sports Watches'";
    $result=mysqli_query($connection , $query);
    $query1 = "Select * from products where watchType='Casual Watches'";
    $result1=mysqli_query($connection , $query1);
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLOCKSY SMART WATCHES</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- menu section -->
    <header>
        <a href="index.html" class="logo"><img src="images/logo6.png" width="70px" height="50px"></a>

        <input type="checkbox" id="menu-bar">
        <label for="menu-bar"><i class='bx bx-menu'></i></label>
        
        <nav class="navbar">
            <ul>
                <li><a href="index.html">HOME</a></li>
                <li><a href="#">PRODUCTS</a>
                    <ul>
                        <li><a href="apple.html">Apple smart watches</a></li>
                        <li><a href="amazfit.html">Aamzfit smart watches</a></li>
                        <li><a href="haylou.html">haylou Smart Watches</a></li>
                        <li><a href="accessories.html">Accessories</a></li>
                    </ul>
                </li>
                <li><a href="about.html">ABOUT</a></li>
                <li><a href="contact.html">CONTACT</a></li>
                <li><a href="#">SIGN UP/LOGIN</a>
                    <ul>
                        <li><a href="signup.html">SIGN UP</a></li>
                        <li><a href="login.html">LOGIN</a></li>
                    </ul>
                </li>
                <i class='bx bx-shopping-bag' id="cart-icon"></i>

                <div class="cart">
                    <h2 class="cart-title">Your Cart</h2>

                    <div class="cart-content">
                        
                    </div>

                    <div class="total">
                        <div class="total-title">Total</div>
                        <div class="total-price">Rs.0</div>
                    </div>

                    <button type="button" class="btn-buy">Buy Now</button>
                    <i class="bx bx-x" id="cart-close"></i>
                </div>
                                  
            </ul>
        </nav> 
    </header>
    
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br>

    <!--------New products to arrive-->
    <section>
        <div class="categories">
            <div class="small-container">
                <div class="row">
                    <div class="col-3">
                        <img src="images/White Minimalist Smart Watch.png" height="310px">
                    </div>
                    <div class="col-3">
                        <img src="images/Black Purple.png" >
                    </div>
                    <div class="col-3">
                        <img src="images/Neutral Modern.png" >
                    </div>
                </div>
            </div>        
        </div>
    </section>

    <!--customers reviews-->
    
    <section id="testimonials">
        <div class="testimonial-heading">
            <span>Customers</span>
            <h1>Happy Reviews</h1>
        </div>
        <div class="testimonial-box-cotainer">
            <div class="testimonial-box">
                <div class="box-top">
                    <div class="profile">
                        <div class="profile-img">
                            <img src="images/review/gopi.png">
                        </div>
                        <div class="name-user">
                            <strong>Gopinathan</strong>
                        </div>
                    </div>
                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
                <div class="client-comments">
                    <p>Product is 100% genuine and original. Sri lankan best price. Fast service. Highly recommend ❤</p>
                </div>
            </div>
            <div class="testimonial-box">
                <div class="box-top">
                    <div class="profile">
                        <div class="profile-img">
                            <img src="images/review/mohammed.jpg">
                        </div>
                        <div class="name-user">
                            <strong>Mohammed Hassan</strong>
                        </div>
                    </div>
                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
                <div class="client-comments">
                    <p>Excellent service.Affordable prices ❤</p>
                </div>
            </div>
            <div class="testimonial-box">
                <div class="box-top">
                    <div class="profile">
                        <div class="profile-img">
                            <img src="images/review/Afra.jpg">
                        </div>
                        <div class="name-user">
                            <strong>Afra</strong>
                        </div>
                    </div>
                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
                <div class="client-comments">
                    <p>Super service...The seller is really good and reccomend the seller ❤❤❤❤❤</p>
                </div>
            </div>
            <div class="testimonial-box">
                <div class="box-top">
                    <div class="profile">
                        <div class="profile-img">
                            <img src="images/review/kenisan.png">
                        </div>
                        <div class="name-user">
                            <strong>Kenisan</strong>
                        </div>
                    </div>
                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
                <div class="client-comments">
                    <p>Best products, Best aftermarket warranty,best customer service.❤</p>
                </div>
            </div>
            <div class="testimonial-box">
                <div class="box-top">
                    <div class="profile">
                        <div class="profile-img">
                            <img src="images/review/gaysham.png">
                        </div>
                        <div class="name-user">
                            <strong>Gesham</strong>
                        </div>
                    </div>
                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
                <div class="client-comments">
                    <p>Excellent service.Affordable prices ❤</p>
                </div>
            </div>
            <div class="testimonial-box">
                <div class="box-top">
                    <div class="profile">
                        <div class="profile-img">
                            <img src="images/review/dinushan.png">
                        </div>
                        <div class="name-user">
                            <strong>Dinushan</strong>
                        </div>
                    </div>
                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
                <div class="client-comments">
                    <p>Highly recommended...good product❤</p>
                </div>
            </div>
        </div>
    </section>
        
    <section>
        <div class="small-container">
            <h2 class="title">Sports Watches</h2>
            <div class="shop-content">
        
<?php
    while ($row = mysqli_fetch_assoc($result)) {
        ?>

    <div class="product-box">
        <img src="<?php echo $row['image']; ?>" class="product-img">
        <h2 class="product-title"><?php echo $row['productName']; ?></h2>
        <h5><?php echo $row['brand']; ?></h5>
        <h6><?php echo $row['status']; ?></h6>

        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>

        <span class="product-price">Rs.<?php echo $row['price']; ?></span><br>
        <i class='bx bx-shopping-bag add-cart'></i>

   



                


        </div>
                <?php
                }
                ?>


            </div>
        </div>
    </section>


    <div class="small-container">
            <h2 class="title">Casual Smart Watches</h2>

            <div class="shop-content">
                <div class="product-box">
                <?php
    while ($row = mysqli_fetch_assoc($result1)) {
        ?>

    <div class="product-box">
        <img src="<?php echo $row['image']; ?>" class="product-img">
        <h2 class="product-title"><?php echo $row['productName']; ?></h2>
        <h5><?php echo $row['brand']; ?></h5>
        <h6><?php echo $row['status']; ?></h6>

        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>

        <span class="product-price">Rs.<?php echo $row['price']; ?></span><br>
        <i class='bx bx-shopping-bag add-cart'></i>

   



                


        </div>
                <?php
                }
                ?>
                </div>


            </div>
        </div>






    <script src="product.js"></script>

</body>
</html>

<?php
mysqli_close($connection);
?>