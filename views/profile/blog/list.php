
    <?php
        // Get user data
        $idUser = $_SESSION['iduser'];

        // Get content of user
        $query = "select * from contents where id_user = '$idUser'";
        $res = mysqli_query($con, $query);
        if (mysqli_num_rows($res) == 0) {
            include 'nopost.html';
        }
    ?>
    <?php
            session_start();
            if(!empty($_SESSION['postStore'])) {
                $message = $_SESSION['postStore'];
                echo "<h1>$message</h1>";
                unset($_SESSION['postStore']);
            }
        ?>
    	<?php
            session_start();
            if(!empty($_SESSION['update'])) {
                $message = $_SESSION['update'];
                echo "<h1>$message</h1>";
                unset($_SESSION['update']);
            }
        ?>
        <?php
            session_start();
            if(!empty($_SESSION['delete'])) {
                $message = $_SESSION['delete'];
                echo "<h1>$message</h1>";
                unset($_SESSION['delete']);
            }
        ?>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Data Table</h3>
            <p class="text-muted m-b-30">Data table example</p>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Review</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        // Show data
                        while ($data = mysqli_fetch_array($res)) {
                        ?>
                        <tr>
                            <td><a href="../../blog/article.php?id=<?php echo $data['id_content']; ?>"><?php echo htmlentities($data['title']); ?></a></td>
                            <td><?php echo substr($data['body'], 0, 8). '...'; ?></td>
                            <td><a href="edit.php?id=<?php echo $data['id_content']; ?>">Edit</a></td>
                            <td><a href="delete.php?id=<?php echo $data['id_content']; ?>" onclick="return confirm('Tenane?')">Delete</a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<!-- Data table -->
    <link href="/golkam/assets/profile/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <script src="/golkam/assets/profile/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
        <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
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