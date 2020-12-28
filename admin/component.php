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
    <h4 class=\"text-uppercase font-weight-light\"></h4>
    <h3 class=\"mb-3\">$productprice $</h3>
    
    <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"fix\">Fix <i class=\"fas fa-wrench\"></i></button>
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
    <small class=\"text-secondary\">Seller: dailytuition</small>
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
    echo  $element;
}