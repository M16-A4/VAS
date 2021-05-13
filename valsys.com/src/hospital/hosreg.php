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
	<title>ADD HOSPITAL</title>
	<link rel="stylesheet" type="text/css" href="hosstyle.css">
</head>
<body>
	<div class="regform"><h1>Add Hospital</h1></div>
	<div class="main">
		<form action="http://valsys.com/src/hospital/backend/register.php" method="POST">
			<div id="ID">
				<h2 class="name">Hospital Name</h2>
				<input class="age" type="text" name="Hospitalname">
			</div>

			<h2 class="name">Zipcode</h2>
			<input class="age" type="text" name="zipcode">

			<h2 class="name">Email</h2>
			<input class="age" type="text" name="email">

			<button type="submit">Register</button>
		</form>
	</div>


</body>
</html>
