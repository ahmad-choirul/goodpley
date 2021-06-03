<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
    <!-- header -->
<!-- <div class="header">
    <div class="container">
        <ul>
            <li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Free and Fast Delivery</li>
            <li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Free shipping On all orders</li>
            <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">info@example.com</a></li>
        </ul>
    </div>
</div> -->
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
    <div class="container">
        <div class="col-md-3 header-left">
            <h1><a href="index.html"><img src="images/logo3.png"></a></h1>
        </div>
        <div class="col-md-6 header-middle">
            
        </div>
        <div class="col-md-3 header-right footer-bottom">
           
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //header-bot -->
<!-- banner -->
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
                    <li class="active menu__item menu__item--current"><a class="menu__link" href="">Home <span class="sr-only">(current)</span></a></li>
                    <li class=" menu__item"><a class="menu__link" href="{{ route('penyewa.create') }}">Register</a></li>
                    <li class=" menu__item"><a class="menu__link" href="">Login</a></li>
                     </ul>
                </div>
              </div>
            </nav>  
        </div>
        <div class="top_nav_right">
            <div class="cart box_1">
                        <a href="checkout.html">
                            <h3> <div class="total">
                                <i class="fa fa-users" aria-hidden="true">GOOD</i>
                              </div>
                                
                            </h3>
                        </a>
                        <p><a href="javascript:;" class="simpleCart_empty">PLEY</a></p>
                        
            </div>  
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //banner-top -->
<!-- banner -->
<div class="banner-grid">
    <div id="visual">
            <div class="slide-visual">
                <!-- Slide Image Area (1000 x 424) -->
                <ul class="slide-group">
                    <li><img class="img-responsive" src="images/ba1.jpg" alt="Dummy Image" /></li>
                    <li><img class="img-responsive" src="images/ba2.jpg" alt="Dummy Image" /></li>
         <!--            <li><img class="img-responsive" src="images/ba3.jpg" alt="Dummy Image" /></li> -->
                </ul>

                <!-- Slide Description Image Area (316 x 328) -->
                <div class="script-wrap">
                    <ul class="script-group">
                        <li><div class="inner-script"><img class="img-responsive" src="images/baa1.jpg" alt="Dummy Image" /></div></li>
                        <li><div class="inner-script"><img class="img-responsive" src="images/baa2.jpg" alt="Dummy Image" /></div></li>
                     <!--    <li><div class="inner-script"><img class="img-responsive" src="images/baa3.jpg" alt="Dummy Image" /></div></li> -->
                    </ul>
                    <div class="slide-controller">
                        <a href="#" class="btn-prev"><img src="images/btn_prev.png" alt="Prev Slide" /></a>
                        <a href="#" class="btn-play"><img src="images/btn_play.png" alt="Start Slide" /></a>
                        <a href="#" class="btn-pause"><img src="images/btn_pause.png" alt="Pause Slide" /></a>
                        <a href="#" class="btn-next"><img src="images/btn_next.png" alt="Next Slide" /></a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    <script type="text/javascript" src="js/pignose.layerslider.js"></script>
    <script type="text/javascript">
    //<![CDATA[
        $(window).load(function() {
            $('#visual').pignoseLayerSlider({
                play    : '.btn-play',
                pause   : '.btn-pause',
                next    : '.btn-next',
                prev    : '.btn-prev'
            });
        });
    //]]>
    </script>

</div>
<!-- //banner -->
<!-- content -->

<div class="new_arrivals">
    <div class="container">
        <h3><span>Good </span>News</h3>
            <div class="new_grids">
            <div class="col-md-4 new-gd-left">
                <img src="images/wed1.jpg" alt=" " />
                <div class="wed-brand simpleCart_shelfItem">
                  
                </div>
            </div>
            <div class="col-md-4 new-gd-middle">
                <br>
                <div class="new-levis">
                  <H2> <b>SHOW UP YOUR BUSSINESS</b></H2>
                </div>
                <div class="new-levis">
                    <h1 style="color: #FDA30E;">WITH A PERFECT PARTNER</H1>
                </div><br><br>
                <h3 style="text-align: center;">-G O O D P L E Y-</h3>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 new-gd-left">
                <img src="images/wed2.jpg" alt=" " />
                <div class="wed-brandtwo simpleCart_shelfItem">
                   
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //content -->

<!-- content-bottom -->


