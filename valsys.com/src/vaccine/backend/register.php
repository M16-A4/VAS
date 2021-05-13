<?php

session_start();

$name = $_POST['vaccname'];
$num = $_POST['dosenum'];
$aoR = $_POST['a-o-r'];

if(empty($name)||empty($num)||empty($aoR))
{
  header("Location: http://valsys.com/src/vaccine/vacreg.php?error=emptyCredentials");
  exit();
}

require '../../import/dbh.conn.php';
$sql = "SELECT * FROM VaccineList WHERE name = ? AND DoseNum = ?";
$stmt = $conn -> stmt_init();

if (!($stmt -> prepare($sql))){
  header("Location: http://valsys.com/src/vaccine/vacreg.php?error=sqlerror");
  exit();
}

$stmt -> bind_param("si", $name, $num);
$stmt -> execute();
$result = $stmt -> get_result();

$row = $result->fetch_assoc();

if($row) {
  header("Location: http://valsys.com/src/vaccine/vacreg.php?error=vaccexists");
  exit();
}

$stmt->close();
$conn->close();

//-------------------------------------------------------------------------------------------
require '../../import/dbh.conn.php';
$sql = "INSERT INTO VaccineList (name, ageOfReceive, DoseNum) VALUES (?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", strval($name), $aoR, (int)$num);

// set parameters and execute
if($stmt->execute())
{
  header("Location: http://valsys.com/src/vaccine/vacreg.php?signup=success");
  exit();
}
else {
  header("Location: http://valsys.com/src/vaccine/vacreg.php?signup=failed");
  exit();
}

/*
if(!isset($_SESSION['admin-id']))
{
  header("Location: http://valsys.com/login/admin_login/admin.php");
	exit();
}
else if(!isset($_POST['vacc-reg']))
{
  header("Location: http://valsys.com/src/vaccine/vacreg.php?error=unauthorised");
	exit();
}
else{
	require '../../import/dbh.conn.php';

	//Name in Caps
//	$firstname = $_POST['ID'];
	$name = $_POST['Vaccine Name'];
	$num = $_POST['Dose Number'];
	$aoR = $_POST['Age of Recieve'];
  $lastDose = $_POST['lastDose'];
	$adminInfo = array("name"=>$name, "num "=>$num, "aoR"=>$aoR, "lastDose"=>$lastDose);

	foreach($adminInfo as $key => $ele){
		if(empty($adminInfo[$key])){
			header("Location: http://valsys.com/src/vacreg.php?error=emptyCredentials");
			exit();
		}
	}


	if(!preg_match("/^[0-9]*$/",$num) ){
		header("Location: http://valsys.com/src/vacreg.php?error=invalidnum");
		exit();
	}

  echo "Hello world"

	$sql = "SELECT id FROM VaccineList WHERE name = ? AND DoseNum = ?";
	$stmt = $conn -> stmt_init();

	if (!($stmt -> prepare($sql))){
		header("Location: http://valsys.com/src/vacreg.php?error=sqlerror");
		exit();
	}

	else{
		$stmt -> bind_param("si", $name, $num);
		$stmt -> execute();
		$stmt -> store_result();

		if(stmt -> num_rows>0){
			header("Location: http://valsys.com/src/vacreg.php?error=VaccineAlreadyExists");
			exit();
		}

		$sql = "INSERT INTO VaccineList ( name, ageOfReceive, DoseNum, lastDose) VALUES (?, ?, ?, ?)";
		$stmt = $conn -> stmt_init();

		if (!($stmt -> prepare($sql))){
			header("Location: http://valsys.com/src/vacreg.php?error=sqlerror");
			exit();
		}

    $last = 0;
    if(isset($lastDose))
    {
      $last = 1;
    }

		//email is the current password until updated by user
		$stmt -> bind_param("ssii", $name, $aoR, $num, $last);
		$stmt -> execute();
		header("Location: http://valsys.com/src/vacreg.php?signup=success");
		exit();
	}
	$stmt -> close();
	$conn -> close();
}
*/
