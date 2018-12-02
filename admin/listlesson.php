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

		// content
        <?php
            session_start();
            if(!empty($_SESSION['deleteLesson'])) {
                $message = $_SESSION['deleteLesson'];
                echo "<h1>$message</h1>";
                unset($_SESSION['deleteLesson']);
            }
        ?>
    <?php
        session_start();
        if(!empty($_SESSION['lessonAdd'])) {
           $message = $_SESSION['lessonAdd'];
           echo "<h1>$message</h1>";
           unset($_SESSION['lessonAdd']);
        }
    ?>
        <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                          <th>ID</th>
            <th>Lesson Name</th>
            <th>Lesson Description</th>
            <th>Delete Lesson</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
            $query = "select * from lessons";
            $results = mysqli_query($con, $query);

            while ($data = mysqli_fetch_array($results)) {
                ?>
        <tr>
            <td>
                <?php echo $data['id_lesson'] ?>
            </td>
            <td>
                <?php echo $data['lesson_name'] ?>
            </td>
            <td>
                <?php echo substr($data['lesson_desc'], 0, 20). '...'; ?>
            </td>
            <td><a href="deletelesson.php?id=<?php echo $data['id_lesson']; ?>" onclick="return confirm('Tenane?')">Delete</a></td>
        </tr>
        <?php
            }

        ?>
        </tbody>
    </table>
               

        // end content

	</div>

	<!-- Scripts -->
     <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>

    <!-- Data table -->
    <link href="/golkam/assets/profile/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <script src="/golkam/assets/profile/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
	<script src="app.js"></script>
</body>

</html>
<?php
}
else{
	header("location: login");
}
?>