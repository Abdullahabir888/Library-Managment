<?php 
	include "connection.php";
	session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Profile</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 	<style type="text/css">
 		.wrapper
 		{
 			width: 300px;
 			margin: 0 auto;
 			color: black;
 		}

		 
.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #A6FFCB;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #0D0E0D;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: black;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: white;
}

	</style>
 </head>
 <section>
<!--_________________sidenav_______________-->
	
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: ; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['user']))

                { 	 $_SESSION['de'] = 'de.jpg';
					echo "<img class='img-circle profile_img'  height=130 width=150 src='image/".$_SESSION['de']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['user']; 
                }
                ?>
            </div><br><br>

 
 
  
  <div class="h"><a href="index.php">Home</a></div>
  <div class="h"><a href="books.php">Books</a></div>
  <div class="h"><a href="logout.php">Logout</a></div>

 
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "#D4D3DD";
}
</script>
</section>

 <body style="background-color: #D4D3DD; ">
 	<div class="container">
 		<form action="" method="post">
		 <button class="btn btn-default" style="float: right; width: 120x; height: 40px; border-radius: 30px; color:#4568dc; background-color: transparent ;" name="submit1">Edit Profile</button>
 		</form>
 		<div class="wrapper">
 			<?php

 				if(isset($_POST['submit1']))
 				{
 					?>
 						<script type="text/javascript"; style="border-coloer:royelblue";>
 							window.location="edit.php"
 						</script>
 					<?php
 				}
 				$q=mysqli_query($db,"SELECT * FROM `user` where Username='$_SESSION[user]' ;");
 			?>
 			<h2 style="text-align: center;">Profile</h2>

 			<?php
 				$row=mysqli_fetch_assoc($q);
				 $_SESSION['de'] = 'de.jpg';
				 echo "<div style='text-align: center'>
				 <img class='img-circle profile-img' height=120 width=140 src='image/"; echo $_SESSION['de']; echo "'>";
			 echo "</div>";
 			?>
			 <br>
 			<div style="text-align: center; color: black"> <b>Welcome, </b>
	 			<h4>
	 				<?php echo $_SESSION['user']; ?>
	 			</h4>
				 </div>
				 <br><br>
 			<?php
 				echo "<b>";
 				echo "<table class='table table-bordered'>";


	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> First Name: </b>";
	 					echo "</td>";

	 					echo "<td>";
	 						echo $row['First'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Last Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Last'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> User Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Username'];
	 					echo "</td>";
	 				echo "</tr>";

                     echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Email'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Password: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Password'];
	 					echo "</td>";
	 				echo "</tr>";

	 				                 echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Phone Number: </b>";
	 					echo "</td>";

	 					echo "<td>";
	 						echo $row['Contact'];
	 					echo "</td>";
	 				echo "</tr>";
					 
	 				
				 
 			?>
 		</div>
 	</div>
 </body>
 </html>