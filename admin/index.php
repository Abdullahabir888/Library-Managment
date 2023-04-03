<?php 

include 'connection.php';
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Library Management System
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="" ="viewport" content="width=device-width, inital-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style type="text/css">
	nav
	{
		float: right;
		word-spacing: 12px;
		padding: 10px;
	}
	nav li 
	{
		display: inline-block;
		line-height: 50px;
		color: black;
	
	}
	nav ul a:hover
{
	color: black;
	width: 150px;
	height: 90px;
	border-radius: 50px;
	background-color:    #ff3399 ;
}
	
	.fa
		{
			margin: 0px 5px;
			padding: 5px;
			font-size: 20px;
			width: 20px;
			height: 20px;
			text-align: center;
			text-decoration: none;
			border-radius: 50%;
		}
		.fa:hover
		{
			opacity: .7;
		}
		.fa-facebook
		{
			background: #3B5998;
			color: white;
		}
		.fa-twitter
		{
			background: #55ACEE;
			color: white;
		}
		.fa-google
		{
			background: #dd4b39;
			color: white;
		}
		.fa-linkedin
		{
			background: #125688;
			color: white;
		}
		
</style>
</head>

<body>
	<div class="run">
		<header>
			
			<div class="logo">
			<img src="image/30.png">
			<h1 style="color: black;">E-LIFE LEARNER</h1>
			</div>

			<?php
		if(isset($_SESSION['admin']))
		{
			?>
				<nav>
					<ul>
						
				<li><a href="index.php">HOME</a></li>
		   		<li><a href="books.php">BOOKS</a></li>
		   		<li><a href="admin login.php">LOGIN</a></li>
				   <li><a href="registration.php">Sign-Up</a></li>
		   		<li><a href="feedback.php">FEEDBACK</a></li>

					</ul>
				</nav>
			<?php
		}
		else
		{
			?>
						<nav>
							<ul>
								<li><a href="index.php">HOME</a></li>
								<li><a href="books.php">BOOKS</a></li>
								<li><a href="admin login.php">Login</a></li>
								<li><a href="registration.php">Sign-Up</a></li>
								<li><a href="feedback.php">FEEDBACK</a></li>
							</ul>
						</nav>
		<?php
		}
			
		?>
        </header>
        <section>
			<div class="bul_img">

        	<br><br><br><br><br>
			
        	<div class="bul">
        		
        		<h1 style="text-align: center; font-size: 30px;">WELCOM TO <br>E-LIFE LEARNER</h1><br><br>
				
	     </div>
        </section>
        <br><br><br><br><br>
		<br><br><br><br><br><br>
		

	<div style="margin:0px 680px;">
    <a href="https://www.facebook.com/abir.ahmed89/" trarget="_blank" class="fa fa-facebook"></a>
		<a href="https://twitter.com/abirahm09836085?t=QqEzA2OVVvMUYVF9w4SFLw&s=09" trarget="_blank" class="fa fa-twitter"></a>
		<a href="abdullahabir888@gmail.com" trarget="_blank" class="fa fa-google"></a>
		<a href="https://www.linkedin.com/in/abdullah-al-ahad-abir-b72827215/" trarget="_blank" class="fa fa-linkedin"></i></a>
	</div>
</body>
<br><br>
<p  style="color: black; font-family: Times New Roman;">
    &nbsp; Copyright @Team Invinsible 2021-2024
</p>

</html>

