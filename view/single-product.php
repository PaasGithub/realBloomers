<?php 
include_once("../controllers/product_contrroller.php");
include("../navbars/header.php");

$getproductID= $_GET['pid'];
$selectoneP=selectAProduct_ctr($getproductID);
$productcatid=$selectoneP['product_cat'];
$selectcat= selectACategory_ctr($productcatid);
$category_name=$selectcat['cat_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Single Product</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="../assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="../assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="../assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="../assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="../assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="../assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="../assets/css/responsive.css">

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<?php pageheader("SEE MORE DETAILS","Single Product");?>
	<!-- end header -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src=<?php echo $selectoneP['product_image']; ?> alt="" height="350">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3><?php echo $selectoneP['product_title']; ?></h3>
						<p class="single-product-pricing"><span><!--Per Kg--></span>GHC <?php echo $selectoneP['product_price'];?></p>
						<p><?php echo $selectoneP['product_desc'];?></p>
						<div class="single-product-form">
							<form action="index.html">
								<input type="number" value="1" min="1" id="inputQuantity">
							</form>
							<a href="cart.php" class="cart-btn" onclick="quantittee()"></i> Add to Cart</a>
							<p><strong>Categories: </strong><?php echo $category_name; ?></p>
						</div>
						<!-- <h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Based on product category.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<?php 
				$simialrproducts=selectSimilarProducts_ctr($productcatid);
				// var_dump($simialrproducts); 
				foreach ($simialrproducts as $row):
				?>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="<?php echo $row['product_image'];?>" alt="" height="261"></a>
						</div>
						<h3><?php echo $row['product_title'];?></h3>
						<p class="product-price"><span></span>GHC <?php echo $row['product_price']; ?> </p>
						<a href="cart.php" class="cart-btn" onclick="quickQuantity('<?php echo $row['product_id'] ?>')" id="toCart"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
	<!-- end more products -->

	<!-- logo carousel -->
	<!-- <div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="../assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- end logo carousel -->

	<!-- footer -->
	<?php pagefooter(); ?>
	<!-- end footer -->
	
	<!-- jquery -->
	<script src="../assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="../assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="../assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="../assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="../assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="../assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="../assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="../assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="../assets/js/main.js"></script>

</body>
</html>

<script type="text/javascript">

function quantittee(){
  event.preventDefault();
  var qttt=document.getElementById('inputQuantity').value;
  var productid=<?php echo $selectoneP['product_id'] ?>;
//   alert(qttt);
//   alert(pid);
 

	$.ajax({
		type: 'POST',
		url: '../actions/add_to_cart.php',
		data:  {
			quantity: qttt,
			pid: productid
		} ,
		success: function(data,status) {
			// alert('AJAX call was successful!');
			//$('#content').html(data);
			alert(data);
			//alert(status);
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert("Error:"+xhr.status);
			alert(thrownError);
		}
	});
  
} 


function quickQuantity(x){
	event.preventDefault();
//   var productid=document.getElementById(x).value;
//   alert(qttt);
//   alert(x);
 

	$.ajax({
		type: 'POST',
		url: '../actions/add_to_cart.php',
		data:  {
			pid: x
		} ,
		success: function(data,status) {
			// alert('AJAX call was successful!');
			//$('#content').html(data);
			alert(data);
			//alert(status);
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert("Error:"+xhr.status);
			alert(thrownError);
		}
	});
  
}  
</script>