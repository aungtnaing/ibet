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
         <h3 id="logo">
                <a class="navbar-brand page-scroll" href="/"><img alt="" src="<?php echo url(); ?>/images/logo.png"></a>
            </h3> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/home">login
                <span class="sr-only">(current)</span>
              </a>
            </li>
           <li class="nav-item active">
              <a class="nav-link" href="{{ url('/facebooklogin')}}">fb login
                <span class="sr-only">(current)</span>
              </a>
            </li>
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
          @for($i = 0; $i < count($bets); $i++)
         
         @if($i === 0)
          <div class="carousel-item active" style="background-image: url('{{ $bets[$i]->mainslide->photourl1 }}')">
            <div style="color: white; text-align: center; background-color: #a8a7ce66; padding-top: 50px;">

              <img src="{{ $bets[$i]->hometeam->photourl1 }}" style="width: 150px;height: 150px;">
              <b><p>{{ $bets[$i]->hometeam->name }}</p></b>
             
              <h3>Vs</h3>
              <b><p>{{ $bets[$i]->awayteam->name }}</p></b>
           
              <img src="{{ $bets[$i]->awayteam->photourl1 }}" style="width: 150px;height: 150px;">
              <p>{{ $bets[$i]->title }}</p>
              <h3>{{ $bets[$i]->name }}</h3>


                   
              <a href="{{ url('/betitemcreate', $bets[$i]->id) }}" class="btn btn-large btn-primary" style="width: 300px;">bet</a>
              <br>
              <a href="" class="btn btn-large btn-primary" style="width: 300px;">news</a>

            </div>
          </div>
          @else
            <div class="carousel-item" style="background-image: url('{{ $bets[$i]->mainslide->photourl1 }}')">
            <div style="color: white; text-align: center; background-color: #a8a7ce66; padding-top: 50px;"> 
              <img src="{{ $bets[$i]->hometeam->photourl1 }}" style="width: 150px;height: 150px;">
              <b><p>{{ $bets[$i]->hometeam->name }}</p></b>
             
              <h3>Vs</h3>
              <b><p>{{ $bets[$i]->awayteam->name }}</p></b>
              <img src="{{ $bets[$i]->awayteam->photourl1 }}" style="width: 150px;height: 150px;">
              <p>{{ $bets[$i]->title }}</p>
              <h3>{{ $bets[$i]->name }}</h3>

              
              <a href="{{ url('/betitemcreate', $bets[$i]->id) }}" class="btn btn-large btn-primary" style="width: 300px;">bet</a>
              <br>
             
              <a href="" class="btn btn-large btn-primary" style="width: 300px;">news</a>

           
              

            </div>
          </div>

          @endif
          @endfor
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
      <fb:login-button 
  scope="public_profile,email"
  onlogin="checkLoginState();">
</fb:login-button>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; SHWEBET 2017</p>
      </div>
      <!-- /.container -->
    </footer>


<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{1395950293865855}',
      cookie     : true,
      xfbml      : true,
      version    : '{v2.11}'
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



function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}
</script>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo url(); ?>/fulls/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo url(); ?>/fulls/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
