<?php session_start();?>
<?php
                                        if(isset($_SESSION['email']))
                                        {
                                            $dbuser = "wuzho";  /* your deakin login */
                                            $dbpass = "Uq1Ti4Fa4Ka3";  /* your deakin password */
                                            $dbname = "SSID";
                                            $db = oci_connect($dbuser, $dbpass, $dbname);
                                            $email=$_SESSION['email'];

                                            if (!$db)  {
                                                echo "An error occurred connecting to the database";
                                                exit;
                                            }
                                            $sql    =   "SELECT * FROM user_basket WHERE EMAIL='{$email}'";


                                            $stmt = oci_parse($db, $sql);

                                            if(!$stmt)  {
                                                echo "An error occurred in parsing the sql string.\n";
                                                exit;
                                            }
                                            oci_execute($stmt);
                                            
                                            $i=0;
                                            while(oci_fetch_array($stmt)) {
                                                $i++;
                                            }
                                            oci_close($db);
                                        }
                                        else{
                                            $i='No ';
                                        }
                    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju Your Fashion Shop">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Obaju : Your Fashion Shop
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>

    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>  <a href="#">Get flat 35% off on orders over $500!</a>
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                <?php
                if(isset($_SESSION['signin']))
                {
                    echo '<li><a href="customer-account.php">'.$_SESSION['username'].'</a>
                    </li>
                    <li><a href="logout.php">Logout</a>
                    </li>';
                }
                else
                {
                    echo '<li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="register.php">Register</a>
                    </li>';
                }
                ?>
                    
                    <li><a href="contact.php">Contact</a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">

                            <div class="form-group">
                                <input type="text" class="form-control" id="email-modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-modal" placeholder="password">
                                <p id="error_info" style="color:orangered; display: none;">email or password wrong !</p>
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary" onclick="check_password()"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>



                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register.php"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar" style="margin:0px;">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">
                    <img src="img/logo.png" alt="Obaju logo" class="hidden-xs">
                    <img src="img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="basket.php">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs"><?php echo $i;?> items in cart</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="index.php">Home</a>
                    </li>
														
					<li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Men <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-6"> <!-- col-sm-3 is changed to col-sm-6 by Shang-->
                                            <h5>Clothing</h5>
                                            <ul>
                                                <li><a href="category-man.php?type=T-Shirts">T-shirts</a>
                                                </li>
                                                <li><a href="category-man.php?type=Shirts">Shirts</a>
                                                </li>												
                                                <li><a href="category-man.php?type=Pants">Pants</a>
                                                </li>												
                                                <!--
												<li><a href="category-man.php">Accessories</a>
                                                </li>
												-->
                                            </ul>
                                        </div>
                                        <!--<div class="col-sm-3">
                                            <h5>Shoes</h5>
                                            <ul>
                                                <li><a href="category.php">Trainers</a>
                                                </li>
                                                <li><a href="category.php">Sandals</a>
                                                </li>
                                                <li><a href="category.php">Hiking shoes</a>
                                                </li>
                                                <li><a href="category.php">Casual</a>
                                                </li>
                                            </ul>
                                        </div> commented by Shang 03/07/2017-->
                                        <div class="col-sm-6"> <!-- col-sm-3 is changed to col-sm-6 by Shang-->
                                            <h5>Accessories</h5>
                                            <ul>
                                                <li><a href="category-man.php?type=Bags">Bags</a>
                                                </li>
                                                <li><a href="category-man.php?type=Belts">Belts</a>
                                                </li>
												<!--
                                                <li><a href="category.php">Hiking shoes</a>
                                                </li>
                                                <li><a href="category.php">Casual</a>
                                                </li>
                                                <li><a href="category.php">Hiking shoes</a>
                                                </li>
                                                <li><a href="category.php">Casual</a>
                                                </li>
												-->
                                            </ul>
                                        </div>
                                        <!--<div class="col-sm-3">
                                            <h5>Featured</h5>
                                            <ul>
                                                <li><a href="category.php">Trainers</a>
                                                </li>
                                                <li><a href="category.php">Sandals</a>
                                                </li>
                                                <li><a href="category.php">Hiking shoes</a>
                                                </li>
                                            </ul>
                                            <h5>Looks and trends</h5>
                                            <ul>
                                                <li><a href="category.php">Trainers</a>
                                                </li>
                                                <li><a href="category.php">Sandals</a>
                                                </li>
                                                <li><a href="category.php">Hiking shoes</a>
                                                </li>
                                            </ul>
                                        </div> commented by shang 03/07/2017-->
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Ladies <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-6"> <!-- col-sm-3 is changed to col-sm-6 by Shang-->
                                            <h5>Clothing</h5>
                                            <ul>
                                                <li><a href="category-lady.php?type=T-Shirts">T-shirts</a>
                                                </li>
                                                <li><a href="category-lady.php?type=Shirts">Shirts</a>
                                                </li>
                                                <li><a href="category-lady.php?type=Pants">Pants</a>
                                                </li>
												<!--
                                                <li><a href="category-lady.php">Accessories</a>
                                                </li>
												-->
                                            </ul>
                                        </div>
                                        <!-- <div class="col-sm-3">
                                            <h5>Shoes</h5>
                                            <ul>
                                                <li><a href="category.php">Trainers</a>
                                                </li>
                                                <li><a href="category.php">Sandals</a>
                                                </li>
                                                <li><a href="category.php">Hiking shoes</a>
                                                </li>
                                                <li><a href="category.php">Casual</a>
                                                </li>
                                            </ul>
                                        </div>  commented by Shang 03/07/2017-->
                                        <div class="col-sm-6"> <!-- col-sm-3 is changed to col-sm-6 by Shang-->
                                            <h5>Accessories</h5>
                                            <ul>
                                                <li><a href="category-lady.php?type=Bags">Bags</a>
                                                </li>
                                                <li><a href="category-lady.php?type=Belts">Belts</a>
                                                </li>
												<!--
                                                <li><a href="category.php">Hiking shoes</a>
                                                </li>
                                                <li><a href="category.php">Casual</a>
                                                </li>
                                                <li><a href="category.php">Hiking shoes</a>
                                                </li>
                                                <li><a href="category.php">Casual</a>
                                                </li>
												-->
                                            </ul>
                                            <!--<h5>Looks and trends</h5>
                                            <ul>
                                                <li><a href="category.php">Trainers</a>
                                                </li>
                                                <li><a href="category.php">Sandals</a>
                                                </li>
                                                <li><a href="category.php">Hiking shoes</a>
                                                </li>
                                            </ul> commented by Shang 03/07/2017-->
                                        </div>
                                        <!--<div class="col-sm-3">
                                            <div class="banner">
                                                <a href="#">
                                                    <img src="img/banner.jpg" class="img img-responsive" alt="">
                                                </a>
                                            </div>
                                            <div class="banner">
                                                <a href="#">
                                                    <img src="img/banner2.jpg" class="img img-responsive" alt="">
                                                </a>
                                            </div>
                                        </div> commented by Shang 03/07/2017-->
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Site <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Shop</h5>
                                            <ul>
                                                <li><a href="index.php">Homepage</a>
                                                </li>
                                                <li><a href="category-man.php">Category - men</a>
                                                </li>
												<li><a href="category-lady.php">Category - ladies</a>
                                                </li>                                                 
                                                <!--
												<li><a href="category.php">Category - sidebar left</a>
                                                </li>
												<li><a href="category-full.php">Category - full width</a>
                                                </li> 
                                                <li><a href="detail.php">Product detail</a>
                                                </li> 
												-->
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>User</h5>
                                            <ul>
                                            <?php
                                            if(isset($_SESSION['signin']))
                                            {
                                                echo '<li><a href="logout.php">Logout</a>
                                                </li>
                                                <li><a href="customer-orders.php">Orders history</a>
                                                </li>
                                                <li><a href="customer-account.php">Customer account / change password</a>
                                                </li>';
                                            }
                                            else
                                            {
                                                echo '<li><a href="register.php">Register / login</a>
                                                </li>';
                                            }
                                            ?>
                                                
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Order process</h5>
                                            <ul>
                                                <li><a href="basket.php">Shopping cart</a>
                                                </li>
												<!--
                                                <li><a href="checkout1.php">Checkout - step 1</a>
                                                </li>
                                                <li><a href="checkout2.php">Checkout - step 2</a>
                                                </li>
                                                <li><a href="checkout3.php">Checkout - step 3</a>
                                                </li>
                                                <li><a href="checkout4.php">Checkout - step 4</a>
                                                </li>
												commented by Shang 03/07/2017-->
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Information</h5>
                                            <ul>                                                
                                                <li><a href="aboutus.php">About us</a>
                                                </li>
												<li><a href="terms.php">Terms and conditions</a>
                                                </li>
												<li><a href="faq.php">FAQ</a>
                                                </li>                                                                                                
                                                <li><a href="contact.php">Contact</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="basket.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm"><?php echo $i;?> items in cart</span></a>
                </div>
                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>

                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search">

                <div class="navbar-form" role="search" style="margin-bottom: 5px; margin-top: 5px;">

                    <div class="input-group">
                        <input type="text" class="form-control" id="search_text" onkeyup="search(this.value)">

                        <span class="input-group-btn">

			            <button class="btn btn-primary" onclick="jump_to_result()"><i class="fa fa-search"></i></button>

		                </span>

                    </div>
                    <div class="dropdown"><div class="dropdown-toggle" data-toggle="dropdown">
                    </div>
                    <ul class="dropdown-menu" id='suggestion_list'>
                            
                    </ul>
                </div>



            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->



    <div id="all">

      <div id="content">

            <div class="container">
                <div class="col-md-12">
				<!--
                    <div id="main-slider">
                        <div class="item">
                            <img src="img/main-slider1.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider4.jpg" alt="">
                        </div>
                    </div>
					commented by Shang 03/07/2017 -->
					
					
					<div id="main-slider">
                        <div class="item">
                            <img src="img/getinspired1.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/getinspired2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/getinspired3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider4.jpg" alt="">
                        </div>
                    </div>
					
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** ADVANTAGES HOMEPAGE ***
 _________________________________________________________ -->
            <div id="advantages">

                <div class="container">
                    <div class="same-height-row">
                        <div class="col-sm-4">
                            <div class="box same-height">
                                <div class="icon"><i class="fa fa-heart"></i>
                                </div>

                                <h3><a >We love our customers</a></h3>
                                <p>We are known to provide best possible service ever</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height">
                                <div class="icon"><i class="fa fa-tags"></i>
                                </div>

                                <h3><a >Best prices</a></h3>
                                <p>You pay less to buy big brands here.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height">
                                <div class="icon"><i class="fa fa-thumbs-up"></i>
                                </div>

                                <h3><a >100% satisfaction guaranteed</a></h3>
                                <p>Free returns on everything for 3 months.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

            <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Hot this week</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider" id="hot_product">

                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?name=Carlo%20Bruni%20clutch">
                                                <img src="img/img/Carlo%20Bruni%5FAccessories%5FLady%5F1%5F1.jpg" alt="Carlo Bruni clutch" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?name=Carlo%20Bruni%20clutch">
                                                <img src="img/img/Carlo%20Bruni%5FAccessories%5FLady%5F1%5F2.jpg" alt="Carlo Bruni clutch" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php?name=Carlo%20Bruni%20clutch" class="invisible">
                                    <img src="img/img/Carlo%20Bruni%5FAccessories%5FLady%5F1%5F1.jpg" alt="Carlo Bruni clutch" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.php?name=Carlo%20Bruni%20clutch">Carlo Bruni clutch</a></h3>
                                    <p class="price">$1666</p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?name=Armani%20Borsa%20Bag">
                                                <img src="img/img/Armani%5FAccessories%5FLady%5F1%5F1.jpg" alt="Armani Borsa Bag" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?name=Armani%20Borsa%20Bag">
                                                <img src="img/img/Armani%5FAccessories%5FLady%5F1%5F2.jpg" alt="Armani Borsa Bag" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php" class="invisible">
                                    <img src="img/img/Armani%5FAccessories%5FLady%5F1%5F1.jpg" alt="Armani Borsa Bag" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.php?name=Armani%20Borsa%20Bag">Armani Borsa Bag</a></h3>
                                    <p class="price"><del>$999</del> $666</p>
                                </div>
                                <!-- /.text -->

                                <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->

                                <div class="ribbon gift">
                                    <div class="theribbon">GIFT</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?name=Versace%20Medusa%20belt">
                                                <img src="img/img/Versace%5FAccessories%5FLady%5F1%5F1.jpg" alt="Versace Medusa belt" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?name=Versace%20Medusa%20belt">
                                                <img src="img/img/Versace_Accessories%5FLady%5F1%5F2.jpg" alt="Versace Medusa belt" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php" class="invisible">
                                    <img src="img/img/Versace_Accessories%5FLady%5F1%5F1.jpg" alt="Versace Medusa belt" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.php?name=Versace%20Medusa%20belt">Versace Medusa belt</a></h3>
                                    <p class="price">$666</p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?name=A%7CX%20WINGS%20LOGO%20TEE">
                                                <img src="img/img/Armani%5FT%5FShirts%5FLady%5F1%5F1.jpg" alt="A|X WINGS LOGO TEE" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?name=A%7CX%20WINGS%20LOGO%20TEE">
                                                <img src="img/img/Armani%5FT%5FShirts%5FLady%5F1%5F2.jpg" alt="A|X WINGS LOGO TEE" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php?name=A%7CX%20WINGS%20LOGO%20TEE" class="invisible">
                                    <img src="img/img/Armani%5FT%5FShirts%5FLady%5F1%5F1.jpg" alt="A|X WINGS LOGO TEE" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.php?name=A%7CX%20WINGS%20LOGO%20TEE">A|X WINGS LOGO TEE</a></h3>
                                    <p class="price">$50</p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?name=SEQUIN%20LOGO%20CREWNECK%20TEE">
                                                <img src="img/img/Armani%5FT%5FShirts%5FLady%5F2%5F1.jpg" alt="SEQUIN LOGO CREWNECK TEE" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?name=SEQUIN%20LOGO%20CREWNECK%20TEE">
                                                <img src="img/img/Armani%5FT%5FShirts_Lady%5F2%5F2.jpg" alt="SEQUIN LOGO CREWNECK TEE" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php?name=SEQUIN%20LOGO%20CREWNECK%20TEE" class="invisible">
                                    <img src="img/img/Armani%5FT%5FShirts%5FLady%5F2%5F1.jpg" alt="SEQUIN LOGO CREWNECK TEE" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.php?name=SEQUIN%20LOGO%20CREWNECK%20TEE">SEQUIN LOGO CREWNECK TEE</a></h3>
                                    <p class="price">$50</p>
                                </div>
                                <!-- /.text -->

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?name=Versace%20Printed%20silk-twill%20shirt">
                                                <img src="img/img/Versace%5FShirts%5FLady%5F1%5F1.jpg" alt="Versace Printed silk-twill shirt" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?name=Versace%20Printed%20silk-twill%20shirt">
                                                <img src="img/img/Versace%5FShirts%5FLady%5F1%5F2.jpg" alt="Versace Printed silk-twill shirt" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php?name=Versace%20Printed%20silk-twill%20shirt" class="invisible">
                                    <img src="img/img/Versace%5FShirts%5FLady%5F1%5F1.jpg" alt="Versace Printed silk-twill shirt" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.php?name=Versace%20Printed%20silk-twill%20shirt">Versace Printed silk-twill shirt</a></h3>
                                    <p class="price">$1350</p>
                                </div>
                                <!-- /.text -->

                                <div class="ribbon gift">
                                    <div class="theribbon">GIFT</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->

                            </div>
                            <!-- /.product -->
                        </div>
                        <!-- /.col-md-4 -->

                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?name=Armani%20Blue%20stretch%20cotton%20plain%20shirt">
                                                <img src="img/img/Armani%5FShirts%5FLady%5F1%5F1.jpg" alt="Armani Jeans Small Shoulder Bag Blue" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?name=Armani%20Blue%20stretch%20cotton%20plain%20shirt">
                                                <img src="img/img/Armani%5FShirts%5FLady%5F1%5F2.jpg" alt="Armani Jeans Small Shoulder Bag Blue" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php?name=Armani%20Blue%20stretch%20cotton%20plain%20shirt" class="invisible">
                                    <img src="img/img/Armani%5FShirts%5FLady%5F1%5F1.jpg" alt="Armani Jeans Small Shoulder Bag Blue" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.php?name=Armani%20Blue%20stretch%20cotton%20plain%20shirt">Armani Blue stretch cotton plain shirt</a></h3>
                                    <p class="price"><del>$250</del> $115</p>
                                </div>
                                <!-- /.text -->

                                <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->

                                <div class="ribbon gift">
                                    <div class="theribbon">GIFT</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="detail.php?name=Versace%20Baroccoflage%20print%20shirt%20new">
                                            <img src="img/img/Versace%5FShirts%5FLady%5F3%5F1.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="detail.php?name=Versace%20Baroccoflage%20print%20shirt%20new">
                                            <img src="img/img/Versace%5FShirts%5FLady%5F3%5F2.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="detail.php" class="invisible">
                                <img src="img/img/Versace%5FShirts%5FLady%5F3%5F1.jpg" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3><a href="detail.php?name=Versace%20Baroccoflage%20print%20shirt%20new">Versace Baroccoflage print shirt new</a></h3>
                                <p class="price">$650</p>
                            </div>
                            <!-- /.text -->
                        </div>
                        <!-- /.product -->
                    </div>









                        <!-- /.col-md-4 -->







                    </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->

            <!-- *** GET INSPIRED ***
 _________________________________________________________ -->
 
 <!--
        <div class="container" data-animate="fadeInUpBig">
                <div class="col-md-12">
                    <div class="box slideshow">
                        <h3>Get Inspired</h3>
                        <p class="lead">Get the inspiration from our world class designers</p>
                        <div id="get-inspired" class="owl-carousel owl-theme">
                            <div class="item">
                                <a href="#">
                                    <img src="img/getinspired1.jpg" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <img src="img/getinspired2.jpg" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <img src="img/getinspired3.jpg" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
		commented by Shang 03/07/2017  -->
            <!-- *** GET INSPIRED END *** -->

            <!-- *** BLOG HOMEPAGE ***
 _________________________________________________________ -->

            
            <div class="container">

                <div class="col-md-12" data-animate="fadeInUp">

                    <div id="blog-homepage" class="row"> </div>
                    <!-- /#blog-homepage -->
              </div>
          </div>
            <!-- /.container -->

            <!-- *** BLOG HOMEPAGE END *** -->


        </div>
        <!-- /#content -->

        <!-- *** FOOTER ***
 _________________________________________________________ -->
        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>Information</h4>

                        <ul>
                            <li><a href="aboutus.php">About us</a>
                            </li>
                            <li><a href="terms.php">Terms and conditions</a>
                            </li>
                            <li><a href="faq.php">FAQ</a>
                            </li>
                            <li><a href="contact.php">Contact us</a>
                            </li>
                        </ul>

                        <hr>

                        <h4>User section</h4>

                        <ul>
                        <?php
                        if(isset($_SESSION['signin']))
                            echo '<li><a href="logout.php">Logout</a>
                            </li>';
                        else
                            echo '<li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                            </li>
                            <li><a href="register.php">Regiter</a>
                            </li>';
                        ?>
                            
                        </ul>

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Top categories</h4>

                        <h5>Men</h5>

                        <ul>
                            <li><a href="category-man.php?type=T-Shirts">T-shirts</a>
                            </li>
                            <li><a href="category-man.php?type=Shirts">Shirts</a>
                            </li>
                            <li><a href="category-man.php?type=Pants">Pants</a>
                            </li>
                            <li><a href="category-man.php?type=Accessories">Accessories</a>
                            </li>
                        </ul>

                        <h5>Ladies</h5>
                        <ul>
                            <li><a href="category-lady.php?type=T-Shirts">T-shirts</a>
                            </li>
                            <li><a href="category-lady.php?type=Shirts">Skirts</a>
                            </li>
                            <li><a href="category-lady.php?type=Pants">Pants</a>
                            </li>
                            <li><a href="category-lady.php?type=Accessories">Accessories</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Where to find us</h4>

                        <p><strong>Obaju Ltd.</strong>
                            <br>500 Main Street
                            <br>Geelong
                            <br>Victoria 3200
                            <br>
                            <strong>Australia</strong>
                        </p>

                        <a href="contact.php">Go to contact page</a>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-md-3 col-sm-6">

                      

                        
                       
                        <h4>Stay in touch</h4>

                        <p class="social">
                            <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                        </p>


                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2017 Obaju Ltd.</p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right">Template by <a href="https://bootstrapious.com/e-commerce-templates">Bootstrapious.com</a>
                         <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
                    </p>
                </div>
            </div>
      </div>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->


    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>
    <script>
        var previous_value='';
        function check_password()
        {
            var email=document.getElementById('email-modal').value;
            var password=document.getElementById('password-modal').value;
            var xmlhttp;
            if (email=="")
            {
                return;
            }
            if(password=='')
            {
                return;
            }
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    if(xmlhttp.responseText=='success')//success
                    {
                        window.location.href='index.php';
                    }
                    else
                    {
                        document.getElementById('error_info').style.display='block';
                    }
                }
            }
            xmlhttp.open( 'POST', 'get_real_password.php', true );
            xmlhttp.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
            xmlhttp.send('email='+email+'&password='+password);
        }

        function jump_to_result()
        {
            var search=document.getElementById('search_text').value;
            var url='search-reault.php?keyword='+search;
            window.location.href=url;
        }



        function search(value)
        {
            var xmlhttp;
            var autowidth=document.getElementById('search_text').offsetWidth;
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp=new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function()
                {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        if(xmlhttp.responseText!='')//success
                        {
                            document.getElementById('suggestion_list').innerHTML=xmlhttp.responseText;
                            $(".dropdown-toggle").dropdown('toggle');
                            document.getElementById('search_text').focus();
                            // document.getElementById('suggestion_list').style.display='block';

                        }
                        // else
                        // {
                        //     if(xmlhttp.responseText=='')
                        //     {
                        //         document.getElementById('suggestion_list').innerHTML='<li style="padding-left: 5px; padding-right:5px; width:'+autowidth+'px">no result</li>';
                        //         show_suggestion();
                        //         document.getElementById('search_text').focus();
                        //         // document.getElementById('suggestion_list').style.display='block';


                        //     }
                        //     else if(xmlhttp.responseText=='null')
                        //     {
                        //         document.getElementById('suggestion_list').innerHTML='';
                        //         // document.getElementById('suggestion_list').style.display='none';
                        //         document.getElementById('search_text').focus();
                        //     }
                        // }
                    }
                }
                xmlhttp.open( 'POST', 'get_suggestion.php', true );
                xmlhttp.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
                xmlhttp.send('suggestion='+value+'&width='+autowidth);
        }

    </script>
</body>

</html>