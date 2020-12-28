<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if($_SESSION["username"]=='admin'){
    header("location: admin/home_admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css" >
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    <link href="https://ka-f.fontawesome.com/releases/v5.15.1/css/free-v4-shims.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@1,700&display=swap" rel="stylesheet">

    <title>Account</title>
</head>
<body>
    <!--Header-->
    <header>
        <!--Nav-->
        <nav class="navbar navbar-expand-lg fixed-top nav-menu">
            <a href ="#"> <i class="fas fa-camera"></i> </a>
            <button class="navbar-toggle nav-button" type="button" data-toggle="collapse" 
            data-target="#navbar">
            <div class="bg-light bar1"></div>
            <div class="bg-light bar2"></div>
            <div class="bg-light bar3"></div>
        </button>
        <div class="collapse navbar-collapse justify-content-end text-uppercase font-weight-bold" id="navbar">
            <ul class="navbar-nav">
               
                
                <li class="nav-item"> <a href="welcome.php" class="nav-link m-2 menu">Home</a> </li>
                <li class="nav-item"> <a href="search.php" class="nav-link m-2 menu">Search</a> </li>
                <li class="nav-item"> <a href="#" class="nav-link m-2 menu">News</a> </li>
                <li class="nav-item"> <a href="product.php" class="nav-link m-2 menu">Products</a> </li>


                <li class="nav-item"> <a href="account.php" class="nav-link m-2 menu"><?php echo htmlspecialchars($_SESSION["username"]); ?> </a> </li>
                
            </ul>
        </div>
    </nav>
    <!--End of nav-->
    <!--Banner-->
    <div class ="text-light text-right banner">
        <h1 class=" display-4 text-center font-weight-bold heading">
            Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
        </h1>
        <p class="main text-center ">Welcome to our coffee </p>
        
        
        
        <div class="text-center">
            

            <a href="reset-password.php" class="btn btn-warning">Reset Password</a>
            
            
            <a href="logout.php" class="btn btn-danger">Sign Out</a>
            
            
        </div>
    </div>
    
    <!--End of banner-->
</header>
</body>
</html>