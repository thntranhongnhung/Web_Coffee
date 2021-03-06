<?php
// Initialize the session
session_start();

// Unset all of the session variables

require_once ("../php/CreateDb.php");
require_once ("component.php");

$db = new CreateDb("demo", "products");

?>
<!DOCTYPE html>
<html lang="en">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/detail_product.css" >
	<title>Modify <?php echo htmlspecialchars($_SESSION["product_name"]); ?></title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" href="nav.css" >




</head>


<body>
	<nav class="navbar navbar-expand-lg fixed-top nav-menu">
		
		<div class="collapse navbar-collapse justify-content-end text-uppercase font-weight-bold" id="navbar">

			<ul class="navbar-nav">
				
				
				
				<li class="nav-item"> <a href="product.php" class="nav-link m-2 menu">Return</a> </li>
				
				
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
							<div class="tab-pane active" id="pic-1"><img src=<?php 
							$product_id = array_column($_SESSION['detail'], 'product_id');

							$result = $db->getData();
							while ($row = mysqli_fetch_assoc($result)){
								foreach ($product_id as $id){
									if ($row['id'] == $id){
										echo ($row['product_image']);
										
										
									}
								}
							}
							?> alt="Image" /></div>
							
						</div>
						
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"> 	<?php 
						$product_id = array_column($_SESSION['detail'], 'product_id');

						$result = $db->getData();
						while ($row = mysqli_fetch_assoc($result)){
							foreach ($product_id as $id){
								if ($row['id'] == $id){
									echo htmlspecialchars($row['product_name']);
									
									
								}
							}
						}
						?> </h3>
						<div class="rating">
							
							
						</div>
						
						<p class="product-description"><?php 
						$product_id = array_column($_SESSION['detail'], 'product_id');

						$result = $db->getData();
						while ($row = mysqli_fetch_assoc($result)){
							foreach ($product_id as $id){
								if ($row['id'] == $id){
									echo htmlspecialchars($row['product_detail']);
									
									
								}
							}
						}
						?></p>
						<h4 class="price">Price: <span><?php 
						$product_id = array_column($_SESSION['detail'], 'product_id');

						$result = $db->getData();
						while ($row = mysqli_fetch_assoc($result)){
							foreach ($product_id as $id){
								if ($row['id'] == $id){
									echo htmlspecialchars($row['product_price']);
									
									
								}
							}
						}
						?> $</span></h4>
						
						<h5 class="sizes">sizes:
							<span class="size" data-toggle="tooltip" title="small">Big</span>
							<span class="size" data-toggle="tooltip" title="medium">Medium</span>
							<span class="size" data-toggle="tooltip" title="large">Small</span>
							
						</h5>
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
