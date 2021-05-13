<?php

if(!isset($_POST['child-login']))
{
  header("Location: http://valsys.com/login/child_login/child.php");
	exit();
}

require '../../import/dbh.conn.php';


$userInput = filter_input(INPUT_POST, 'input');
$pswd = filter_input(INPUT_POST, 'passwd');


//Checking validity of input
if (empty($userInput) || empty($pswd)){
  header("Location: http://valsys.com/login/child_login/child.php?error=emptyinput");
	exit();
}
else{

  $sql = "SELECT * FROM Child WHERE id = ?";
	$stmt = $conn -> stmt_init();

	if (!($stmt -> prepare($sql))){
		header("Location: http://valsys.com/login/child_login/child.php?error=sqlerror");
		exit();
	}


  $stmt -> bind_param("i", $userInput);
  $stmt -> execute();
  $result = $stmt -> get_result();

  $row = $result->fetch_assoc();

  if(!($row)) {
    header("Location: http://valsys.com/login/child_login/child.php?error=nouser");
    exit();
  }

  $pswdCheck = password_verify($pswd,$row['pswd']);

  if($pswdCheck != true)
  {
    header("Location: http://valsys.com/login/child_login/child.php?error=wrongpswd");
    exit();
  }

  if($pswd == true)
  {
    $_SESSION['id'] = $row['id'];
    $_SESSION['child-id'] = $row['id'];

    header("Location: http://valsys.com/src/child/front_end/child_dash.php?login=success");
    exit();
  }


}
