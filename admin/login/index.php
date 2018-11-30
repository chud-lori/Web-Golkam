<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
include('login.php'); // Memasuk-kan skrip Login 
// Start session
session_start();
echo ($_SESSION['login_admin']);
if(isset($_SESSION['login_admin'])){
    header("location: ../");
}
?>

<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Golkam</title>

	<!-- Styles -->
	<link rel="stylesheet" href="../app.css">
</head>

<body>
	<div id="app">
		<nav class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">

					<!-- Collapsed Hamburger -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse"
					 aria-expanded="false">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<!-- Branding Image -->
					<a class="navbar-brand" href="/golkam">
						Golkam
					</a>
				</div>

				<div class="collapse navbar-collapse" id="app-navbar-collapse">
					<!-- Left Side Of Navbar -->
					<ul class="nav navbar-nav">
						&nbsp;
					</ul>
				</div>
			</div>
		</nav>

		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading">Login</div>

						<div class="panel-body">
							<form class="form-horizontal" action="" method="post"">

								<div class=" form-group">
									<label for="username" class="col-md-4 control-label">Username</label>

								<div class="col-md-6">
									<input id="email" type="username" class="form-control" name="username" required autofocus>
								</div>
						</div>

						<div class="form-group">
							<label for="password" class="col-md-4 control-label">Password</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control" name="password" required>

							</div>
						</div>

						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<input type="submit" class="btn btn-primary" name="submit" id="submit" value="Login">
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	</div>

	<!-- Scripts -->
	<script src="../app.js"></script>
</body>

</html>