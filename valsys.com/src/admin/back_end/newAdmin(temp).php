<?php

if(!isset($_POST['admin-signup'])){
	header("Location: ../childReg.php");
	exit();
}
else{
	require 'dbh.conn.php';

	//Name in Caps
	$firstname = $_POST['First Name'];
	$lastname = $_POST['Last Name'];
	$email = $_POST['email'];
	$pswd = $_POST['pswd'];

	$adminInfo = array("email"=>$email, "pswd"=>$email, "firstname"=>$firstname, "lastname"=>$lastname);

	foreach($adminInfo as $key => $ele){
		if(empty($adminInfo[$key])){
			header("Location: http://valsys.com/src/admin/regist_admin/adminreg.php?error=emptyFields");
			exit();
		}
	}

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: http://valsys.com/src/admin/regist_admin/adminreg.php?error=invalidemail");
		exit();
	}

	else if(!(preg_match("/^[A-Z]*$/",$firstname) && preg_match("/^[A-Z]*$/",$lastname) )){
		header("Location: http://valsys.com/src/admin/regist_admin/adminreg.php?error=invalidnames");
		exit();
	}

	$sql = "SELECT id FROM Admin WHERE email = ?";
	$stmt = $conn -> stmt_init();

	if (!($stmt -> prepare($sql))){
		header("Location: http://valsys.com/src/admin/regist_admin/adminreg.php?error=sqlerror");
		exit();
	}

	else{
		$stmt -> bind_param("s", $email);
		$stmt -> execute();
		$stmt -> store_result();

		if(stmt -> num_rows>0){
			header("Location: http://valsys.com/src/admin/regist_admin/adminreg.php?error=childIdAlreadyExists");
			exit();
		}

		$sql = "INSERT INTO admin (email, pswd, firstname, lastname) VALUES (?, ?, ?, ?)";
		$stmt = $conn -> stmt_init();

		if (!($stmt -> prepare($sql))){
			header("Location: http://valsys.com/src/admin/regist_admin/adminreg.php?error=sqlerror");
			exit();
		}

		//hashing password
		$pswdHashed = password_hash($pswd, PASSWORD_DEFAULT);


		//email is the current password until updated by user
		$stmt -> bind_param("ssss", $email, $pswdHashed, $firstname, $lastname);
		$stmt -> execute();
		header("Location: http://valsys.com/src/admin/front_end/home_page/admin.php?signup=success");
		exit();
	}
	$stmt -> close();
	$conn -> close();
}
