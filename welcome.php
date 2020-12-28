<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
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

    <title>Coffee Shop</title>
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

                <li class="nav-item"> <a href="account.php" class="nav-link m-2 menu"> <?php echo htmlspecialchars($_SESSION["username"]); ?> </a> </li>
                
            </ul>
        </div>
    </nav>
    <!--End of nav-->
    <!--Banner-->
    <div class ="text-light text-right banner">
        <h1 class=" display-4 text-center font-weight-bold heading">
            Welcome to Coffee Shop
        </h1>
        <p class="main text-center ">Begin your dreams to the land of coffee </p>
    </div>
    <!--End of banner-->
</header>
<!--End of header-->
<!--About-->
<section id="about" class="py-5">
    <div class="container">
        <div class="row">
            <div class= "col-md-6 my-4">
                <h1 class="text-uppercase title-text display-3">About Coffee</h1>
                <p class="text">A perfect way to replenish your energy, a cup of Vietnamese coffee will keep you going for an entire day.
                    Whether it’s served hot or iced, straight or with milk, Vietnamese coffee hits all the right notes and is an essential beverage of daily life.
                    A cult following has blossomed around Vietnamese-style coffee and the local brew is starting to gain traction overseas. 
                </p>
                <a href="#" class="btn hvr-right my-4 text-capitalize">More more</a>
            </div>
            <div class="col-md-6 about-images my-4 d-none d-lg-block ">
                <img src="image/image2.jpg" alt=""class="img-1 img-thubmnail about-img">
                <img src="image/image4.webp" alt=""class="img-2 img-thubmnail about-img">  
                <img src="image/image5.jpg" alt=""class="img-3  img-thubmnail about-img">
                <img src="image/image3.jpg" alt=""class="img-4 img-thubmnail about-img">
                <img src="image/image6.jfif" alt=""class="img-5 img-thubmnail about-img">
            </div>
        </div>
    </div>
</section>
<!--end of about-->
<!--tab section-->
<section>
    <div class="container">
        <div class="content-4">
            <ul class="nav" role="tablist">
                <li class="nav-item nav-tabs">
                    <a href="#pie" class="active tab-item" role="tab" data-toggle="tab">
                        <i class="fas fa-apple-alt"></i>
                        <span>Apple Pie</span>
                    </a>
                </li>
                <li class="nav-item nav-tabs">
                    <a href="#bread" class="tab-item" role="tab" data-toggle="tab">
                        <i class="fas fa-bread-slice"></i>
                        <span>Organic Bread</span>
                    </a>
                </li>
                <li class="nav-item nav-tabs">
                    <a href="#candy" class="tab-item" role="tab" data-toggle="tab">
                        <i class="fas fa-candy-cane"></i>
                        <span>Free Candies</span>
                    </a>
                </li>
                <li class="nav-item nav-tabs">
                    <a href="#cookies" class="tab-item" role="tab" data-toggle="tab">
                        <i class="fas fa-cookie"></i>
                        <span>Chocolate Cookies</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" role="tabpanel" id="pie">
                    <div class="row justify-content-md-center">
                        <div class="col-md-3 offset-md-1">
                            <h4>Home Made Apple Pie</h4>
                        </div>
                        <div class="col-md-7">
                            <p>Our favorite recipe for making classic apple pie from scratch.
                                This recipe guarantees apple pie with perfectly cooked (not mushy) apples surrounded by 
                            a thickened and gently spiced sauce all baked inside a flaky, golden brown crust. </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" role="tab-panel" id="bread">
                    <div class="row justify-content-md-center">
                        <div class="col-md-3 offset-md-1">
                            <h4>Home made Organic bread</h4>
                        </div>
                        <div class="col-md-4">
                            <p>Most of us would imagine bread to be pretty benign stuff, 
                                certainly not something that could have much impact on us as individuals or the wider world. 
                                But bread is like any other food, taking energy and resources to deliver. 
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p>Do it well and you can create a product that is good for you and your planet, c
                                ut corners and unsurprisingly there are negative consequences. 
                                The organic food and farming movement have long been aware of the impacts of intensive food and farming, 
                                their ideas historically advocating practices that harness of natures own processes to bring us food, 
                            food with a lower social and environmental impact.</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="candy">
                    <div class="row justify-content-md-center">
                        <div class="col-md-3 offset-md-1">
                            <h4>Free Candies</h4>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-10 offset-md-1">
                                <p>When you come to our shop, you will receive a bag of candy, made by the shop, when you leave</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="cookies">
                    <div class="row">
                        <div class="col-md-3 offset-md-1">
                            <h4>Home made Chocolate cookies</h4>
                        </div>
                        <div class="col-md-7">
                            <p>A chocolate chip cookie is a drop cookie that originated 
                                in the United States and features chocolate chips or chocolate morsels as its distinguishing ingredient.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!--end of tab-->
