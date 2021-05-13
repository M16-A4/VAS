<html>
<head>
	<title>ADD ADMIN</title>
	<link rel="stylesheet" type="text/css" href="adergstyle.css"></head>
<body>
	<div class="regform"><h1>Add Admin</h1></div>
	<div class="main">
		<form class="admin-signup" action="/src/admin/back_end/newAdmin.php" method="POST">
			<div id="ID">
				<h2 class="name">Password</h2>
				<input class="Name" type="text" name="pswd">
			</div>

			<h2 class="name">First Name</h2>
			<input class="Name" type="text" name="First Name">

			<h2 class="name">Last Name</h2>
			<input class="Name" type="text" name="Last Name">

			<h2 class="name">Email</h2>
			<input class="age" type="text" name="email">


			<button type="submit" name="admin-signup">Register</button>
		</form>
	</div>


</body>
</html>
