
<?php
require_once './assets/includes/config.php';
$w_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']
		=== 'on' ? "https" : "http") . "://" .
$_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

$w_link=explode('/',$w_link);
?>
<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>


	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Exoticassam.in</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />


	<!-- Bootstrap core CSS     -->
	<link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
			 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">



	<!--  Material Dashboard CSS    -->
	<link href="./assets/css/material-dashboard98f3.css?v=1.3.0" rel="stylesheet"/>

	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="./assets/css/demo.css" rel="stylesheet" />


	<!--     Fonts and icons     -->
	<link href="./assets/maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./assets/fonts.googleapis.com/csse5da.css?family=Roboto:300,400,500,700|Material+Icons" />
	<link href="./assets/fonts.googleapis.com/icone91f.css?family=Material+Icons"
      rel="stylesheet">



</head>


<body >


	<div class="wrapper">

	    <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="./assets/img/sidebar-1.jpg">


    <div class="logo">
        <a href="" class="simple-text logo-mini">
            EA
        </a>

        <a href="" class="simple-text logo-normal">
             Exoticassam
        </a>
    </div>




    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="./assets/img/faces/avatar.jpg" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        Admin
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini"> S </span>
                                <span class="sidebar-normal"> Settings </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">

            <li class="<?php if ($w_link[4]=='total-booking.php'): ?>
            	<?php echo "active" ?>
            <?php endif; ?>">
                <a href="total-booking.php">
                    <i class="material-icons">dashboard</i>
                    <p> Total Booking </p>
                </a>
            </li>

						<li class="<?php if ($w_link[4]=='add-destination.php' || $w_link[4]=='total-destination.php'): ?>
            	<?php echo "active" ?>
            <?php endif; ?>">
								<a data-toggle="collapse" href="#des">
										<i class="material-icons">grid_on</i>
										<p> Destination
											 <b class="caret"></b>
										</p>
								</a>

								<div class="collapse" id="des">
										<ul class="nav">
													<li>
														<a href="add-destination.php">
																<span class="sidebar-mini">  +  </span>
																<span class="sidebar-normal"> Add Destination </span>
														</a>
												</li>

												<li>
													<a href="total-destination.php">
															<span class="sidebar-mini">  +  </span>
															<span class="sidebar-normal"> Total Destination </span>
													</a>
											</li>
                                            <li>
												<a href="des-banner.php">
														<span class="sidebar-mini">  +  </span>
														<span class="sidebar-normal"> Banner </span>
												</a>
										</li>
										<li>
											<a href="des_cat.php">
													<span class="sidebar-mini">  +  </span>
													<span class="sidebar-normal"> Categories </span>
											</a>
									</li>

										</ul>
								</div>
						</li>

                        <li class="<?php if ($w_link[4]=='add-package.php' || $w_link[4]=='total-package.php'): ?>
            	<?php echo "active" ?>
            <?php endif; ?>">
								<a data-toggle="collapse" href="#pac">
										<i class="material-icons">grid_on</i>
										<p> Packages
											 <b class="caret"></b>
										</p>
								</a>

								<div class="collapse" id="pac">
										<ul class="nav">
													<li>
														<a href="add-package.php">
																<span class="sidebar-mini">  +  </span>
																<span class="sidebar-normal"> Add package </span>
														</a>
												</li>

												<li>
													<a href="total-package.php">
															<span class="sidebar-mini">  +  </span>
															<span class="sidebar-normal"> Total package </span>
													</a>
											</li>
                                            <li>
												<a href="pac-banner.php">
														<span class="sidebar-mini">  +  </span>
														<span class="sidebar-normal"> Banner </span>
												</a>
										</li>
										<li>
											<a href="pac_cat.php">
													<span class="sidebar-mini">  +  </span>
													<span class="sidebar-normal"> Categories </span>
											</a>
									</li>

										</ul>
								</div>
						</li>


						<li class="<?php if ($w_link[4]=='home_banner.php' || $w_link[4]=='services.php'): ?>
            	<?php echo "active" ?>
            <?php endif; ?>">
								<a data-toggle="collapse" href="#hom">
										<i class="material-icons">grid_on</i>
										<p> Home Page
											 <b class="caret"></b>
										</p>
								</a>

								<div class="collapse" id="hom">
										<ul class="nav">
													<li>
														<a href="home_banner.php">
																<span class="sidebar-mini">  +  </span>
																<span class="sidebar-normal"> Home Banner </span>
														</a>
												</li>

												<li>
													<a href="services.php">
															<span class="sidebar-mini">  +  </span>
															<span class="sidebar-normal"> Services </span>
													</a>
											</li>
                                            <li>
												<a href="testimonial.php">
														<span class="sidebar-mini">  +  </span>
														<span class="sidebar-normal">Testimonial</span>
												</a>
										</li>
										

										</ul>
								</div>
						</li>
							<li class="<?php if ($w_link[4]=='add_shop.php' || $w_link[4]=='view_shop.php'): ?>
            					<?php echo "active" ?>
           						 <?php endif; ?>">
								<a data-toggle="collapse" href="#sho">
										<i class="material-icons">grid_on</i>
										<p> Shop
											 <b class="caret"></b>
										</p>
								</a>

								<div class="collapse" id="sho">
										<ul class="nav">
													<li>
														<a href="add_shop.php">
																<span class="sidebar-mini">  +  </span>
																<span class="sidebar-normal"> Add Shop </span>
														</a>
												</li>
												<li>
														<a href="view_shop.php">
																<span class="sidebar-mini">  +  </span>
																<span class="sidebar-normal"> View Shop </span>
														</a>
												</li>
												<li>
														<a href="add_product.php">
																<span class="sidebar-mini">  +  </span>
																<span class="sidebar-normal"> Add Product </span>
														</a>
												</li>
												<li>
														<a href="view_product.php">
																<span class="sidebar-mini">  +  </span>
																<span class="sidebar-normal"> View Product </span>
														</a>
												</li>
												
										</ul>
								</div>
						</li>
						<li class="<?php if ($w_link[4]=='add_restaurent.php' || $w_link[4]=='view_restaurent.php'): ?>
            					<?php echo "active" ?>
           						 <?php endif; ?>">
								<a data-toggle="collapse" href="#rest">
										<i class="material-icons">grid_on</i>
										<p> Restaurent
											 <b class="caret"></b>
										</p>
								</a>

								<div class="collapse" id="rest">
										<ul class="nav">
													<li>
														<a href="add_restaurent.php">
																<span class="sidebar-mini">  +  </span>
																<span class="sidebar-normal"> Add Restaurent </span>
														</a>
												</li>
												<li>
														<a href="view_restaurent.php">
																<span class="sidebar-mini">  +  </span>
																<span class="sidebar-normal"> View Restaurent </span>
														</a>
												</li>
												
										</ul>
								</div>
						</li>
						<li class="<?php if ($w_link[4]=='register_hotal.php' || $w_link[4]=='viwe_hotals.php'): ?>
            					<?php echo "active" ?>
           						 <?php endif; ?>">
								<a data-toggle="collapse" href="#hotal">
										<i class="material-icons">grid_on</i>
										<p> Hotal
											 <b class="caret"></b>
										</p>
								</a>

								<div class="collapse" id="hotal">
										<ul class="nav">
													<li>
														<a href="register_hotal.php">
																<span class="sidebar-mini">  +  </span>
																<span class="sidebar-normal"> Add Hotal </span>
														</a>
												</li>
												<li>
														<a href="viwe_hotals.php">
																<span class="sidebar-mini">  +  </span>
																<span class="sidebar-normal"> View Hotal </span>
														</a>
												</li>
												
										</ul>
								</div>
						</li>

<li >
    <a href="logout.php">
        <i class="material-icons">power_off</i>
        <p> Logout </p>
    </a>
</li>



        </ul>
    </div>
</div>



	    <div class="main-panel">

			<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons visible-on-sidebar-mini">view_list</i>
            </button>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"> Dashboard </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">dashboard</i>
                        <p class="hidden-lg hidden-md">Dashboard</p>
                    </a>
                </li>

                <li>
                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                       <i class="material-icons">person</i>
                       <p class="hidden-lg hidden-md">Profile</p>
                    </a>
                </li>

                <li class="separator hidden-lg hidden-md"></li>
            </ul>

        </div>
    </div>
</nav>
