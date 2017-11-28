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
          <ul class="navbar-nav ml-auto" style="font-size: 20px;">
              <li><a class="nav-link" href="{{ url('betitems') }}">last betting</a></li>
               
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
                 <li style="color: black;background-color: white;">Bet {{ $currentbet }} ks <br> Win +{{ $totalwin }} ks <br> Acc -{{ $totalacc }} ks <br> Lose-{{ $totallose }} ks <br> Total {{ $totalamount }} <br> Bal {{ Auth::user()->balance }} ks</li>
           
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