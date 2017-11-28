<!DOCTYPE html>
<html>
<head>
	@include('includes.headhome')  
</head>
<body>
	
		@include('includes.headerhome') 
      

		@yield('content')

		
	
  <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; SHWEBET 2017</p>
      </div>
      <!-- /.container -->
    </footer>
     
  <script src="<?php echo url(); ?>/fulls/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo url(); ?>/fulls/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>