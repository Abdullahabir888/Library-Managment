<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>
  </title>

  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>

<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand active">E-LIFE LEARNER</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="index.php">HOME</a></li>
        <li><a href="books.php">BOOKS</a></li>
        <li><a href="feedback.php">FEEDBACK</a></li>
      </ul>
      <?php
      if (isset($_SESSION['admin'])) { ?>
        <ul class="nav navbar-nav">

          <li><a href="profile.php">PROFILE</a></li>

          <li><a href="user.php">
              User-INFORMATION
            </a></li>
          <li><a href="fines.php">FINES</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="profile.php">
              <div style="color: transperent">

                <?php
                echo "<img class='img-circle profile_img' height=30 width=30 src='image/" . $_SESSION['de'] . "'>";

                echo " " . $_SESSION['admin'];
                $_SESSION['de'] = 'de.jpg';
                ?>
              </div>
            </a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>

        </ul>
      <?php
      } else {   ?>
        <ul class="nav navbar-nav navbar-right">

          <li><a href="admin login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>

          <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
        </ul>
      <?php
      }

      ?>

    </div>
  </nav>



</body>

</html>
