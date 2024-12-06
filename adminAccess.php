<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'smartwatch';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection){
    die("Connection Failed" .mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $email = $_POST['email'];
    $password = $_POST['Password'];

    $query = "Select * from admin where email = ? and password = ?";
    $statement = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($statement, "ss", $email, $password);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);

    if(mysqli_num_rows($result)>0)
    {
        //session_start();

        // Fetch user details
        //$user = mysqli_fetch_assoc($result);
    
        // Store user email in session variable
        //$_SESSION['user_email'] = $user['email'];
        
    
        // Redirect to the index page
        header("Location: adminEcommerce/index.php");
        exit();
    }
    else{
        echo '<script>alert("Invalid Credentials"); window.location.href = "login.html";</script>';
    }

    mysqli_stmt_close($statement);
}
mysqli_close($connection);

?>