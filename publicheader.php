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
    <li id="menu-home" <?php if ($current_page === 'index.php') echo 'class="active-menu"'; ?>><a href="index.php">Home</a></li>
    <li id="menu-shop" class="dropdown <?php if ($current_page === 'product.php' || $current_page === 'option1.php' || $current_page === 'option2.php' || $current_page === 'option3.php' || $current_page === 'option4.php' || $current_page === 'option5.php' || $current_page === 'option6.php' || $current_page === 'option7.php') echo 'active-menu'; ?>">
      <a href="javascript:void(0);" class="dropbtn">Shop</a>
      <div class="dropdown-content">
        <a href="shirts.php">Shirts</a>
        <div class="dropdown-submenu">
          <a href="dhotis.php">Dhotis</a>
          <div class="submenu-content">
            <a href="tissue-dhoti.php">Tissue Dhotis</a>
            <a href="colour-dhoti.php">Colour Dhotis</a>
            <a href="iyer-dhoti.php">Iyer Dhotis</a>

          </div>
        </div>
        <a href="towel.php">Towel</a>
        <a href="turbon.php">Turbon</a>
      </div>
    </li>
    <li id="menu-gallery" <?php if ($current_page === 'gallery.php') echo 'class="active-menu"'; ?>><a href="gallery.php">Gallery</a></li>
    <li id="menu-about" <?php if ($current_page === 'about.php') echo 'class="active-menu"'; ?>><a href="about.php">About</a></li>
    <li id="menu-contact" <?php if ($current_page === 'contact.php') echo 'class="active-menu"'; ?>><a href="contact.php">Contact</a></li>
  </ul>
</div>


<style>
	/* Style for the dropdown menu */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Style for the dropdown button */
.dropbtn {
  color: #333; /* Text color for the "Shop" button */
  text-decoration: none;
}

/* Style for the dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9; /* Background color of the dropdown */
  min-width: 160px;
  z-index: 1;
}

/* Style for the dropdown links */
.dropdown-content a {
  color: #333; /* Text color for dropdown links */
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color on hover for dropdown links */
.dropdown-content a:hover {
  background-color: #ddd; /* Background color on hover */
}

/* Show the dropdown content when hovering over the "Shop" menu */
.dropdown:hover .dropdown-content {
  display: block;
}
/* Style for the dropdown sub-menu */
/* Style for the dropdown sub-menu */
.dropdown-submenu {
    position: relative;
    display: inline-block;
}

/* Style for the sub-menu content (hidden by default) */
.submenu-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9; /* Background color of the sub-menu */
    min-width: 160px;
    left: 100%; /* Position the sub-menu to the right of the parent */
    top: 0;
    z-index: 1;
}
/* Show the sub-menu content when hovering over the "Dhotis" menu */
.dropdown-submenu:hover .submenu-content {
    display: block;
    left: 100%; /* Adjust the left position to move it outside the parent box */
    top: 0;
}

</style>


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

        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Shop &#9662;</a>
            <div class="dropdown-content" style="background-color: #717fe0; border:1px solid white;">
                <a class="text-white" href="shirts.php">Shirts</a>
                <div class="dropdown-submenu">
                    <a class="text-white" href="dhotis.php">Dhotis</a>
                    <div class="submenu-content" style="background-color: #717fe0; border:1px solid white;">
                        <a class="text-white" href="tissue-dhoti.php">Tissue Dhotis</a>
                        <a class="text-white" href="colour-dhoti.php">Colour Dhotis</a>
                        <a class="text-white" href="iyer-dhoti.php">Iyer Dhotis</a>
                    </div>
                </div>
                <a class="text-white" href="towel.php">Towel</a>
                <a class="text-white" href="turbon.php">Turbon</a>
            </div>
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

