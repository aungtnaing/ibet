<!DOCTYPE html>
<html>
<head>
	@include('includes.head')  
</head>
<body>
	<div id="wrapper">
		@include('includes.header') 
        <div id="page-wrapper">

		@yield('content')

		</div>

	</div>
	<script src="<?php echo url(); ?>/assets/js/excanvas.min.js"></script> 


	<script src="<?php echo url(); ?>/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo url(); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo url(); ?>/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo url(); ?>/vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo url(); ?>/vendor/morrisjs/morris.min.js"></script>
    <script src="<?php echo url(); ?>/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo url(); ?>/dist/js/sb-admin-2.js"></script>
</body>
</html>