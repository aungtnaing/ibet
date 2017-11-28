<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><h4 style="color:#3fe265;">SHWE BET</h4></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
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
            <!-- /.navbar-top-links -->

   
            <!-- /.navbar-static-side -->
        </nav>