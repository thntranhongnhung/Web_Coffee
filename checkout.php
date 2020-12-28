<?php

session_start();

require_once ("php/CreateDb.php");
require_once ("php/component.php");

$db = new CreateDb("demo", "products");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="main.css" >
  <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
  <link href="https://ka-f.fontawesome.com/releases/v5.15.1/css/free-v4-shims.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@1,700&display=swap" rel="stylesheet">
  <title>Check Out</title>

  

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />



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


<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6 px-4 pb-4" id="order">
      <h4 class="text-center text-info p-2">Complete your order!</h4>
      
      <form action="" method="post" id="placeOrder">
        <input type="hidden" name="products" value="<?= $allItems; ?>">
        <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
        <div class="form-group">
          <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
        </div>
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" required>
        </div>
        <div class="form-group">
          <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
        </div>
        <div class="form-group">
          <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
        </div>
        <h6 class="text-center lead">Select Payment Mode</h6>
        <div class="form-group">
          <select name="pmode" class="form-control">
            <option value="" selected disabled>-Select Payment Mode-</option>
            <option value="cod">Cash On Delivery</option>
            <option value="netbanking">Net Banking</option>
            <option value="cards">Debit/Credit Card</option>
          </select>
        </div>

        <div class="form-group">
          <a href="finish_order.php" class="btn btn-danger btn-block d-flex justify-content-center mt-4 login_container ">
           Place Order
         </a>
         
       </div>
     </form>
   </div>
 </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

<script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
</script>
</body>

</html>