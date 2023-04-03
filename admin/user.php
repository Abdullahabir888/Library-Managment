<?php
  include "connection.php";
  session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}

		body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
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
<body>
	<!--_________________sidenav_______________-->

	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: ; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['user']))

                {
					$_SESSION['de'] = 'de.jpg';
					echo "<img class='img-circle profile_img'  height=130 width=150src='image/".$_SESSION['de']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['admin'];
                }
                ?>
            </div><br><br>


  <div class="h"> <a href="books.php">Books</a></div>
  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"> <a href="issue.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
  <div class="h"><a href="Index.php">Home</a></div>
  <div class="h"><a href="profile.php">PROFILE</a></div>

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
  document.body.style.backgroundColor = "white";
}
</script>
	<!--___________________search bar__________________-->
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">

				<input class="form-control" type="text" name="bid" placeholder="User username.." required="">
				<button style="background-color: #ef629f; border-radius: 20px;" type="submit" name="submit1" class="btn btn-default">Request
				</button>
		</form>
	</div>


	<h2>List Of User</h2>
	<?php

		if(isset($_POST['submit']))
		{
            $q=mysqli_query($db,"SELECT First,Last,Uername,Email,Contact FROM `user` where username like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No user found with that username. Try searching again.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #96df26;'>";
				//Table header
				echo "<th>"; echo "First Name";	echo "</th>";
				echo "<th>"; echo "Last Name";  echo "</th>";
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "Email";  echo "</th>";
				echo "<th>"; echo "Contact no";  echo "</th>";
			echo "</tr>";

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['First']; echo "</td>";
				echo "<td>"; echo $row['Last']; echo "</td>";
				echo "<td>"; echo $row['Username']; echo "</td>";
				echo "<td>"; echo $row['Email']; echo "</td>";
				echo "<td>"; echo $row['Contact']; echo "</td>";
				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT First,Last,Username,Email,Contact FROM `user`;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #96df26;'>";
				//Table header
                echo "<th>"; echo "First Name";	echo "</th>";
				echo "<th>"; echo "Last Name";  echo "</th>";
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "Email";  echo "</th>";
				echo "<th>"; echo "Contact no";  echo "</th>";
			echo "</tr>";
			echo "</tr>";

			while($row=mysqli_fetch_assoc($res))
			{
                echo "<tr>";
				echo "<td>"; echo $row['First']; echo "</td>";
				echo "<td>"; echo $row['Last']; echo "</td>";
				echo "<td>"; echo $row['Username']; echo "</td>";
				echo "<td>"; echo $row['Email']; echo "</td>";
				echo "<td>"; echo $row['Contact']; echo "</td>";
				echo "</tr>";

				echo "</tr>";
			}
		echo "</table>";
		}

		if(isset($_POST['submit1']))
		{
			if(isset($_SESSION['sdmin']))
			{
				mysqli_query($db,"INSERT INTO issue_book Values('$_SESSION[user]', '$_POST[Books_Id]', '', '', '');");
				?>
					<script type="text/javascript">
						window.location="request.php"
					</script>
				<?php
			}
			else
			{
				?>
					<script type="text/javascript">
						alert("You must login to Request a book");
					</script>
				<?php
			}
		}

	?>
</div>
</body>
</html>
