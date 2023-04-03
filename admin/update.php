<?php 
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


	<style type="text/css">
		body
		{
			height: 650px;
			background-image: url("image/pa.jpg");
			background-repeat: no-repeat;
		}
		.run
		{
			width: 400px;
			height: 400px;
			margin:100px auto;
			background-color: transparent;
			opacity: .8;
			color: black;
			padding: 27px 15px;
		}
		.form-control
		{
			width: 300px;
		}
	</style>
</head>
<body>
	<div class="run">
		<div style="text-align: center;">
			<h1 style="text-align: center; font-size: 35px;font-family: Times New Roman; color: white;">Change Your Password</h1>
		</div>
		<div style="padding-left: 50px; padding-top: 40px; border-radius:20px; ">
		<form action="" method="post" >
			<input type="text" name="Username" class="form-control" placeholder="Username" required=""><br>
			<input type="text" name="Email" class="form-control" placeholder="Email" required=""><br>
			<input type="text" name="Password" class="form-control" placeholder="New Password" required=""><br>
			<button class="btn btn-primary" type="submit" name="submit" style="color:black; border-radius: 20px; border-color: black" >Update</button>
		</form>

	</div>
	
	<?php

		if(isset($_POST['submit']))
		{
			if(mysqli_query($db,"UPDATE `admin` SET Password='$_POST[Password]' WHERE Username='$_POST[Username]'
		 AND Email='$_POST[Email]';"))
			{
				?>
					<script type="text/javascript">
                alert("The Password Updated Successfully.");
              </script> 

				<?php
			}
			
		}
	?></div>
</body>
</html>