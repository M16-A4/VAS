<!DOCTYPE html>
<html lan="en" and dir="Itr">
<head>
    <meta charset="utf-8">
    <title>PARENT LOGIN</title>
    <link rel="stylesheet" href="childloginstyle.css">



</head>
<body>
	<div class="main">
			<div class="logo">
				<img src="vaslogo.png">
			</div>
<form class="box" action="/src/child/back_end/login.php" method="POST">

<h1>
    PARENT LOGIN
</h1>
<input type="text" name='input' placeholder="Enter Child ID" id="username">
<input type="password" name='passwd' placeholder="Enter Password" id="password">
<input type="submit" name="child-login" value="Login">


</form>


</body>



</html>
