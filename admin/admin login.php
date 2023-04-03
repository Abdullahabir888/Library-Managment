<?php
include "navbar.php";
include 'connection.php';


?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>User login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name=""="viewport" content="width=device-width, inital-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="login.css">
</head>

<body>


  <header style="height: 0px; margin-left: 0px;">
    <div class="logo">
      <img src="image/20.png">


  </header>
  <section>
    <div class="gut_img">
      <br><br>
      <div class="buck1">
        <h1 style="text-align: center; font-size: 30px;font-family: 'Times New Roman', Times, serif;"><br>E-LIFE LEARNER</h1><br>
        <h1 style="text-align: center; font-size: 25px;font-family: 'Times New Roman', Times, serif;">Admin Login</h1><br>
        <form name="login" action="" method="POST">
          <br>
          <div class="login">
            <input type="text" name="Username" placeholder="Username" required=""> <br><br>
            <input type="password" name="Password" placeholder="Password" required> <br><br>
            <div class="center-align">
              <input class="btn btn-default" type="submit" name="submit" value="Login">
            </div>


        </form>
        <p style="text-align: center; color:black;">
          <br><br><br>
          <a style="color: blue; " href="update.php">Forgot Password</a><br><br>
          Don'thave account?&nbsp;<a style="text-align: center; color: #bf0fff; " href="registration.php"> Sign Up </a>
      </div>

    </div>

  </section>
  <?php

  if (isset($_POST['submit'])) {
    $count = 0;
    $res = mysqli_query($db, "SELECT * FROM `admin` WHERE Username='$_POST[Username]' && Password='$_POST[Password]';");

    $row = mysqli_fetch_assoc($res);
    $count = mysqli_num_rows($res);

    if ($count == 0) {
  ?>
      <!--
		  <script type="text/javascript">
			alert("The username and password doesn't match.");
		  </script>
		  -->
      <div class="alert alert-danger" style="width: 600px; margin-left: 370px; background-color: #de1313; color: white">
        <strong>The username and password doesn't match</strong>
      </div>
    <?php
    } else {
      $_SESSION['admin'] = $_POST['Username'];
      $_SESSION['de'] = $row['de'];

    ?>
      <script type="text/javascript">
        window.location = "profile.php"
      </script>
  <?php
    }
  }

  ?>
  <br><br><br><br><br>
  <br>
  <p style="color: #4A00E0; font-size:15px; font-family: Times New Roman;">
    <br>
    &nbsp; Copyright @Team Invinsible 2021-2024
  </p>
</body>

</html>
