<?php

session_start();

require_once ('php/CreateDb.php');
require_once ('php/component.php');


// create instance of Createdb class
$database = new CreateDb("demo", "products");

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

    <title>Search</title>
    <style type="text/css">
     
        /* Formatting search box */
        .search-box{
            width: 450px;
            position: relative;
            display: inline-block;
            font-size: 24px;
        }
        .search-box input[type="text"]{
            height: 42px;
            padding: 5px 10px;
            border: 1px solid #b58888;
            font-size: 24px;
        }
        .result{
            position: absolute;        
            z-index: -1;
            top: 100%;
            left: 0;
        }
        .search-box input[type="text"], .result{
            width: 100%;
            box-sizing: border-box;
        }
        /* Formatting result items */
        .result p{
            margin: 0;
            padding: 7px 10px;
            border: 1px solid #b58888;
            border-top: none;
            cursor: pointer;
            background: #c48a60;
        }
        
    </style>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.search-box input[type="text"]').on("keyup input", function(){
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if(inputVal.length){
                    $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
                } else{
                    resultDropdown.empty();
                }
            });
            
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());

        $(this).parent(".result").empty();
    }

    );

});
</script>
</head>
<header>
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

        
    </div>
</nav>
<body>
    <div class="search-box text-right banner">
        <input type="text" autocomplete="off" placeholder="Search your drink ..." />
        <div class="result"></div>
    </div>
</body>
</header>
</html>