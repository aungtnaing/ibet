<!DOCTYPE html>
<html>
<head>
	@include('includes.head')  
</head>
<body>
	<div id="wrapper">
		@include('includes.headerblank') 
        

		@yield('content')

		
	</div>

 
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,
      xfbml      : true,
      version    : '{latest-api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

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

    

    <!-- DataTables JavaScript -->
    <script src="<?php echo url(); ?>/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo url(); ?>/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo url(); ?>/vendor/datatables-responsive/dataTables.responsive.js"></script>

      <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>
</html>