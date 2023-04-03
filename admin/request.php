<?php
  include "connection.php";
  session_start();
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<style type="text/css">

		.srch
		{
			padding-left: 850px;

		}
		.form-control
		{
			width: 300px;
			height: 40px;
			background-color: ;transparent;
			color: black;
            font-size:13px;
		}
		
		body {
		 
  	font-family: "Times New Roman", sans-serif;
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
	color:skyblue;
	width: 300px;
	height: 50px;
	background-color: skyblue;
}
.container
{
	height: 600px;
	background-color: transparent;
	opacity: .8;
	color: black;
    font-size:20px;
}

	</style>

</head>
<body>
<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: black; margin-left: 60px; font-size: 20px;">

              <?php
                if(isset($_SESSION['admin']))

                { 	 $_SESSION['de'] = 'de.jpg';
					echo "<img class='img-circle profile_img'  height=130 width=150 src='image/".$_SESSION['de']."'>";
                    echo "</br></br>";

                    echo "Welcome".$_SESSION['admin']; 
                }
                ?>
            </div><br><br>

 
  <div class="h"> <a href="books.php">Books</a></div>
  <div class="h"> <a href="approve.php">Approve</a></div>
  <div class="h"> <a href="issue.php">Issue Information</a></div>
  <div class="h"><a href="exprier.php">Expired List</a></div>
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
	<br>

<div class="container">
	<div class="srch">
		<br>
		<form method="post" action="" name="form1">
			<input type="text" name="Username" class="form-control" placeholder="Username" required=""><br>
			<input type="text" name="Books_Id" class="form-control" placeholder="Books Id" required=""><br>
			<button style="background-color: #96df26; border-radius: 30px; size:20px" type="submit" name="submit" class="btn btn-default">Submit</button><br>
		</form>
	</div>

	<h3 style="text-align: center; color: black; font-size:22px; font-family:Times new roman; padding-left:40px">Request of Book</h3>

	<?php
	
	if(isset($_SESSION['admin']))
	{
		$sql= "SELECT user.Username,books.Books_Id,Name,Authors,Edition,Status FROM user inner join issue ON user.Username=issue.Username inner join books ON issue.Books_Id=books.Books_Id WHERE issue.Approve =''";
		$res= mysqli_query($db,$sql);

		if(mysqli_num_rows($res)==0)
			{
				echo "<h2><b>";
				echo "There's no pending request.";
				echo "</h2></b>";
			}
		else
		{
			echo "<table class='table table-bordered' >";
			echo "<tr style='background-color: #96df26;'>";
				//Table header
				
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "Books Id";  echo "</th>";
				echo "<th>"; echo "Book Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['Username']; echo "</td>";
				echo "<td>"; echo $row['Books_Id']; echo "</td>";
				echo "<td>"; echo $row['Name']; echo "</td>";
				echo "<td>"; echo $row['Authors']; echo "</td>";
				echo "<td>"; echo $row['Edition']; echo "</td>";
				echo "<td>"; echo $row['Status']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
		}
	}
	else
	{
		?>
		<br>
			<h4 style="text-align: center;color: red; font-size: 25px">You need to login to see the request.</h4>
			
		<?php
	}

	if(isset($_POST['submit']))
	{
		$_SESSION['Name']=$_POST['Username'];
		$_SESSION['Books_Id']=$_POST['Books_Id'];

		?>
			<script type="text/javascript">
				window.location="approve.php"
			</script>
		<?php
	}

	?>
	</div>
</div>
</body>
</html>