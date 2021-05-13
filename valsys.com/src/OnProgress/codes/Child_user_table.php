<?php
require'/src/import/dbh.conn.php';
//to be called after check_login for child class
//call inside <table>

//has to hash and salt pswd


// ? is placeholder. Going for prepared stmt method
$sql = "SELECT firstname, lastname, par_firstname, par_lastname, dob, gender, zipcode, reg_date FROM Child WHERE id =? AND pswd = ?;";
$stmt = $conn -> stmt_init();

if (!($stmt -> prepare($sql))){
	echo "SQL statement failed";
	die();
}


//binding parameters to placeholder

if( !( isset($_SESSION['login']) && isset($_SESSION['pswd']) ) )
{
	echo "Connection timed out.<br> <b>Log in again</b>";
}

$userInput = $_SESSION['login'];
$pswd = $_SESSION['pswd'];

$stmt -> bind_result("is",$userInput,$pswd);

$stmt -> execute();

$stmt -> bind_result($fname,$lname,$par_fname,$par_lname,$dob,$gender,$zipcode,$reg_date);

echo "<table border='1'>
<tr>
<th>Name</th>
<th>Parent Name</th>
<th>DateOfBirth</th>
<th>Sex</th>
</tr>";

while($stmt -> fetch()){
	echo "<tr>";
	echo "<td>" .$fname." ".$lname."</td>";
	echo "<td>" .$par_fname." ".$par_lname."</td>";
	echo "<td>" .$dob."</td>";
	echo "<td>" .$gender."</td>";
	echo "</tr>";
}

//free results
$stmt -> free_result();

//close stmt
$stmt -> close();

//terminate connection to database
$conn -> close();