<!--Coffee video-->
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
                    <h1 class="text-uppercase text-color font-weight-bold">Best Sales</h1>
                </div>
                <div class="row justify-content-around align-items-center">
                    <div class="col-xl-3 col-lg-4 col-sm rotate">
                        <div class="card text-center mb-3 coffee-card">
                            <div class="card-header">
                                <h4 class="font-weight-light title-text">Espresso</h4>
                            </div>
                            <div class="card-body">
                                <img src="image/image7.jpeg" class="img-fluid rounded">
                            </div>
                            <div class="card-footer">
                                A small amount of nearly boiling water is forced under 9-1 bars of atmospheric pressure through finely-ground coffee beans
                            </div>
                            <div class="back">
                                <div class="back-content">
                                    <h1 class="text-uppercase font-weight-light">Only for</h1>
                                    <h3 class="mb-3">$25</h3>
                                    <a href="#" class="btn hvr-right my-4 text-capitalize">Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm rotate">
                        <div class="card text-center mb-3 coffee-card">
                            <div class="card-header">
                                <h4 class="font-weight-light title-text">Mocha</h4>
                            </div>
                            <div class="card-body">
                                <img src="image/image.jpg" class="img-fluid rounded">
                            </div>
                            <div class="card-footer">
                                Based on espresso and hot milk but with added chocolate flavouring and sweetener, typically in the form of cocoa powder and sugar
                            </div>
                            <div class="back">
                                <div class="back-content">
                                    <h1 class="text-uppercase font-weight-light">Only for</h1>
                                    <h3 class="mb-3">$20</h3>
                                    <a href="#" class="btn hvr-right my-4 text-capitalize">Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm rotate">
                        <div class="card text-center mb-3 coffee-card">
                            <div class="card-header">
                                <h4 class="font-weight-light title-text">Latte coffee</h4>
                            </div>
                            <div class="card-body">
                                <img src="image/image4.webp" class="img-fluid rounded">
                            </div>
                            <div class="card-footer">
                                A coffee drink made with espresso and steamed milk. 
                            </div>
                            <div class="back">
                                <div class="back-content">
                                    <h1 class="text-uppercase font-weight-light">Only for</h1>
                                    <h3 class="mb-3">$26</h3>
                                    <a href="#" class="btn hvr-right my-4 text-capitalize">Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End of coffee-->
        <!--CONTACT-->
        <section class="contact">
            <div class="container">
                <div class="text-center py-5">
                    <h2 class="py-3">Contact us</h2>
                    <div class="mx-auto heading-line">

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <!--GG map-->
                        <div id="map-container-google-1" class="z-depth-1-half map-container">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.016851211136!2d106.69716511462211!3d10.733183492350848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fbd68bcae7d%3A0xc59922383ff04616!2zxJDhuqFpIEjhu41jIFTDtG4gxJDhu6ljIFRo4bqvbmcgTmd1eeG7hW4gSOG7r3UgVGjhu40!5e0!3m2!1sen!2s!4v1605930930027!5m2!1sen!2s" 
                            width="500" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                    <form class="col-lg-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" type="email" aria-describedly="emailHint" placeholder="Enter your email">
                        </div>
                        <div class="form-gruop ">
                            <label for="name">Name</label>
                            <input id="name" class="form-control" type="text" placeholder="Enter your name">
                        </div>
                        <div class="form-gruop ">
                            <label for="name">Message</label>
                            <textarea id="name" class="form-control" type="text" rows="5" placeholder="Enter your message"></textarea>
                        </div>
                        
                        <button type="submit" class="btn hvr-right my-4 btn-lg">Submit</button>
                        
                    </form>
                </div>
            </div>
        </section>
        <!--end of contact-->
        <!--footer-->
        <footer>
            <div class="text-center">
                <h4 class="font-weight-bold">Follow us</h4>
                <div class="d-flex flex-row justify-content-center">
                    <span><i class="fab fa-facebook-square"></i></span>
                </div>
            </div>
        </footer>
        <!--end of footer-->

























        <!-- Optional JavaScript; choose one of the two! -->
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
</body>
</html>