<?php

if(!isset($_POST['child-signup'])){
	header("Location: ../childReg.php");
	exit();
}
else{
	require '../import/dbh.conn.php';

	//Name in Caps
	$par_fname = $_POST['ParentFirstName'];
	$par_lname = $_POST['ParentLastName'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$zipCode = $_POST['zipcode'];
	$hospId = $_SESSION['hospId'];		//To add in child table db(vasys)
	$hospChildId = $_POST['hospChildId'];

	$childInfo = array("email"=>$email, "pswd"=>$email, "par_fname"=>$par_fname, "par_lname"=>$par_lname, "dob"=>$dob, "gender"=>$gender, "zipCode"=>$zipCode, "hospId"=>$hospID, "hospChildId"=>$hospChildId);

	foreach($childInfo as $key => $ele){
		if(empty($childInfo[$key])){
			header("Location: ../childReg.php?error=emptyFields");
			exit();
		}
	}

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../childReg.php?error=invalidemail");
		exit();
	}

	else if(!(preg_match("/^[A-Z]*$/",$par_fname) && preg_match("/^[A-Z]*$/",$par_lname) )){
		header("Location: ../childReg.php?error=invalidnames");
		exit();
	}

	else if(!preg_match("/^[0-9]*$/",$hospId)){
		header("Location: ../childReg.php?error=invalidhospId");
		exit();
	}

	else if(!preg_match("/^[0-9]*$/",$hospChildId)){
		header("Location: ../childReg.php?error=invalidhospChildId");
		exit();
	}

	$sql = "SELECT id FROM Child WHERE hospitalId = ? AND hospitalChildId = ?";
	$stmt = $conn -> stmt_init();

	if (!($stmt -> prepare($sql))){
		header("Location: ../childReg.php?error=sqlerror");
		exit();
	}

	else{
		$stmt -> bind_param("ii", $hospId, $hospChildId);
		$stmt -> execute();
		$stmt -> store_result();

		if(stmt -> num_rows>0){
			header("Location: ../childReg.php?error=childIdAlreadyExists");
			exit();
		}

		$sql = "INSERT INTO Child (email, pswd, par_firstname, par_lastname, gender, zipcode, hospitalId, hospitalChildId) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $conn -> stmt_init();

		if (!($stmt -> prepare($sql))){
			header("Location: ../childReg.php?error=sqlerror");
			exit();
		}

		//hashing password
		$pswdHashed = password_hash($email, PASSWORD_DEFAULT);


		//email is the current password until updated by user
		$stmt -> bind_param("sssssiii", $email, $pswdHashed, $par_fname, $par_lname, $gender, $zipcode, $hospId, $hospChildId);
		$stmt -> execute();
		header("Location: ../childReg.php?signup=success");
		exit();
	}
	$stmt -> close();
	$conn -> close();
}
