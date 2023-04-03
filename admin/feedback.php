<?php

  include "connection.php";
  session_start();
?>

<!DOCTYPE html>
<html>
  <link>
    <title>Feedback</title>
     <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/67c66657c7.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style type="text/css">


    section{
  position:absolute;
  height:100%;
  width:100%;
  background: url(image/feed.jpg);
  background-size: cover;
  background-position: center;
}
body{
  display: flex;
  min-height: 100vh;
  align-items: center;
  justify-content: center;
  font-family: Times new Roman;
}
.container{
  width: 360px;
  background: transparent;
  font-size:16px;
  font-color:black;
  box-shadow:0 0 8px rgba(250,250,250,0.6);
  opacity: 0.6;
}
.container form{
  width: 250px;
  text-align: center;
  padding: 25px 20px;
}
form h1{
  padding: 10px 0;
}
form .ID{
  position: relative;
}
.ID I{
  position: absolute;
  font-size: 20px;
  top: 50%;
  right: 20px;
  transform: translateY(-50%);

}
form input{
  width: 100%;
  height: 50px;
  margin: 4px 0;
  border: 1px solid white;
  border-radius: 3px;
  background: white;
  padding: 0 15px;
  padding-right:45px;
  font-size: 20px;

}
form textarea{
  padding: 5px 15px;
  border: 1px solid #5c5c5c;
  border-radius: 3px;
  background: #181717;
  padding: 0 15px;
  font-size:16px;
  width: 100%;
  margin: 4px 0;
}
form button{
  margin-top: 5px;
  border: none;
  background: skyblue;
  color: black;
  padding: 10px 0;
  width: 100%;
  font-size: 20px;
  font-weight: 800px;
  cursor: pointer;
  border-radius: 3px;
}
form input:focus,
form textarea:focus{
  border: 1px solid #bf0fff;
  color: black;
  font-size:16px;
  transition: all 0.3s ease;
}
form input:focus::placeholder,
form textarea:focus::placeholder{
 padding-left: 4px;
  color: skyblue;
  transition: all 0.3s ease;
  font-size:16px;


}


.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: white;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #82C26E;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: white;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
.scroll
    	{
    		width: 100%;
    		height: 300px;
    		overflow: auto;
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
	background-color: red;
}
</style>
 </head>
 <body>
   <section>	
  <!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: ; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['aadmin']))

                { 	$_SESSION['de'] = 'de.jpg';
                  echo "<img class='img-circle profile_img' height=120 width=120 src='image/".$_SESSION['de']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['admin']; 
                }
                ?>
            </div><br><br>

 
 
  
  <div class="h"><a href="index.php">Home</a></div>
  <div class="h"><a href="user login.php">Login</a></div>
  <div class="h"><a href="profile.php">Profile</a></div>

 
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
  document.body.style.backgroundColor = "skyblue";
}
</script>
</section>
   

   <div class="container">
     <form action="" method="POST">
       <h1>Give Us Your Feedback</h1>
       <div class="ID">
         <input  class="from-controll" name="Username" type="text" placeholder="Username">
         <i class="far fa-user"></i>
       </div>
        <br>
         <textarea class="form-control" type="text" name="Comment"cols=" 15" rows="5" placeholder="Comment"></textarea>
         <br>
         <input class="btn btn-default" type="submit" name="submit" value="Submit" style="width: 100px; height: 40px; font-size:18px; border-radius: 30px; color:black; border-color:black;">		
     </form>
    
     <div class="ID" style="color:black; font-size:20px;">
     <div class="scroll">
         <?php
     if(isset($_POST['submit']))
			{
				$sql="INSERT INTO `feedback` VALUES('', 'Admin', '$_POST[comment]');";
				if(mysqli_query($db,$sql))
				{
					$q="SELECT * FROM `feedback`";
					$res=mysqli_query($db,$q);

				echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res)) 
					{
						echo "<tr>";
							echo "<td>"; echo $row['Username']; echo "</td>";
							echo "<td>"; echo $row['Comment']; echo "</td>";
						echo "</tr>";
					}
				echo "</table>";
				}

			}

			else
			{
				$q="SELECT * FROM `feedback`";
					$res=mysqli_query($db,$q);

				echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res)) 
					{
						echo "<tr>";
							echo "<td>"; echo $row['Username']; echo "</td>";
							echo "<td>"; echo $row['Comment']; echo "</td>";
						echo "</tr>";
					}
				echo "</table>";
			}
		?>
	</div>
   </div>
 </body>
</html>