  
<?php

session_start();

require_once ("php/CreateDb.php");
require_once ("php/component.php");

$db = new CreateDb("demo", "products");

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
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
<body>
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
                <li class="nav-item"> 
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
                    
                </li>
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
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h4>My Cart</h4>
                <hr>
                <div class= "d-flex flex-column-reverse">
                    <?php

                    $total = 0;
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                    cartElement($row['product_image'], $row['product_name'],$row['product_price'], $row['id']);
                                    $total = $total + (int)$row['product_price'];
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                    ?>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                        if (isset($_SESSION['cart'])){
                            $count  = count($_SESSION['cart']);
                            echo "<h6>Price ($count items)</h6>";
                        }else{
                            echo "<h6>Price (0 items)</h6>";
                        }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>$<?php
                        echo $total;
                        ?></h6>
                    </div>
                </div>
            </div>
            <h4 class="text-center text-info p-2">Complete your order!</h4>
            
            <form action="" method="post" id="placeOrder">
              <input type="hidden" name="products" value="<?= $allItems; ?>">
              <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
            </div>
            
            <div class="form-group">
                <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
            </div>
            <div class="form-group">
                <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
            </div>
            

            <a href="finish_order.php" class="btn btn-info d-flex justify-content-center mt-4 login_container ">
               <i class="far fa-credit-card"></i>&nbsp;&nbsp;Check Out
           </a>
           
       </div>
   </div>
</div>



</body>
</html>