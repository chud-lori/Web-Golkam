<?php
// Start session
session_start();

if(isset($_SESSION['login_admin'])) {

?>
<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Golkam</title>

	<!-- Styles -->
	<link rel="stylesheet" href="app.css">
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

					<!-- Right Side Of Navbar -->
					<ul class="nav navbar-nav navbar-right">
						<!-- Authentication Links -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
								<?php echo $_SESSION['name_admin']; ?> <span class="caret"></span>
							</a>

							<ul class="dropdown-menu">
								<li>
									<a href="logout.php">
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading">Dashboard</div>

						<div class="panel-body">

							<ul>
								<li>
									<a href="addlesson.php">Add Lesson</a>


								</li>
								<li>
									<a href="listlesson.php">List Lesson</a>
								</li>
								<li>
									<a href="listmember.php">List Members</a>
								</li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Scripts -->
	<script src="app.js"></script>
</body>

</html>
<?php
}
else{
	header("location: login");
}
?>