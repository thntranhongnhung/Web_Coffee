<?php

function component($productname, $productprice, $productimg, $productid,$productdetail){
    $element = "
    <div class=\"col-xl-3 col-lg-4 col-sm rotate\">
    <form action=\"product.php\" method=\"post\">
    <div class=\"card text-center mb-3 coffee-card\">
    <div class=\"card-header\">
    <h4 class=\"font-weight-light title-text\">$productname</h4>
    </div>
    <div class=\"card-body\">
    <img src=\"$productimg\" alt=\"Image\" 
    class=\"img-fluid rounded\">
    </div>
    <div class=\"card-footer\">
    $productdetail 
    </div>
    <div class=\"back\">
    <div class=\"back-content\">
    <h5 class=\"text-uppercase font-weight-light\">Only for</h5>
    <h6 class=\"mb-3\">$productprice $</h6>
    <div class=\"d-flex\">
    <button type=\"submit\" class=\"btn btn-warning p-2 my-3\" name=\"add\">Add <i class=\"fas fa-shopping-cart\"></i></button>
    
    <button type=\"submit\" name=\"detail\" class=\"btn btn-info p-2 my-3\">Detail Product</button>
    </div>
    <input type='hidden' name='product_id' value='$productid'>
    </div>

    </div>
    </div>
    </form>
    </div>
    
    ";
    
    echo $element;
    
    
}

function cartElement($productimg, $productname, $productprice, $productid){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
    <div class=\"p-2\">

    <div class=\"border rounded\">
    <div class=\"row bg-light\">
    <div class=\"col-md-3 pl-0\">
    <img src=../admin/$productimg alt=\"Image\" class=\"img-fluid\">
    </div>
    <div class=\"col-md-6\">
    <h5 class=\"pt-2\">$productname</h5>
    
    <h5 class=\"pt-2\">$$productprice</h5>
    
    </div>
    <div class=\"col-md-3 py-5\">
    <div>
    
    <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
    </div>
    </div>
    </div>
    </div>
    </div>
    </form>
    
    ";
    $_SESSION["product_name"] = true;
    echo  $element;
}