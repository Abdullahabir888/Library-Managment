<?php
  include "connection.php";
  include "navbar.php";
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
  background-color: white;
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
	color:white;
	width: 300px;
	height: 50px;
	background-color: white;
}

.book
{
    width: 400px;
    margin: 0px auto;
}
.form-control
{
  background-color: white;
  color: black;
  height: 40px;
  font-size: 18px;
}

	</style>


</head>
<body>
	<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color:#a6ffcb ; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['admin']))

                { 	echo "<img class='img-circle profile_img'  height=130 width=150 src='image/".$_SESSION['de']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['admin']; 
                }
                ?>
            </div><br><br>

 <div class="h"> <a href="add.php">Add Books</a> </div> 
  <div class="h"> <a href="delete.php">Delete Books</a></div>
  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"> <a href="issue_info.php">Issue Information</a></div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer; color: blue;" onclick="openNav()">&#9776; open</span>
  <div class="container" style="text-align: center;">
    <h2 style="color:Tranaparent; font-family: Times New Roman; text-align: center"><b>Add New Books</b></h2>
    
    <form class="book" action="" method="post">
        
        <input type="text" name="Books_Id" class="form-control" placeholder="Book ID" required=""><br>
        <input type="text" name="Name" class="form-control" placeholder="Books Name" required=""><br>
        <input type="text" name="Authors" class="form-control" placeholder="Authors Name" required=""><br>
        <input type="text" name="Edition" class="form-control" placeholder="Edition" required=""><br>
        <input type="text" name="Status" class="form-control" placeholder="Status" required=""><br>
        <input type="text" name="Quantity" class="form-control" placeholder="Quantity" required=""><br>
        <input type="text" name="Department" class="form-control" placeholder="Department" required=""><br>

        <button class="btn btn-primary" type="submit" name="submit" style="color:black; border-radius: 20px; border-color: black" >ADD</button>
  </div>
<?php
    if(isset($_POST['submit']))
    {
      if(isset($_SESSION['admin']))
      {
        mysqli_query($db,"INSERT INTO books VALUES ('$_POST[Books_Id]', '$_POST[Name]', '$_POST[Authors]', '$_POST[Edition]', '$_POST[Status]', '$_POST[Quantity]', '$_POST[Department]') ;");
        ?>
          <script type="text/javascript">
            alert("Book Added Successfully.");
          </script>

        <?php

      }
      else
      {
        ?>
          <script type="text/javascript">
            alert("You need to login first.");
          </script>
        <?php
      }
    }
?>
</div>
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

</body>
