<?php
include "connection.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<title>edit profile</title>
	<style type="text/css">
		.form-control {
			width: 250px;
			height: 38px;
		}

		.form1 {
			margin: 0 540px;
		}

		label {
			color: black;
		}
	</style>
</head>

<body style="background-color: #D4D3DD; ">

	<h2 style="text-align: center;color: black;">Edit Information</h2>
	<?php

	$sql = "SELECT * FROM `admin` WHERE Username='$_SESSION[admin]'";
	$result = mysqli_query($db, $sql) or die(mysql_error());

	while ($row = mysqli_fetch_assoc($result)) {
		$First = $row['First'];
		$Last = $row['Last'];
		$Username = $row['Username'];
		$Email = $row['Email'];
		$Password = $row['Password'];
	}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: black;">Welcome,</span>
		<h4 style="color: black;"><?php echo $_SESSION['admin']; ?></h4>
	</div><br><br>

	<div class="form1">


		<label>
			<h4><b>First Name: </b></h4>
		</label>
		<input class="form-control" type="text" name="First" value="<?php echo $First; ?>">

		<label>
			<h4><b>Last Name</b></h4>
		</label>
		<input class="form-control" type="text" name="Last" value="<?php echo $Last; ?>">

		<label>
			<h4><b>Username</b></h4>
		</label>
		<input class="form-control" type="text" name="Username" value="<?php echo $Username; ?>">

		<label>
			<h4><b>Email</b></h4>
		</label>
		<input class="form-control" type="text" name="Email" value="<?php echo $Email; ?>">

		<label>
			<h4><b>Password</b></h4>
		</label>
		<input class="form-control" type="text" name="Password" value="<?php echo $Password; ?>">

		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button>
		</div>
		</form>
	</div>
	<?php

	if (isset($_POST['submit'])) {


		$First = $_POST['First'];
		$Last = $_POST['Last'];
		$Username = $_POST['Username'];
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];

		echo "<h4>Result:</h4>";
		echo $First . "<br>" . $Last . "<br>";
		echo "<hr>";


		$sql1 = "UPDATE `admin` SET  First='$First', Last='$Last', Username='$Username', Email='$Email', Password='$Password'   WHERE Username='" . $_SESSION['admin'] . "';";

		if (mysqli_query($db, $sql1)) {
	?>
			<script type="text/javascript">
				alert("Saved Successfully.");
				window.location = "profile.php";
			</script>
	<?php
		} else echo mysqli_error($db);
	}
	?>
</body>

</html>
