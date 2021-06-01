@extends('layouts.frontend.app')

@section('title')
    Lippo Managenet- Homepage
@endsection

@section('content')
    <div id="search">
        <div class="container-fluid">
            <div class="row justify-content-center py-4">
                <h2 class="text-center"><strong>Cari Tennant</strong></h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <form action="{{ route('search') }}" method="GET">
                        @csrf
                        <div class="row justify-content-center">
                            @if(session('search'))
                                <div class="alert alert-danger mt-3" id="alert" roles="alert">
                                    {{ session('search') }}
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>tanggal awal</label>
                                <input type="date" name="tglawal" placeholder="tgl awal" class="form-control">
                            </div>
                             <div class="form-group col-md-3">
                                <label>tanggal akhir</label>
                                <input type="date" name="tglakhir" placeholder="tgl awal" class="form-control">
                            </div>
                             <div class="form-group col-md-2">
                                <label>Kategori </label>
                                <select class="form-control">
                                    <option>Outdoor</option>
                                </select>
                            </div>
                             <div class="form-group col-md-2">
                                <label>Lantai</label>
                                <select class="form-control">
                                    <option>Lantai UG</option>
                                </select>
                            </div>
                         
                            <div class="form-group col-md-2">
                               <label></label>
                               <input type="submit" name="cari" class="form-control btn btn-info" value="Cari">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="content">
       <div class="container">
      <div class="product-easy">
    <div class="container">
        
        <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
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
                    <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Latest Designs</span></li> 
                    <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Special Offers</span></li> 
                    <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Collections</span></li> 
                </ul>                    
                <div class="resp-tabs-container">
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                        <div class="col-md-3 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="images/a1.png" alt="" class="pro-image-front">
                                    <img src="images/a1.png" alt="" class="pro-image-back">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="single.html" class="link-product-add-cart">Quick View</a>
                                            </div>
                                        </div>
                                   
                                        
                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="single.html">Air Tshirt Black</a></h4>
                                    <div class="info-product-price">
                                        <span class="item_price">$45.99</span>
                                        <del>$69.71</del>
                                    </div>
                                    <a href="#" class="item_add single-item hvr-outline-out button2">Detail</a>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="images/a8.png" alt="" class="pro-image-front">
                                    <img src="images/a8.png" alt="" class="pro-image-back">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="single.html" class="link-product-add-cart">Quick View</a>
                                            </div>
                                        </div>
                                        <span class="product-new-top">1+1 Offer</span>
                                        
                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="single.html">Next Blue Blazer</a></h4>
                                    <div class="info-product-price">
                                        <span class="item_price">$99.99</span>
                                        <del>$109.71</del>
                                    </div>
                                    <a href="#" class="item_add single-item hvr-outline-out button2">Detail</a>                                    
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-md-3 product-men yes-marg">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="images/w4.png" alt="" class="pro-image-front">
                                    <img src="images/w4.png" alt="" class="pro-image-back">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="single.html" class="link-product-add-cart">Quick View</a>
                                            </div>
                                        </div>
                                   
                                        
                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="single.html">Air Tshirt Black Domyos</a></h4>
                                    <div class="info-product-price">
                                        <span class="item_price">$45.99</span>
                                        <del>$69.71</del>
                                    </div>
                                    <a href="#" class="item_add single-item hvr-outline-out button2">Detail</a>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 product-men yes-marg">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="images/w3.png" alt="" class="pro-image-front">
                                    <img src="images/w3.png" alt="" class="pro-image-back">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="single.html" class="link-product-add-cart">Quick View</a>
                                            </div>
                                        </div>
                                   
                                        
                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="single.html">Hand Bags</a></h4>
                                    <div class="info-product-price">
                                        <span class="item_price">$45.99</span>
                                        <del>$69.71</del>
                                    </div>
                                    <a href="#" class="item_add single-item hvr-outline-out button2">Detail</a>                                    
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>        
                    </div>  
                </div>  
            </div>
        </div>
    </div>
</div>

       </div>
    </div>



    

   


@endsection
