<?php
session_start();

require '../../import/dbh.conn.php';

if(!isset($_SESSION['admin-id']))
{
  header("Location: http://valsys.com/login/admin_login/admin.php");
	exit();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HOSPITAL LIST</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles1.css">

    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <a>
                <li>
                    <a href="#">
                    <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                    <span class="title">dashboard</span>
                </a>
                </li>

                <li>
                    <a href="#">
                    <span class="icon"><i class="fa fa-hospital-o" aria-hidden="true"></i></span>
                    <span class="title">hospital</span>
                </a>
                </li>

                <li>
                    <a href="#">
                    <span class="icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                    <span class="title">Help</span>
                </a>
                </li>

                <li>
                    <a href="#">
                    <span class="icon"><i class="fa fa-commenting" aria-hidden="true"></i></span>
                    <span class="title">Messages</span>
                </a>
                </li>

                <li>
                    <a href="#">
                    <span class="icon"><i class="fa fa-cog" aria-hidden="true"></i></span>
                    <span class="title">settings</span>
                </a>
                </li>
            </a>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <div class="menu-toggle">
                <label for="">
                    <span ><i class="fa fa-bars" aria-hidden="true"></i></span>
                </label>
            </div>
            <div>
                <span class="ti-search"></span>
                <input type="search" placeholder="Search">

            </div>

            <div>
                <span class="ti-bell"></span>
                <span class="ti-comment"></span>
                <div></div>
            </div>
        </header>

        <main>
            <div class="page-header">
                <div>
                    <h1>Admin Dashboard</h1>
                    <small>List of Hospitals</small>
    <div class="regform"><center><h1>CHECK STATUS</h1></center></div>
	<div class="main">


	</div>
                </div>

            </div>



        </main>

		<?php
    $sql = "SELECT * FROM Hospital";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
    ?>

      <table border='1' class="table table-dark">
      <tr>
      <th>id</th>
      <th>Name</th>
      <th>email</th>
      <th>Zip Code</th>
      <th>Date of Registration</th>
      </tr>

      <?php
      while($row = $result->fetch_assoc()) {
      ?>

    <tr>
      <td><?php echo $row["id"]; ?></td>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["email"]; ?></td>
      <td><?php echo $row["zipcode"]; ?></td>
      <td><?php echo $row["reg_date"]; ?></td>
    </tr>

  <?php
  }
  ?>
  </table>
   <?php
  }
  else{
      echo "No result found";
  }
  ?>


    </div>

     <div class="button">
            <a href="http://valsys.com/src/hospital/hosreg.php" class="btn">ADD HOSPITAL</a>

</body>
</html>
