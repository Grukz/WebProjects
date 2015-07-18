<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Web Forum | Welcome</title>
    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/demo.css" /> -->
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<link href="css/jquery.bxslider.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/styles.css">
<style>
	body{
	background: url(images/wood.jpg);
	-webkit-background-size: cover; 
	-moz-background-size: cover;
	-o-background-size: cover;
    background-size: cover;
}
</style>
</head>


<body>
	

	<div class="navbar navbar-inverse navbar-static-top" id="topbar" role="navigation">
		<div class="container">			
			<a class="navbar-brand" href="index.php">Forum</a>
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
	  		<nav class="collapse navbar-collapse navHeaderCollapse" role="navigation">
	  				<ul class="nav navbar-nav navbar-center">
	  			  		<li class="divider-vertical"></li>
	  			  		<li class="home"><a href="topic.php">Home</a></li>
	  			  		<li class="dropdown">
        			 		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
          					<ul class="dropdown-menu">
					            <li><a href="category.php?id=1">Php</a></li>
					            <li><a href="category.php?id=2">Javascript</a></li>
					            <li><a href="category.php?id=3">Html</a></li>
					            <li><a href="category.php?id=4">Xml</a></li>
					            <li><a href="category.php?id=5">Css</a></li>
					            <li><a href="category.php?id=6">CMS</a></li>
					            <li><a href="category.php?id=7">MySQL</a></li>
					            <li><a href="category.php?id=8">Ruby</a></li>
          					</ul>
        				</li>
	  			  		<li class="aska"><a href="ask.php">Ask a question</a></li>
	  			  	</ul>
	  			<?php
	  			session_start();
	  			if($_SESSION['signed_in']){
	  				echo '<a href="signout.php"><button type="button" class="btn btn-success navbar-btn pull-right">Sign Out</button></a>';	  				
	  				echo '<a href="#" class="navbar-brand pull-right">' . $_SESSION['user_name'] . '</a>';
	  			}else{
	  				echo '<a href="signup.php"><button type="button" id="button-left" class="btn btn-danger navbar-btn pull-right">Register</button></a>
	  					  <a href="signin.php"><button type="button" id="button-right" class="btn btn-primary navbar-btn pull-right">Sign In</button></a>';	  				
	  			}
	  			?>
	  		</nav>
		</div>
	</div>
	<div class="navbar navbar-inverse navbar-fixed-top" id="topbar1">
		<div class="container">			
			<a class="navbar-brand" href="index.php">Forum</a>
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
	  		<nav class="collapse navbar-collapse navHeaderCollapse">
	  				<ul class="nav navbar-nav navbar-center">
	  			  		<li class="divider-vertical"></li>
	  			  		<li class="home"><a href="#">Home</a></li>
	  			  		<li class="dropdown">
        			 		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
          					<ul class="dropdown-menu">
					            <li><a href="category.php?id=1">Php</a></li>
					            <li><a href="category.php?id=2">Javascript</a></li>
					            <li><a href="category.php?id=3">Html</a></li>
					            <li><a href="category.php?id=4">Xml</a></li>
					            <li><a href="category.php?id=5">Css</a></li>
					            <li><a href="category.php?id=6">CMS</a></li>
					            <li><a href="category.php?id=7">MySQL</a></li>
					            <li><a href="category.php?id=8">Ruby</a></li>
          					</ul>
        				</li>	  			  		
	  			  		<li class="aska"><a href="ask.php">Ask a question</a></li>
	  			  	</ul>
	  			<?php
	  			if($_SESSION['signed_in']){
	  				echo '<a href="signout.php"><button type="button" class="btn btn-success navbar-btn pull-right">Sign Out</button></a>';	  				
	  				echo '<a href="#" class="navbar-brand pull-right">' . $_SESSION['user_name'] . '</a>';
	  			}else{
	  				echo '<a href="signup.php"><button type="button" id="button-left" class="btn btn-danger navbar-btn pull-right">Register</button></a>
	  					  <a href="signin.php"><button type="button" id="button-right" class="btn btn-primary navbar-btn pull-right">Sign In</button></a>';	  				
	  			}
	  			?>
	  		</nav>
		</div>
	</div>
	<div class="container" id="jumb">
		<!-- <div class="jumbotron"> -->
			<center><ul class="bxslider">
<!-- 			  <li><img src="images/pic1.jpg" /></li>
			  <li><img src="images/pic2.jpg" /></li>
			  <li><img src="images/pic3.jpg" /></li>
			  <li><img src="images/pic4.jpg" /></li> -->
			  <li><h1 style="margin-top: 45px; font-size: 5em; color: white;">Web Forum</h1></li>
			  <li><h1 style="margin-top: 45px; font-size: 5em; color: white;">Html</h1></li>
			  <li><h1 style="margin-top: 45px; font-size: 5em; color: white;">Css</h1></li>
			  <li><h1 style="margin-top: 45px; font-size: 5em; color: white;">Javascript</h1></li>
			  <li><h1 style="margin-top: 45px; font-size: 5em; color: white;">And many more...</h1></li>
			</ul></center>
			<!-- <center>
				<h1>Some catchy text here</h1>					
				<a class ="btn btn-default" href="#">Home</a>
				<a class = "btn btn-info" href="#">Forum</a>
			</center> -->
		<!-- </div> -->
	 </div>
