<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$product_name = $product_price = $product_image =$product_detail= "";
$product_name_err = $product_price_err = $product_image_err =$product_detail_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["product_name"]))){
        $product_name_err = "Please enter a name of product.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM products WHERE product_name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_product_name);
            
            // Set parameters
            $param_product_name = trim($_POST["product_name"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $product_name_err = "This username is already taken.";
                } else{
                    $product_name = trim($_POST["product_name"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["product_price"]))){
        $product_price_err = "Please enter a price.";     
    } else{
        $product_price = trim($_POST["product_price"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["product_image"]))){
        $product_image_err = "Please UPLOAD image";     
    } else{
        $product_image = trim($_POST["product_image"]);
        
    }
    if(empty(trim($_POST["product_detail"]))){
        $product_detail_err = "Please enter detail of product.";     
    } else{
        $product_detail = trim($_POST["product_detail"]);
    }
    // Check input errors before inserting in database
    if(empty($product_name_err) && empty($product_price_err) && empty($product_image_err&& empty($product_detail_err) )){
        
        // Prepare an insert statement
        $sql = "INSERT INTO products( product_name, product_price,product_detail, product_image) VALUES (?, ?,?,?)";
       if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_product_name, $param_product_price, $param_product_detail,$dst1);
            
            // Set parameters
            $v1=rand(1111,9999);
          	$v2=rand(1111,9999);
             $v3=$v1.$v2;
             $v3=md5($v3);  
             $fnm=$_FILES["product_image"]["name"];
             $dst1="product_image/".$v3.$fnm;
             move_uploaded_file($_FILES["product_image"]["tmp_name,$dst"]);
                    
                  
            $param_product_name = $product_name;
             $param_product_price = $product_price;
           $param_product_detail = $product_detail;
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: product.php");

            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
         
        
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    <link href="https://ka-f.fontawesome.com/releases/v5.15.1/css/free-v4-shims.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@1,700&display=swap" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../main.css" >
    <style>
    html,body{
    background: -repeat: no-repeat;
    height: 100%;
    background-size:cover;
    background-image:url("../img/backend.jpg") ;
    
    
    color: white;
    }
    </style>
</head>
<body>
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
                     
                   
                    <li class="nav-item"> <a href="product.php" class="nav-link m-2 menu">VIew All Products</a> </li>
 <li class="nav-item"> <a href="home_admin.php" class="nav-link m-2 menu">Return</a> </li>
                   
                    
                </ul>
            </div>
        </nav>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h1>Add Product</h1>
                    
                    <hr class="mb-3">

                    <div class="form-group <?php echo (!empty($product_name_err)) ? 'has-error' : ''; ?>">
                        <label><b>Tên sản phẩm</b></label>
                        <input type="text" name="product_name" class="form-control" value="<?php echo $product_name; ?>">
                        <span class="help-block"><?php echo $product_name_err; ?></span>
                    </div>    

                    <div class="form-group <?php echo (!empty($product_price_err)) ? 'has-error' : ''; ?>">
                        <label><b>Giá tiền</b></label>
                        <input type="text" name="product_price" class="form-control" value="<?php echo $product_price; ?>">
                        <span class="help-block"><?php echo $product_price_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($product_image_err)) ? 'has-error' : ''; ?>">
                        <label><b>Upload hình ảnh</b></label>
                        <input type="file" name="product_image"  value="<?php echo $product_image; ?>">
                        
                        <span class="help-block"><?php echo $product_image_err; ?></span>
                    </div>
                   <div class="form-group <?php echo (!empty($product_detail_err)) ? 'has-error' : ''; ?>">
                        <label><b>Chi tiết sản phẩm</b></label>
                        <input type="text" name="product_detail" class="form-control" value="<?php echo $product_detail; ?>">
                        <span class="help-block"><?php echo $product_detail_err; ?></span>
                    </div>    



                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Save">
                       
                    </div>
                    
                    
                
                </div>  
            </div>  
        </div>  
  
</body>
</html>