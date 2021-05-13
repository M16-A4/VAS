<?php

if(!isset($_POST['admin-login']))
{
  header("Location: http://valsys.com/login/admin_login/admin.php");
	exit();
}

require '../../import/dbh.conn.php';


$userInput = filter_input(INPUT_POST, 'input');
$pswd = filter_input(INPUT_POST, 'passwd');


//Checking validity of input
if (empty($userInput) || empty($pswd)){
  header("Location: http://valsys.com/login/admin_login/admin.php?error=emptyinput");
	exit();
}
else{

  $sql = "SELECT * FROM Admin WHERE email = ?";
	$stmt = $conn -> stmt_init();

	if (!($stmt -> prepare($sql))){
		header("Location: http://valsys.com/login/admin_login/admin.php?error=sqlerror");
		exit();
	}


  $stmt -> bind_param("s", $userInput);
  $stmt -> execute();
  $result = $stmt -> get_result();

  $row = $result->fetch_assoc();

  if(!($row)) {
    header("Location: http://valsys.com/login/admin_login/admin.php?error=nouser");
    exit();
  }

  $pswdCheck = password_verify($pswd,$row['pswd']);

  if($pswdCheck != true)
  {
    header("Location: http://valsys.com/login/admin_login/admin.php?error=wrongpswd");
    exit();
  }

  if($pswd == true)
  {
    $_SESSION['admin-id'] = $row['id'];
    $_SESSION['id'] = $row['id'];

    header("Location: http://valsys.com/src/admin/front_end/home_page/admin.php?login=success");
    exit();
  }


}
