<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Approve Request</title>
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
			height: 45px;
			background-color: Transparent;
			color: black;
            font-size:15px;
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
.Approve
{
  margin-left: 420px;
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
  <div class="container">
    <br><h3 style="text-align: center;">Approve Request</h3><br><br>
    
    <form class="Approve" action="" method="post">
        <input class="form-control" type="text" name="Approve" placeholder="Yes or No" required=""><br>

        <input type="date" name="Issue" placeholder="Issue Date yyyy-mm-dd" required="" class="form-control"><br>

        <input type="date" name="Return" placeholder="Return Date yyyy-mm-dd" required="" class="form-control"><br>
        <button style="background-color: #96df26; border-radius: 30px; font-size:18px; hight:30px;" type="submit" name="submit" class="btn btn-default">Apprpve</button><br>
    </form>
  
  </div>
</div>

<?php
  if(isset($_POST['submit']))
  {
    mysqli_query($db,"UPDATE  `issue` SET  `Approve` =  '$_POST[Approve]', `Issue` =  '$_POST[Issue]', `Return` =  '$_POST[Return]' WHERE Username='$_SESSION[Name]' and Books_Id='$_SESSION[Books_Id]';");

    mysqli_query($db,"UPDATE Books SET Quantity = Quantity-1 where Books_Id='$_SESSION[Books_Id]' ;");

    $res=mysqli_query($db,"SELECT Quantity from books where Books_Id='$_SESSION[Books_Id];");

    while($row=mysqli_fetch_assoc($res))
    {
      if($row['Quantity']==0)
      {
        mysqli_query($db,"UPDATE books SET status='not-available' where Books_Id='$_SESSION[Books_Id]';");
      }
    }
    ?>
      <script type="text/javascript">
        alert("Updated successfully.");
        window.location="request.php"
      </script>
    <?php
  }
?>
</body>
</html>