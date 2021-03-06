<?php
	session_start();
	if($_SESSION['username'] == "")
	{
		echo "Please Login!";
		exit();
	}
	
	include "connect.php";

	$strSQL = "SELECT * FROM login WHERE username = '".$_SESSION['username']."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

	$SQL = "SELECT * FROM selllist RIGHT JOIN product ON selllist.productname = product.name ";
	$Query = mysqli_query($objCon,$SQL);

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Lesser &mdash; Free HTML5 Bootstrap Website Template by FreeHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">


	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="css/simple-line-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">



	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

		<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">กรุณาเข้าสู่ระบบ</h4></center>
        </div>
        <div class="modal-body">
          <center>
          <form action="check_login.php" method="POST">
    <div class="form-group">
      <input type="text" class="form-control" name="usr" placeholder="Username">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" name="pwd" placeholder="Password">
    </div>
    <input type="submit" class="btn btn-success" placeholder="Password" value="เข้าสู่ระบบ">
  </form>
        </center>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
        </div>
      </div>
    </div>
  </div>
	
	
	<div id="fh5co-page">
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="header-inner">
				<h1><i class="sl-icon-energy"></i><a href="index.html">Lesserr</a></h1>
				<nav role="navigation">
					<ul>
                        <?php if($_SESSION['username'] != "") { ?>
						    <li><a href="profile.php"><?php echo $_SESSION["username"]; ?></a></li>
						<?php } ?>
						<?php if($_SESSION['username'] == "") { ?>
						    <li><a href="" data-toggle="modal" data-target="#myModal">เข้าสู่ระบบ</a></li>
						<?php } ?>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	
	<div id="fh5co-blog-section" class="fh5co-grey-bg-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 fh5co-heading">
                <form action="process-add-product.php" method="post" enctype="multipart/form-data">
							<div class="row form-group">
								<div class="col-md-12">
									<label for="fname">ชื่อสินค้า</label>
									<input type="text" name="na" class="form-control">
								</div>
								
                            </div>
                            <div class="row form-group">
								<div class="col-md-12">
									<label for="fname">รายละเอียด</label>
									<input type="text" name="am" class="form-control">
								</div>
								
                            </div>
                            <div class="row form-group">
								<div class="col-md-6">
									<label for="fname">ชนิด</label>
									<input type="text"name="pr" class="form-control">
								</div>
								<div class="col-md-6">
									<label for="email">ประเภท</label>
									<input type="number" name="day" class="form-control">
								</div>
                            </div>
                            <div class="row form-group">
								<div class="col-md-6">
									<label for="email">รูป</label>
									<input type="file" name="filUpload" class="form-control">
								</div>
								<div class="col-md-6">
									<label for="fname">จำนวน</label>
									<input type="number" name="amo" class="form-control">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-6">
									<label for="fname">ราคา</label>
									<input type="number" name="pri" class="form-control">
								</div>
								<div class="col-md-6">
									<label for="fname">เวลาที่ลง</label>
									<input type="date" name="date" class="form-control">
								</div>
								
                            </div>
							<div class="form-group">
								<input type="submit" value="ยืนยัน" name="submit" class="btn btn-primary">
							</div>

						</form>
				</div>
			</div>
		</div>
    </div>
    
	
	<footer id="fh5co-footer" role="contentinfo">
	
		<div class="container">
			<div class="col-md-3 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<h3>About Us</h3>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
			</div>
			<div class="col-md-6 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<h3>Our Services</h3>
				<ul class="float">
					<li><a href="#">Web Design</a></li>
					<li><a href="#">Branding &amp; Identity</a></li>
					<li><a href="#">Free HTML5</a></li>
					<li><a href="#">HandCrafted Templates</a></li>
				</ul>
				<ul class="float">
					<li><a href="#">Free Bootstrap Template</a></li>
					<li><a href="#">Free HTML5 Template</a></li>
					<li><a href="#">Free HTML5 &amp; CSS3 Template</a></li>
					<li><a href="#">HandCrafted Templates</a></li>
				</ul>

			</div>

			<div class="col-md-2 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<h3>Follow Us</h3>
				<ul class="fh5co-social">
					<li><a href="#"><i class="icon-twitter"></i> Twitter</a></li>
					<li><a href="#"><i class="icon-facebook"></i> Facebook</a></li>
					<li><a href="#"><i class="icon-google-plus"></i> Google Plus</a></li>
					<li><a href="#"><i class="icon-instagram"></i> Instagram</a></li>
				</ul>
			</div>
			
			
			<div class="col-md-12 fh5co-copyright text-center">
				<p>&copy; 2016 Free HTML5 template. All Rights Reserved. <span>Designed with <i class="icon-heart"></i> by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images by <a href="http://unsplash.com/" target="_blank">Unsplash</a></span></p>	
			</div>
			
		</div>
	</footer>
	</div>
	
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- MAIN JS -->
	<script src="js/main.js"></script>

	</body>
</html>

