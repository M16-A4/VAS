<?php

session_start();

$email = $_POST['email'];
$name = $_POST['Hospitalname'];
$zipcode = $_POST['zipcode'];


if(empty($email)||empty($name)||empty($zipcode))
{
  header("Location: http://valsys.com/src/hospital/hosreg.php?error=emptyCredentials");
  exit();
}

require '../../import/dbh.conn.php';
$sql = "SELECT * FROM Hospital WHERE email = ?";
$stmt = $conn -> stmt_init();

if (!($stmt -> prepare($sql))){
  header("Location: http://valsys.com/src/hospital/hosreg.php?error=sqlerror");
  exit();
}

$stmt -> bind_param("s", $email);
$stmt -> execute();
$result = $stmt -> get_result();

$row = $result->fetch_assoc();

if($row) {
  header("Location: http://valsys.com/src/hospital/hosreg.php?error=vaccexists");
  exit();
}

$stmt->close();
$conn->close();

//-------------------------------------------------------------------------------------------
require '../../import/dbh.conn.php';

$pswdHashed = password_hash($email, PASSWORD_DEFAULT);

$sql = "INSERT INTO Hospital (pswd, name, email, zipcode) VALUES (?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $pswdHashed, $name, $email, $zipcode);

// set parameters and execute
if($stmt->execute())
{
  header("Location: http://valsys.com/src/hospital/hosreg.php?signup=success");
  exit();
}
else {
  header("Location: http://valsys.com/src/hospital/hosreg.php?signup=failed");
  exit();
}
