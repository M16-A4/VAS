<?php
require '../../import/dbh.conn.php';

if(!isset($_POST['admin-signup']))
{
  header("Location: http://valsys.com/src/admin/regist_admin/adminreg.php?error=enterDetails");
	exit();
}

$pswd = $_POST['pswd'];
$fname = $_POST['First Name'];
$lname = $_POST['Last Name'];
$email = $_POST['email'];

if(empty($pswd) || empty($fname) || empty($lname) || empty($email)){
  header("Location: http://valsys.com/src/admin/regist_admin/adminreg.php?error=emptycredentials");
	exit();
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  header("Location: http://valsys.com/src/admin/regist_admin/adminreg.php?error=invalidemail");
	exit();
}
else if(!preg_match("/^[A-Z]*$/", $fname)){
  header("Location: http://valsys.com/src/admin/regist_admin/adminreg.php?error=usecapitalletters");
	exit();
}
else if(!preg_match("/^[A-Z]*$/", $lname)){
  header("Location: http://valsys.com/src/admin/regist_admin/adminreg.php?error=usecapitalletters");
	exit();
}
else {
  $sql = "SELECT * FROM Admin WHERE email = ?";

  $stmt = $conn->stmt_init();

  if(!($stmt->prepare($sql)))
  {
    header("Location: http://valsys.com/src/admin/regist_admin/adminreg.php?error=sqlerror");
  	exit();
  }
  else {
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows() > 0){
      header("Location: http://valsys.com/src/admin/regist_admin/adminreg.php?error=useexists");
    	exit();
    }
    else {
      $stmt->close();
      $conn->close();

      $conn = new mysqli($servername,$username,$password,$db);
      if($conn->connect_error){
      	die("connection Failed: ".$conn->connect_error);
      }

      $sql = "INSERT INTO Admin (email, pswd, firstname, lastname) VALUES (?,?,?,?)";
      $stmt = $conn->stmt_init();

      if(!($stmt->prepare($sql)))
      {
        header("Location: http://valsys.com/src/admin/regist_admin/adminreg.php?error=sqlerror");
      	exit();
      }
      else {

        $hashedpswd = password_hash($pswd, PASSWORD_DEFAULT);
        $stmt->bind_param("ssss",$email,$pswd,$fname,$lname);
        $stmt->execute();
        header("Location: http://valsys.com/src/admin/front_end/home_page/admin.php?signup=success");
      	exit();
      }
      $stmt->close();
      $conn->close();
    }
  }

}
