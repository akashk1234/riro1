<header class="header-v1">
	<!-- Header desktop -->
	<div class="container-menu-desktop trans-03">


		<div class="top-bar">
			<div class="content-topbar flex-sb-m h-full container">
				<div class="left-top-bar">
				FREE Shipping for PrePaid orders across India
				</div>

				<div class="right-top-bar flex-w h-full">
					<a href="#" class="flex-c-m trans-04 p-lr-25">
						Help & FAQs
					</a>

					<!-- <a href="#" class="flex-c-m trans-04 p-lr-25">
						My Account
					</a> -->


				</div>
			</div>
		</div>

		<div class="wrap-menu-desktop">
			<nav class="limiter-menu-desktop p-l-45">

				<!-- Logo desktop -->
				<a href="#" class="logo">
					<img src="images/icons/riro_logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu desktop -->
				<?php
				// Get the current page's filename
				$current_page = basename($_SERVER['PHP_SELF']);
				?>

				<!-- Menu desktop -->
				<div class="menu-desktop">
					<ul class="main-menu">
						<li id="menu-home" <?php if ($current_page === 'index.php')
							echo 'class="active-menu"'; ?>><a
								href="index.php">Home</a></li>
						<li id="menu-shop" <?php if ($current_page === 'product.php')
							echo 'class="active-menu"'; ?>><a
								href="product.php">Shop</a></li>
						<li id="menu-gallery" <?php if ($current_page === 'gallery.php')
							echo 'class="active-menu"'; ?>><a
								href="gallery.php">Gallery</a></li>
						<li id="menu-about" <?php if ($current_page === 'about.php')
							echo 'class="active-menu"'; ?>><a
								href="about.php">About</a></li>
						<li id="menu-contact" <?php if ($current_page === 'contact.php')
							echo 'class="active-menu"'; ?>><a
								href="contact.php">Contact</a></li>
					</ul>
				</div>


				<!-- Icon header -->
				<div class="wrap-icon-header flex-w flex-r-m h-full">


					<div class="flex-c-m h-full p-l-18 p-r-25 bor5">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart"
							data-notify="2">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
					</div>


				</div>
			</nav>
		</div>
	</div>

	<!-- Header Mobile -->
	<div class="wrap-header-mobile ">
		<!-- Logo moblie -->
		<div class="logo-mobile">
			<a href="index.php"><img src="images/icons/favicon.png" alt="IMG-LOGO"></a>
		</div>

		<!-- Icon header -->
		<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">


			<div class="flex-c-m h-full p-lr-10 bor5">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart "
					data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
			</div>
		</div>

		<!-- Button show menu -->
		<div class="btn-show-menu-mobile hamburger hamburger--squeeze text-white">
			<span class="hamburger-box text-white">
				<span class="hamburger-inner"></span>
			</span>
		</div>
	</div>


	<!-- Menu Mobile -->
	<div class="menu-mobile">
		<ul class="main-menu-m">
			<li>
				<a href="index.php">Home</a>

			</li>

			<li>
				<a href="product.php">Shop</a>
			</li>

			<li>
				<a href="gallery.php">Gallery</a>
			</li>

			<li>
				<a href="about.php">About</a>
			</li>

			<li>
				<a href="contact.php">Contact</a>
			</li>
		</ul>
	</div>


</header>

