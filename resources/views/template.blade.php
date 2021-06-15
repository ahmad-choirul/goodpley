<!DOCTYPE html>
<html>
<head>
    <title>GOODPLEY</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Smart Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
<!-- pignose css -->
<link href="{{ URL::asset('css/pignose.layerslider.css') }}" rel="stylesheet" type="text/css" media="all" />


<!-- //pignose css -->
<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.4.min.js') }}"></script>
<!-- //js -->
<!-- cart -->
<script src="{{ URL::asset('js/simpleCart.min.js') }}"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-3.1.1.min.js') }}"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<script src="{{ URL::asset('js/jquery.easing.min.js') }}"></script>
</head>
<body>
     <div class="header-bot">
    <div class="container">
        <div class="col-md-3 header-left">
            <h1><a href="index.html"><img src="images/logo3.png"></a></h1>
        </div>
        <div class="col-md-6 header-middle">

        </div>
        <div class="col-md-3 header-right footer-bottom">
                <?php 
                    echo "Today is " . date("Y/m/d")." ". date("h:i:sa");
                 ?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
 <div class="ban-top">
    <div class="container">
        <div class="top_nav_left">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav menu__list">
          <!--       <li class="active menu__item menu__item--current"><a class="menu__link" href="">Home <span class="sr-only">(current)</span></a></li> -->
                <?php
                 $level = auth()->user()->level;
                 if ($level=='1'): ?>
                    <li class=" menu__item"><a class="menu__link" href="{{ route('akun.index') }}">Data Akun</a></li>
                    <li class=" menu__item"><a class="menu__link" href="{{ route('lantai.index') }}">Data Lantai</a></li>
                    <li class=" menu__item"><a class="menu__link" href="{{ route('kategori.index') }}">Kategori</a></li>
                    <li class=" menu__item"><a class="menu__link" href="{{ route('tennant.index') }}">Outlet</a></li>
                    <li class=" menu__item"><a class="menu__link" href="{{ route('penyewa.index') }}">List Usaha</a></li>
                    <li class=" menu__item"><a class="menu__link" href="{{ route('advertise.index') }}">Advertise</a></li>
                    <li class=" menu__item"><a class="menu__link" href="{{ route('sewa_advertise.index') }}">Sewa Advertise</a></li>
                    <li class=" menu__item"><a class="menu__link" href="{{ route('tagihan.index') }}">Tagihan</a></li>
                    <li class=" menu__item"><a class="menu__link" href="{{ route('sewa.index') }}">Sewa</a></li>
                      <li class=" menu__item"><a class="menu__link" href="{{ route('komplain.index') }}">Komplain</a></li>

                    <?php elseif($level=='2'): ?>
                        <li class=" menu__item"><a class="menu__link" href="{{ route('penyewa.index') }}">List Usaha</a></li>

                        <li class=" menu__item"><a class="menu__link" href="{{ route('sewa.index') }}">Sewa Tempat</a></li>
                        <li class=" menu__item"><a class="menu__link" href="{{ route('tagihan.index') }}">Tagihan</a></li>
                        <li class=" menu__item"><a class="menu__link" href="{{ route('sewa_advertise.index') }}">Marcom</a></li>
                         <li class=" menu__item"><a class="menu__link" href="{{ route('komplain.index') }}">Komplain</a></li>

                    <?php endif ?>

                    

         
                    <li class=" menu__item"><a class="menu__link" href="{{ route('profile.show') }}"> {{ __('Profile') }}</a></li>

             



                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                      <li class=" menu__item"><a class="menu__link" href="{{ route('logout') }}"  onclick="event.preventDefault();
                    this.closest('form').submit();" > Logout</a></
<!-- 
                   <li > <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    this.closest('form').submit();" class=" menu__item">
              
                </a></li> -->
            </form>
     
        
    </ul>
</div>
</div>
</nav>  
</div>
<div class="top_nav_right">

<div class="clearfix"></div>
</div>
</div>
</div>
</div>
<div class="container">
    @yield('content');
</div>


