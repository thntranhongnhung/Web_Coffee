<?php

session_start();

require_once ('php/CreateDb.php');
require_once ('php/component.php');


// create instance of Createdb class
$database = new CreateDb("demo", "products");
if (isset($_POST['detail'])){
    /// print_r($_POST['product_id']);
    
    $item = array(
        'product_id' => $_POST['product_id']
    );

        // Create new session variable
    $_SESSION['detail'][0] = $item;
    
    

    print_r($_SESSION['detail']);
    header("location: detail_product.php");

}
if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        

        $count = count($_SESSION['cart']);
        $item_array = array(
            'product_id' => $_POST['product_id']
        );

        $_SESSION['cart'][$count] = $item_array;
        

    }else{

        $item_array = array(
            'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
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


    
    <title>Shopping Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    

    
</head>

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
            
            <a href="cart.php" class="nav-item nav-link active nav-link m-2 menu">
                <h5 class="px-5 cart">
                    <i class="fas fa-shopping-cart"></i> Cart
                    <?php

                    if (isset($_SESSION['cart'])){
                        $count = count($_SESSION['cart']);
                        echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                    }else{
                        echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                    }

                    ?>
                </h5>
            </a>
            
            
        </ul>
    </div>
</nav>
<div class ="text-light text-right banner">
    <h1 class=" display-4 text-center font-weight-bold heading">
        Welcome to Coffee Shop
    </h1>
    <p class="main text-center ">Begin your dreams to the land of coffee </p>
</div>


</header>
<body >
    <section class="most-liked p-5">
        <div class="video-container">
            <video class="bg-video" autoplay muted loop>
                <source src="image/video/vid3.mp4" type="video/mp4">
                    <source src="image/video/vid3.webm"   
                </video>
            </div>
            <div class="container-fluid">
                <div  class="row">
                    <div class="col text-center py-5">
                        <h1 class="text-uppercase text-color font-weight-bold">Menu</h1>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="row text-center py-5">
                            <?php
                            $result = $database->getData();
                            while ($row = mysqli_fetch_assoc($result)){
                                component($row['product_name'], $row['product_price'], $row['product_image'], $row['id'], $row['product_detail']);
                                
                            }
                            ?>
                        </div>
                    </div>
                    
                </section>
            </body>
            </html>