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
		.srch {
			padding-left: 1000px;
		}

		body {
			font-family: "Times New Roman", sans-serif;
			transition: background-color:skyblue .5s;
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
			.sidenav {
				padding-top: 15px;
			}

			.sidenav a {
				font-size: 18px;
			}
		}

		.editBtn {
			font-family: sans-serif;
			text-decoration: none;
			display: inline-block;
			font-weight: 400;
			line-height: 1.5;
			color: #fff;
			text-align: center;
			text-decoration: none;
			vertical-align: middle;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
			background-color: transparent;
			border: 1px solid transparent;
			padding: 0.375rem 0.75rem;
			font-size: 1rem;
			border-radius: 0.25rem;
			background-color: #212529;
			border-color: #212529;
			transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
		}

		.editBtn:hover {
			color: #fff;
			text-decoration: none;
			background-color: #1c1f23;
			border-color: #1a1e21;
		}

		.img-circle {
			margin-left: 20px;
		}

		.h:hover {
			color: skyblue;
			width: 300px;
			height: 50px;
			background-color: skyblue;
		}
	</style>

</head>

<body>
	<!--_________________sidenav_______________-->

	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

		<div style="color:#a6ffcb ; margin-left: 60px; font-size: 20px;">

			<?php
			if (isset($_SESSION['admin'])) {
				$_SESSION['de'] = 'de.jpg';
				echo "<img class='img-circle profile_img'  height=130 width=150 src='image/" . $_SESSION['de'] . "'>";
				echo "</br></br>";

				echo "Welcome " . $_SESSION['admin'];
			}
			?>
		</div><br><br>


		<div class="h"> <a href="add.php"> Add Books</a></div>
		<div class="h"> <a href="request.php">Request</a></div>
		<div class="h"><a href="index.php">Home</a></div>
		<div class="h"> <a href="approve.php">Approve</a></div>
		<div class="h"> <a href="issue.php">Issue Information</a></div>



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
				document.getElementById("main").style.marginLeft = "0";
				document.body.style.backgroundColor = "white";
			}
		</script>
		<!--___________________search bar________________________-->

		<div class="srch">
			<form class="navbar-form" method="post" name="form1">

				<input class="form-control" type="text" name="search" placeholder="search books.." required="">
				<button style="background-color: #96df26; border-radius: 40px;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</form>
			<form class="navbar-form" method="post" name="form1">

				<input class="form-control" type="text" name="Books_Id" placeholder="Books ID" required="">
				<button style="background-color: #ef629f; border-radius: 40px;" type="submit" name="submit1" class="btn btn-default">Delete
				</button>
			</form>
		</div>



		<h2>List Of Books</h2>
		<?php

		if (isset($_POST['submit'])) {
			$q = mysqli_query($db, "SELECT * from books where name like '%$_POST[search]%' ");

			if (mysqli_num_rows($q) == 0) {
				echo "Sorry! No book found. Try searching again.";
			} else {
				echo "<table class='table table-bordered table-hover' >";
				echo "<tr style='background-color: #96df26;'>";
				//Table header
				echo "<th>";
				echo "Books ID";
				echo "</th>";
				echo "<th>";
				echo "Books Name";
				echo "</th>";
				echo "<th>";
				echo "Authors Name";
				echo "</th>";
				echo "<th>";
				echo "Edition";
				echo "</th>";
				echo "<th>";
				echo "Status";
				echo "</th>";
				echo "<th>";
				echo "Quantity";
				echo "</th>";
				echo "<th>";
				echo "Department";
				echo "</th>";
				echo "<th>";
				echo "Edit";
				echo "</th>";
				echo "</tr>";

				while ($row = mysqli_fetch_assoc($q)) {

					echo "<tr>";
					echo "<td>";
					echo $row['Books_Id'];
					echo "</td>";
					echo "<td>";
					echo $row['Name'];
					echo "</td>";
					echo "<td>";
					echo $row['Authors'];
					echo "</td>";
					echo "<td>";
					echo $row['Edition'];
					echo "</td>";
					echo "<td>";
					echo $row['Status'];
					echo "</td>";
					echo "<td>";
					echo $row['Quantity'];
					echo "</td>";
					echo "<td>";
					echo $row['Department'];
					echo "</td>";
					echo "<td>";
					echo "<a href='editBook.php?bookId=";
					echo $row['Books_Id'];
					echo "' class='editBtn'>";
					echo "Edit";
					echo "</a>";
					echo "</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		}
		/*if button is not pressed.*/ else {
			$res = mysqli_query($db, "SELECT * FROM `books` ORDER BY `books`.`name` ASC;");

			echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #96df26; font-size:18px'>";
			//Table header
			echo "<th>";
			echo "Books ID";
			echo "</th>";
			echo "<th>";
			echo "Books Name";
			echo "</th>";
			echo "<th>";
			echo "Authors Name";
			echo "</th>";
			echo "<th>";
			echo "Edition";
			echo "</th>";
			echo "<th>";
			echo "Status";
			echo "</th>";
			echo "<th>";
			echo "Quantity";
			echo "</th>";
			echo "<th>";
			echo "Department";
			echo "</th>";
			echo "<th>";
			echo "Edit";
			echo "</th>";
			echo "</tr>";


			while ($row = mysqli_fetch_assoc($res)) {
				echo "<tr>";
				echo "<td>";
				echo $row['Books_Id'];
				echo "</td>";
				echo "<td>";
				echo $row['Name'];
				echo "</td>";
				echo "<td>";
				echo $row['Authors'];
				echo "</td>";
				echo "<td>";
				echo $row['Edition'];
				echo "</td>";
				echo "<td>";
				echo $row['Status'];
				echo "</td>";
				echo "<td>";
				echo $row['Quantity'];
				echo "</td>";
				echo "<td>";
				echo $row['Department'];
				echo "</td>";
				echo "<td>";
				echo "<a href='editBook.php?bookId=";
				echo $row['Books_Id'];
				echo "' class='editBtn'>";
				echo "Edit";
				echo "</a>";
				echo "</td>";

				echo "</tr>";
			}
			echo "</table>";
		}

		if (isset($_POST['submit1'])) {
			if (isset($_SESSION['user'])) {
				mysqli_query($db, "DELETE from books where Books_Id = '$_POST[Books_Id]'; ");
		?>
				<script type="text/javascript">
					alert("Delete Successful.");
				</script>
			<?php
			} else {
			?>
				<script type="text/javascript">
					alert("You must login First");
				</script>
		<?php
			}
		}

		?>
	</div>

</body>

</html>