<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

$link = mysqli_connect("localhost", "root", "", "demo");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM products WHERE product_name LIKE ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = $_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<p>" . $row["product_name"] . "</p>";
                    
                    $productname=$row["product_name"] ;
                    $productprice=$row["product_price"] ;
                    $productimg=$row["product_image"] ;
                    $productid=$row["id"] ;
                    $element ="<div class=\"card shadow\">
                    <div>
                    <img src=\"$productimg\" alt=\"Image\" class=\"img-fluid card-img-top\">
                    </div>
                    <div class=\"card-body\">
                    <h5 class=\"card-title\">$productname</h5>
                    <h6>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"far fa-star\"></i>
                    </h6>
                    <p class=\"card-text\">
                    Drink details.
                    </p>
                    <h5>
                    <small><s class=\"text-secondary\">$20</s></small>
                    <span class=\"price\">$$productprice</span>
                    </h5>
                    

                    </div>
                    </div>";
                    echo "<br>";
                    
                    echo $element;

                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
    
    // Close statement
    mysqli_stmt_close($stmt);
}

// close connection
mysqli_close($link);
?>