<?php
session_start();
if(!isset($_SESSION['user']))
	header('location:login.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Akademik</title>
	 <!-- DataTables CSS -->
    <link href="plugins/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="plugins/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
	
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<?php
			include('header.php');
		?>

            <div class="navbar-default sidebar" role="navigation">
				<?php
					include('menu.php');
				?>
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
 
            <div class="row">
                <div class="col-lg-12">
				<?php
					include('main.php');
				?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<!-- DataTables JavaScript -->
    <script src="plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="plugins/datatables-responsive/dataTables.responsive.js"></script>
	
    <!-- Metis Menu Plugin JavaScript -->
    <script src="metisMenu/metisMenu.min.js"></script>

	<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
			"lengthMenu":[2,10,25,50]
        });
    });
    </script>
	
    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
	<script src="js/jquery.chained.min.js"></script>
	<script>
		$('#prodi').chained('#jurusan');
	</script>
</body>

</html>
