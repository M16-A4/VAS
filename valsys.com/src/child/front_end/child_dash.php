<?php
session_start();
if(!isset($_SESSION['child-id']))
{
  header("Location: http://valsys.com/login/child_login/child.php");
	exit();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
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
                <li>
                    <a href="http://valsys.com/src/import/logout.php">
                    <span class="icon"><i class="fa fa-sign-out" aria-hidden="true"></i></span>
                    <span class="title">Logout</span>
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
                    <h1>Child Dashboard</h1>
                    <small>Information about the child is given below</small>

                </div>

            </div>
            <div class="cards">
                <div class="card-single">
                    <div class="cards-flex">
                        <div class="card-info">
                            <div class="card-head">
                              <?php
                                require '../../import/dbh.conn.php';

                                $sql = "SELECT * FROM VacStatus WHERE child_id = ?";
                                $stmt = $conn -> stmt_init();

                                if (!($stmt -> prepare($sql))){
                                  //header("Location: http://valsys.com/login/child_login/child.php?error=sqlerror");
                                  echo "sql Error";
                                  exit();
                                }
                              ?>
                              <table border='1' class="table table-dark">
                              <tr>
                              <th>id</th>
                              <th>Child_id</th>
                              <th>Vaccine_id</th>
                              <th>Vaccine_name</th>
                              <th>Received Date</th>
                              <th>Last Dose</th>
                              </tr>

                              <?php
                                $stmt -> bind_param("i", $_SESSION['child-id']);
                                $stmt -> execute();
                                $result = $stmt -> get_result();

                                if($result<=0)
                                {
                                  echo "no data. Data error";
                                  exit();
                                }
                                while($row = $result->fetch_assoc()){
                              ?>

                              <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["child_id"]; ?></td>
                                <td><?php echo $row["vaccine_id"]; ?></td>
                                <td><?php echo $row["vaccine_name"]; ?></td>
                                <td><?php echo $row["rcvd_date"]; ?></td>
                                <td><?php echo $row["lastDose"]; ?></td>
                              </tr>

                              <?php
                                }
                              ?>
                            </table>
                            </div>

                        </div>
                        <div class="card-chart">

                        </div>
                    </div>
                </div>


            </div>










        </main>


    </div>

    <div class="button">
            <a href="http://valsys.com/src/vaccine/list.php" class="btn">ALL VACCINE</a>
          </div>

</body>
</html>
