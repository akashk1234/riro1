

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Gallery</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->

</head>

<body class="animsition">

	<!-- Header -->
	<?php include 'publicheader.php' ?>


	<!-- Cart -->
	<?php include 'cart-side.php' ?>


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-02.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Our Gallery
		</h2>
	</section>	

<?php include 'connection.php' ?>

	<!-- Content page -->
	<section class="bg0 p-t-62 p-b-60 mt-5">
		<div class="container">
			<div class="row">


			<?php 
			$q= "select * from gallery";
			$res= select($q);
			foreach($res as $row){
			?>
				<div class="col-md-4 col-lg-4">
					<div class="p-b-63">
						<a href="" class="hov-img0 how-pos5-parent">
							<img src="uploads/<?php echo $row['image'] ?>" alt="IMG">

						</a>
					</div>
				</div>
				<?php } ?>

			</div>
		</div>
	</section>



	




	<!-- Footer -->
	<?php include 'publicfooter.php' ?>


</body>

</html>