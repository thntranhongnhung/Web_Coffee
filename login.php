<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: welcome.php");
  exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session

                            session_start();
                            $query = "SELECT * FROM users WHERE username='$username'";
                            $results = mysqli_query($link, $query);
                            $logged_in_user = mysqli_fetch_assoc($results);
                            if($logged_in_user['user_type'] == 'admin'){
                                $_SESSION['user'] = $logged_in_user;
                                $_SESSION['success']  = "You are now logged in";
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;  
                                header("location: admin/home_admin.php");
                            }
                            else{
                            // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;                            
                                
                            // Redirect user to welcome page
                                header("location: welcome.php");
                            }
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
 <title>Login Form</title>
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
 <link rel="stylesheet" type="text/css" href="css/styles.css">
 <link rel="stylesheet" href="main.css" >
</style>
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
       <li class="nav-item"> <a href="index.html" class="nav-link m-2 menu">Home</a> </li>
       <li class="nav-item"> <a href="search.php" class="nav-link m-2 menu">Search</a> </li>
       <li class="nav-item"> <a href="#" class="nav-link m-2 menu">News</a> </li>
       <li class="nav-item"> <a href="product.php" class="nav-link m-2 menu">Products</a> </li>

       
       
   </ul>
</div>
</nav>
</head>
<body>
    
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="img/logo_st.jpg" class="brand_logo" alt="Programming Knowledge logo">
                    </div>
                </div>  
                <div class="d-flex justify-content-center form_container">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>       
                            </div>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">

                            
                        </div>
                        <span class="help-block"><?php echo $username_err; ?></span>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>                    
                                </div>
                                <input type="password" name="password" class="form-control">

                                <span class="help-block"><?php echo $password_err; ?></span>
                            </div>
                            
                            <div class="d-flex justify-content-center mt-3 login_container">
                               <input type="submit" class="btn btn-primary" value="Login"> 
                           </div>
                           
                           <div class="d-flex justify-content-center mt-3 login_container" >
                               <a  href="register.php">Sign up now</a>
                           </div>
                           
                       </form>
                   </div>
               </div>
           </div>
       </div>    
   </body>
   </html>