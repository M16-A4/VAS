<?php

session_start();

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

    <title>ADMIN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="adminstyle.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <a>
                <li>
                    <a href="#">
                    <div class="logo">
                    <img src="vaslogo.png">
                    </div>
                </a>
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
                    <span class="title">Log Out</span>
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
                <input type="search" placeholder="Search here">

            </div>
            <div>
                <span class="ti-bell"></span>
                <span class="ti-comment"></span>
                <div></div>
            </div>
        </header
>
        <div class="button">
            <a href="http://valsys.com/src/admin/front_end/vaccinelist.php" class="btn">VACCINES</a>
            <a href="http://valsys.com/src/admin/front_end/hosplist.php" class="btn">HOSPITALS</a>
            <a href="http://valsys.com/src/admin/regist_admin/adminreg.php" class="btn">ADMIN</a>
        </div>
</body>
</html>