<div class="header-bot">
    <div class="container">

        <div class="row justify-content-center py-4">
            <h2 class="text-center"><strong>Cari Tennant</strong></h2>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <form action="" method="GET">


                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>tanggal awal</label>
                            <input type="date" name="tglawal" placeholder="tgl awal" value="<?php echo $cari['tglawal'] ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label>tanggal akhir</label>
                            <input type="date" name="tglakhir" placeholder="tgl Akhir" value="<?php echo $cari['tglakhir'] ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Kategori </label>
                            <select class="form-control m-bot15" name="id_kategori">
                            <option value="">Pilih kategori</option>
                            @foreach ($kategoris as $kategori)
                            <option value="<?php echo $kategori->id ?>"   <?php echo ( $kategori->id == $cari['id_kategori']) ? 'selected' : ''  ?>><?php echo $kategori->nama_kategori ?></option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Lantai</label>
                        <select class="form-control m-bot15" name="id_lantai">
                            <option value="">Pilih Lantai</option>
                            @foreach ($lantais as $lantai)
                            <option value="<?php echo $lantai->id ?>" <?php echo ( $cari['id_lantai'] == $lantai->id) ? 'selected' : '' ?> ><?php echo $lantai->nama_lantai ?></option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                     <label></label>
                     <input type="submit" class="form-control btn btn-info">
                 </div>
             </div>
         </form>
     </div>
 </div>

</div>
</div>
<!-- //header-bot -->
<!-- banner -->


<div class="product-easy">
    <div class="container">

        <script src="{{ URL::asset('js/easyResponsiveTabs.js') }}" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                                    type: 'default', //Types: default, vertical, accordion           
                                    width: 'auto', //auto or any width like 600px
                                    fit: true   // 100% fit in a container
                                });
            });

        </script>
        <div class="sap_tabs">
            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                <ul class="resp-tabs-list">
                    <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Terbaru</span></li> 
                </ul>                    
                <div class="resp-tabs-container">
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">

                      @foreach ($tennant as $post)
                      <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="{{ asset('storage/images/'.$post->gambar) }}" alt="" class="pro-image-front">
                                <img src="{{ asset('storage/images/'.$post->gambar) }}" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="single.html" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">{{ $post->harga }}</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="single.html">{{ $post->nama_tennant }}</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">{{ $post->nama_lantai }} {{ $post->nama_kategori }}</span><br>
                                    <span>{{ $post->lebar }}m X {{ $post->panjang }}m</span>
                                </div>
                                <a href="#" class="item_add single-item hvr-outline-out button2">Detail</a>                                    
                            </div>
                        </div>
                    </div>

                    @endforeach

                    
                    <div class="clearfix"></div>        
                </div>  
            </div>  
        </div>
    </div>
</div>
</div>
<!-- //product-nav -->


<!-- footer -->
<div class="footer">
<!--    <div class="container">
        <div class="col-md-3 footer-left">
            <h2><a href="index.html"><img src="images/logo3.png" alt="men-thumb-item" /></a></h2>
            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor
                sit amet, consectetur, adipisci velit, sed quia non 
                numquam eius modi tempora incidunt ut labore 
            et dolore magnam aliquam quaerat voluptatem.</p>
        </div>
        <div class="col-md-9 footer-right">
            <div class="col-sm-6 newsleft">
                <h3>SIGN UP FOR NEWSLETTER !</h3>
            </div>
            <div class="col-sm-6 newsright">
                <form>
                    <input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                    <input type="submit" value="Submit">
                </form>
            </div>
            <div class="clearfix"></div>
            <div class="sign-grds">
                <div class="col-md-4 sign-gd">
                    <h4>Information</h4>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="mens.html">Men's Wear</a></li>
                        <li><a href="womens.html">Women's Wear</a></li>
                        <li><a href="electronics.html">Electronics</a></li>
                        <li><a href="codes.html">Short Codes</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                
                <div class="col-md-4 sign-gd-two">
                    <h4>Store Information</h4>
                    <ul>
                        <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Address : 1234k Avenue, 4th block, <span>Newyork City.</span></li>
                        <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email : <a href="mailto:info@example.com">info@example.com</a></li>
                        <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Phone : +1234 567 567</li>
                    </ul>
                </div>
                <div class="col-md-4 sign-gd flickr-post">
                    <h4>Flickr Posts</h4>
                    <ul>
                        <li><a href="single.html"><img src="images/b15.jpg" alt=" " class="img-responsive" /></a></li>
                        <li><a href="single.html"><img src="images/b16.jpg" alt=" " class="img-responsive" /></a></li>
                        <li><a href="single.html"><img src="images/b17.jpg" alt=" " class="img-responsive" /></a></li>
                        <li><a href="single.html"><img src="images/b18.jpg" alt=" " class="img-responsive" /></a></li>
                        <li><a href="single.html"><img src="images/b15.jpg" alt=" " class="img-responsive" /></a></li>
                        <li><a href="single.html"><img src="images/b16.jpg" alt=" " class="img-responsive" /></a></li>
                        <li><a href="single.html"><img src="images/b17.jpg" alt=" " class="img-responsive" /></a></li>
                        <li><a href="single.html"><img src="images/b18.jpg" alt=" " class="img-responsive" /></a></li>
                        <li><a href="single.html"><img src="images/b15.jpg" alt=" " class="img-responsive" /></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div> -->
        <div class="clearfix"></div>
   

    </div>
</div>
<!-- //footer -->
<!-- login -->


<!-- //login -->
</body>
</html>
