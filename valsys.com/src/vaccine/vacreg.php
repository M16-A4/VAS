<?php

session_start();

if(!isset($_SESSION['admin-id']))
{
  header("Location: http://valsys.com/login/admin_login/admin.php");
	exit();
}
?>

<html>
<head>
	<title>ADD VACCINE</title>
	<link rel="stylesheet" type="text/css" href="regstyle.css">
</head>
<body>
	<div class="regform"><h1>Add Vaccine</h1></div>
	<div class="main">
		<form action="http://valsys.com/src/vaccine/backend/register.php" method="POST">
			<div id="ID">
			<h2 class="name">Vaccine Name</h2>
			<input class="Name" type="text" name="vaccname">
			</div>

			<h2 class="name">Dose Number</h2>
			<input class="age" type="text" name="dosenum">

			<h2 class="name">Age of Recieve</h2>
			<input class="age" type="text" name="a-o-r">

			<button type="submit" name="vacc-reg">Register</button>
		</form>
	</div>


</body>
</html>
