<?php
  include "connection.php";
  include "navbar.php";
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
			padding-left: 70%;

		}
		.form-control
		{
			width: 300px;
			height: 40px;
			background-color: transparent;
			color: black;
            font-size:17px;
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
	background-color: white;
}
.container
{
	height: 600px;
	background-color: transparent;
	opacity: .8;
	color: black;
}
.scroll
{
  width: 100%;
  height: 500px;
  overflow: auto;
}
th,td
{
  width: 10%;
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
  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"> <a href="issue.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
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
    
    <?php
      if(isset($_SESSION['admin']))
      {
        ?>

      <div style="float: left; padding: 25px;">
      <form method="post" action="">
          <button name="submit2" type="submit" class="btn btn-default" style="background-color: #96df26; color: yellow;">RETURNED</button> 
                      &nbsp&nbsp
          <button name="submit3" type="submit" class="btn btn-default" style="background-color: red; color: yellow;">EXPIRED</button>
      </form>
      </div>

          <div class="srch" >
          <br>
          <form method="post" action="" name="form1">
            <input type="text" name="Username" class="form-control" placeholder="Username" required=""><br>
            <input type="text" name="Books_Id" class="form-control" placeholder="Books Id" required=""><br>
            <button style="background-color: #ef629f; border-radius: 40px;" type="submit" name="submit1" class="btn btn-default">Submit
          </form>
        </div>
        <br><br>
        <?php

        if(isset($_POST['submit']))
        {

          $res=mysqli_query($db,"SELECT * FROM `issue` where Username='$_POST[Username]' and Books_Id='$_POST[Books_Id]' ;");
      
      while($row=mysqli_fetch_assoc($res))
      {
        $d= strtotime($row['return']);
        $c= strtotime(date("Y-m-d"));
        $diff= $c-$d;

        if($diff>=0)
        {
          $day= floor($diff/(60*60*24)); 
          $fine= $day*.10;
        }
      }
          $x= date("Y-m-d"); 
          mysqli_query($db,"INSERT INTO `fine` VALUES ('$_POST[Username]', '$_POST[Books_Id]', '$x', '$day', '$fine','not paid') ;");


          $var1='<p style="color:red; background-color:transparent;">RETURNED</p>';
          mysqli_query($db,"UPDATE issue SET Approve='$var1' where username='$_POST[Username]' and Books_Id='$_POST[Books_Id]' ");

          mysqli_query($db,"UPDATE books SET Quantity = Quantity+1 where Books_Id='$_POST[Books_Id]' ");
          
        }
      }
    
    $c=0;

      
         $ret='<p style="color:black; background-color:green;">RETURNED</p>';
         $exp='<p style="color:black; background-color:red;">EXPIRED</p>';
        
        if(isset($_POST['submit2']))
        {
          
        $sql="SELECT user.username,books.Books_Id,Name,Authors,Edition,Approve,Issue,issue.Return FROM user inner join issue ON user.Username=issue.Username inner join books ON issue.Books_Id=books.Books_Id WHERE issue.Approve ='$ret' ORDER BY `issue`.`Return` DESC";
        $res=mysqli_query($db,$sql);

        }
        else if(isset($_POST['submit3']))
        {
            $sql="SELECT user.username,books.Books_Id,Name,Authors,Edition,Approve,Issue,issue.Return FROM user inner join issue ON user.Username=issue.Username inner join books ON issue.Books_Id=books.Books_Id WHERE issue.Approve ='$ret' ORDER BY `issue`.`Return` DESC";
        $res=mysqli_query($db,$sql);
        }
        else
        {
            $sql="SELECT user.username,books.Books_Id,Name,Authors,Edition,Approve,Issue,issue.Return FROM user inner join issue ON user.Username=issue.Username inner join books ON issue.Books_Id=books.Books_Id WHERE issue.Approve ='$ret' ORDER BY `issue`.`Return` DESC";
        $res=mysqli_query($db,$sql);
        }

        echo "<table class='table table-bordered' style='width:100%;' >";
        //Table header
        
        echo "<tr style='background-color: #96df26;'>";
        echo "<th>"; echo "Username";  echo "</th>";
        echo "<th>"; echo "Books Id";  echo "</th>";
        echo "<th>"; echo "Book Name";  echo "</th>";
        echo "<th>"; echo "Authors Name";  echo "</th>";
        echo "<th>"; echo "Edition";  echo "</th>";
        echo "<th>"; echo "Status";  echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date";  echo "</th>";

      echo "</tr>"; 
      echo "</table>";

       echo "<div class='scroll'>";
        echo "<table class='table table-bordered' >";
      while($row=mysqli_fetch_assoc($res))
      {
        echo "<tr>";
          echo "<td>"; echo $row['Username']; echo "</td>";
          echo "<td>"; echo $row['Books_Id']; echo "</td>";
          echo "<td>"; echo $row['Name']; echo "</td>";
          echo "<td>"; echo $row['Authors']; echo "</td>";
          echo "<td>"; echo $row['Edition']; echo "</td>";
          echo "<td>"; echo $row['Approve']; echo "</td>";
          echo "<td>"; echo $row['Issue']; echo "</td>";
          echo "<td>"; echo $row['Return']; echo "</td>";
        echo "</tr>";
      }
    echo "</table>";
        echo "</div>";

    ?>
  </div>
</div>
</body>
</html>