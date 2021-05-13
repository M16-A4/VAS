<?php
include_once 'codes/dbh.conn.php';

$userInput = filter_input(INPUT_POST, 'input');
$pswd = filter_input(INPUT_POST, 'passwd');



//Checking validity of input
if (empty($userInput)){
	echo "Child Id should not be empty";
	//die();
}
elseif (empty($pswd)){
	echo "Password should not be empty";
	//die();
}
else{
	$_SESSION['login'] = $userInput;
	$_SESSION['pswd'] = $pswd;
}
