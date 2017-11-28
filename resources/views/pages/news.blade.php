<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SHWE | BET</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo url(); ?>/fulls/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo url(); ?>/fulls/css/full-slider.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
      <div class="container">
        <!-- <a class="navbar-brand" href="/home" style="color:#6f42c1;"><h1>STI MYANMAR UNIVERSITY</h1></a> -->
         <h1 id="logo">
                <a class="navbar-brand page-scroll" href="/home"><img alt="" class="ls-bg" src="<?php echo url(); ?>/images/logo.png"></a>
            </h1> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
               <li><a class="nav-link" href="{{ url('betitems') }}">betting</a></li>
               
               <li class="dropdown">
                    <a class="nav-link" class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><span style="">{{ Auth::user()->name }}</span> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ url('dashboarduserprofile') }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                 <li style="color: black;background-color: white;">{{ Auth::user()->balance }} ks <br> Bet {{ $currentbet }} ks</li>
             
              
           
           
          </ul>
        </div>
      </div>
    </nav>

    
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol> -->
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
        
          <div class="carousel-item active" style="background-image: url('1.jpg')">
          
          </div>
    
            <div class="carousel-item" style="background-image: url('2.jpg')">
         
          </div>

           <div class="carousel-item" style="background-image: url('3.jpg')">
         
          </div>

           <div class="carousel-item" style="background-image: url('4.jpg')">
         
          </div>

          <!-- Slide Two - Seclass="btn btn-outline btn-primary" the background image for this slide in the line below -->
  
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <section class="py-5">
      <div class="container">
        <h1>SHWE BET မွ ႀကိဳဆိုပါ၏</h1>
        <p>welcome to my world.</p>
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; SHWEBET 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo url(); ?>/fulls/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo url(); ?>/fulls/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>