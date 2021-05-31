<!DOCTYPE html>
<html>
<head>
    <title>GOODPLEY</title>
     <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
  
</head>
<body>
  <header>
    <div class="row">
        <div class="col-md-3"> <a class="logo" href="/"><img src="" alt="logo">GOODPLEY</a></div>
        <div class="col-md-7">
             <nav>
                <ul></ul>
                <ul class="nav__links">
                    <li><a href="{{ route('lantai.index') }}">Data Lantai</a></li>
                    <li><a href="{{ route('kategori.index') }}">Kategori</a></li>
                    <li><a href="{{ route('tennant.index') }}">Tennant</a></li>
                    <li><a href="{{ route('tennant.index') }}">Marcom</a></li>
                    
                    


                </ul>
            </nav>
        </div>
      <!--   <div class="col-md-2">
             <a class="cta" href="#">Contact</a>
            <p class="menu cta">Menu</p>
        </div> -->
    </div>
           
           
           
        </header>
        <div id="mobile__menu" class="overlay">
            <a class="close">&times;</a>
            <div class="overlay__content">
                <a href="#">Services</a>
                <a href="#">Projects</a>
                <a href="#">About</a>
            </div>
        </div>
        <script type="text/javascript" src="/js/mobile.js"></script>

<div class="container">
    @yield('content')
</div>
 
</body>
</html>