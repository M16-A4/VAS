<?php

if(!isset($_POST['hospital-login']))
{
  header("Location: http://valsys.com/login/staff_login/staff.php");
	exit();
}

require '../../import/dbh.conn.php';


$userInput = filter_input(INPUT_POST, 'input');
$pswd = filter_input(INPUT_POST, 'passwd');


//Checking validity of input
if (empty($userInput) || empty($pswd)){
  header("Location: http://valsys.com/login/staff_login/staff.php?error=emptyinput");
	exit();
}
else{

  $sql = "SELECT * FROM Hospital WHERE email = ?";
	$stmt = $conn -> stmt_init();

	if (!($stmt -> prepare($sql))){
		header("Location: http://valsys.com/login/staff_login/staff.php?error=sqlerror");
		exit();
	}


  $stmt -> bind_param("s", $userInput);
  $stmt -> execute();
  $result = $stmt -> get_result();

  $row = $result->fetch_assoc();

  if(!($row)) {
    header("Location: http://valsys.com/login/staff_login/staff.php?error=nouser");
    exit();
  }

  $pswdCheck = password_verify($pswd,$row['pswd']);

  if($pswdCheck != true)
  {
    header("Location: http://valsys.com/login/staff_login/staff.php?error=wrongpswd");
    exit();
  }

  if($pswd == true)
  {
    $_SESSION['id'] = $row['id'];

    header("Location: http://valsys.com/src/hospital/front_end/hospital.php?login=success");
    exit();
  }


}
