<!DOCTYPE html>
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
                    <h1>Hospital Dashboard</h1>
                    <small>Check child Information for vaccination</small>
    <div class="regform"><center><h1>CHECK STATUS</h1></center></div>
	<div class="main">


        <form action="" method="POST">
            <h2 class="name">ID</h2>
            <input class="Name" type="id" name="id">

			<h2 class="name">Email</h2>
			<input class="Name" type="email" name="Email">



		<center><button type="submit">CHECK</button></center>
		</form>
	</div>
                </div>

            </div>



        </main>


    </div>



</body>
</html>
