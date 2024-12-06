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

if(isset($_POST["btnlogin"])){
    
    $email=($_POST["email"]);   
    $Password=$_POST["Password"];    

    $sql ="SELECT * FROM customer WHERE email='$email' AND Password='$Password'";
    $result=mysqli_query($connection,$sql);
    if(mysqli_num_rows($result)>0){
    echo '<script>alert("correcte")</script>';
      session_start();
      $_SESSION["email"]=$email;
    header("Location:index.html");
    }else{
        echo '<script>alert("not correcte")</script>';
    
        header("Location:login.html");
    }
    
}
if(isset($_POST["btnsignup"])){
    $email=$_POST["email"];   
    $Password=$_POST["password"];
    $Firstname=$_POST["first_name"];
    $Lastname=$_POST["last_name"];   
    $sql ="INSERT INTO customer VALUE ('$email','$Firstname','$Lastname','$Password')";
    mysqli_query($connection,$sql);
    session_start();
    $_SESSION["email"]=$email;
    header("Location:index.html");
}



    if(isset($_POST["logOut"])){
        session_start();
        // session_unset($_SESSION['mail']);
        session_destroy();
        header("Location:index.html");
    }
?>