<div>
    <style>
        :root{
    --fonts:'Poppins', sans-serif;
    --base-color:#ebb700;
    --secondary-color:#1d1d1d;
    --nav-color:#dadada;
}
        .pakage-head-div span{
            color:var(--base-color) !important;
            font-size:20px !important;
        }
        .pakage-head-div{
            height:100%;
            width:53%;
            display:flex;
            align-items:center;
            justify-content:center;
            padding-block:40px;
        }
        :root{
    --fonts:'Poppins', sans-serif;
    --base-color:#ebb700;
    --secondary-color:#1d1d1d;
    --nav-color:#dadada;
}
.package-level-pack{
    border:1px solid var(--nav-color);
    display: flex;
    color:white;
    background:var(--base-color);
    align-items:center;
    justify-content:center;
    padding-block:10px
}
.main-body-package{
    border-radius:0px;
    height:100%
}
.package-price{
    display:flex;
    align-items:center;
    justify-content:center;
}
.package-detail-bar2 p {
    font-size: 18px !important;
    margin-bottom: 4px !important;
}
.package-price h1{
    color:black;
}
.package-price span{
    color:#bdbdbd !important;
    font-weight:700
}
span{
    color:#bdbdbd !important;
    font-weight:700;
    font-size:12px
}
.pakage-head-div{
    height:100%;
    width:42.3%;
    display:flex;
    align-items:center;
    justify-content:center;
    padding-block:40px;
}
.package-price{
    padding-block:0px !important;
}
.package-detail-buy1 button:hover{
    display:flex;
    align-items:center;
    justify-content:center;
    width:100%;
    background:var(--base-color);
    padding-block:6px;
    color:white;
    border-radius:20px;
}
.package-detail-buy1 button{
    display:flex;
    align-items:center;
    background:white;
    justify-content:center;
    transition:0.4s all;
    width:100%;
    border:1px solid var(--base-color);
    padding-block:6px;
    color:var(--base-color);
    border-radius:20px;
}
.package-detail-bar{
    padding-block:20px;
    text-align:center;
}
.package-detail-bar2{
    border-top: 1px solid var(--nav-color);
    display: flex;
    align-items: center;
    justify-content: start;
    flex-direction: column;
    padding-block: 20px !important;
    height: 220px;
    text-align: center;
}
.package-detail-bar2 p{
    font-size:17px !important;
    margin-bottom:4px !important;
}
.package-detail-buy1{
    border-top: 1px solid var(--nav-color);
    padding-inline:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    padding-block:10px;
}
.package-detail-buy1 a:hover{
    display:flex;
    align-items:center;
    justify-content:center;
    width:100%;
    background:var(--base-color);
    padding-block:6px;
    color:white;
    border-radius:20px;
}
.package-detail-buy1 a{
    display:flex;
    align-items:center;
    background:white;
    justify-content:center;
    transition:0.4s all;
    width:100%;
    border:1px solid var(--base-color);
    padding-block:6px;
    color:var(--base-color);
    border-radius:20px;
}
.login-inputs{
    border:1px solid #f8fafc;
    border-radius:10px;
    padding-inline:15px !important;
    width:100%;
    background-color:white !important;
    height:45px !important;
    outline:none !important;
    transition:0.6s all;
    box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;
}
.login-inputs:focus{
    border:1px solid var(--base-color) !important;
}
    </style>
<div class="container-fluid banner-top p-0">
        <div class="your-class">
            <div class="banner-inner">
                <img width="100%" height="100%" src="./assets/images/banner/banner1.jpg">
            </div>
            <div class="banner-inner">
                <img width="100%" height="100%" src="./assets/images/banner/banner2.jpg">
            </div>
            <div class="banner-inner">
                <img width="100%" height="100%" src="./assets/images/banner/banner3.jpg">
            </div>
        </div>
    </div>

    <div class="container-fluid" id="marquee-margin">
        <div class="row">
            <div class="col-lg-2 col-md-2 nlrp">
                <div class="d-flex justify-content-between align-items-center update-21">
                    <div class="d-flex w-100 justify-content-center align-items-center bg-news py-2 text-news px-1 news">
                        <p class="m-0" style="font-size:18px;color:white">Invest Now!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-10 d-flex align-items-center nlrp">
                <div class="d-flex justify-content-between align-items-center breaking-news latest_updated_custom w-100">
                    <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();"
                        onmouseout="this.start();">
                        <a href="#">Make your future bright by investing with JIMTA GROUP INTERNATIONAL & Earn Up To 80% profit on your investment in 1.5 years.</a>
                        <span class="dot"></span>
                    </marquee>
                </div>
            </div>
        </div>
    </div>







    <div class="container-fluid">
        <div class="container d-flex align-items-center justify-content-center pt-5">
            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-center">
                <h1 class="section-heading">Jimta Coin Package</h1>
            </div>
        </div>
        <div class="container-fluid">
        <div class="container">
        <div class="row py-5">
                @foreach($investment as $key=>$i)
                <div class="col-lg-3 col-md-6 col-12 my-3">
                    <div class="main-body-package">
                        <div class="package-level-pack ">
                        {{$i->title}}
                        </div>
                        <div class="package-price">
                            <div style="justify-content:end" class="pakage-head-div">
                                <span>$</span> 
                            </div>
                            <div class="pakage-head-div">
                                <h1 class="text-dark">{{$i->price}}</h1> 
                            </div>
                            <div style="justify-content:start" class="pakage-head-div">
                            </div>
                        </div>
                        <div class="package-detail-bar2 px-2">
                            <p>{{$i->description}}</p>
                        </div>
                       <div class="package-detail-buy1">
                           <button>Read More</button>
                       </div>
                   </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>

    </div>






    <div class="banner-group my-5 py-5">
        <div class="container d-flex align-items-center justify-content-center">
            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-center">
                <h1 class="section-heading" style="color: white;">Jimta Services</h1>
            </div>
        </div>
        <div class="container pt-4">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-6 category-card">
                    <a style="text-decoration:none" href="/shop">
                    <div class="inner-card text-center">
                        <img height="40px" width="40px" src="https://img.icons8.com/windows/32/ffffff/store-front.png"/>
                        <h6 class="category-name">Shop From Our Store</h6>
                    </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 col-6 category-card">
                    <a style="text-decoration:none" href="/investment">
                        <div class="inner-card text-center">
                        <img height="40px" width="40px"  src="https://img.icons8.com/external-tulpahn-basic-outline-tulpahn/48/ffffff/external-investment-business-tulpahn-basic-outline-tulpahn.png"/>
                        <h6 class="category-name">Jimta Coin Package</h6>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 col-6 category-card">
                <a style="text-decoration:none" href="/realstate">
                    <div class="inner-card text-center">
                        <img height="40px" width="40px" src="https://img.icons8.com/ios/50/ffffff/sell-property--v1.png"/>
                        <h6 class="category-name">Real State</h6>
                    </div>
                </a>
                </div>
                <div class="col-lg-2 col-md-4 col-6 category-card">
                <a style="text-decoration:none" href="/training">
                    <div class="inner-card text-center">
                    <img height="40px" width="40px" src="https://img.icons8.com/external-wanicon-lineal-wanicon/64/ffffff/external-training-training-and-coaching-wanicon-lineal-wanicon.png"/>
                        <h6 class="category-name">Training</h6>
                    </div>
</a>
                </div>
                <div class="col-lg-2 col-md-4 col-6 category-card">
                <a style="text-decoration:none" href="/hotelreservation">
                    <div class="inner-card text-center">
                    <img src="https://img.icons8.com/external-those-icons-lineal-those-icons/48/ffffff/external-reservation-restaurant-those-icons-lineal-those-icons.png"/>
                        <h6 class="category-name">Hotel Reservation</h6>
                    </div>
</a>
                </div>
                <div class="col-lg-2 col-md-4 col-6 category-card">
                <a style="text-decoration:none" href="/transport">
                    <div class="inner-card text-center">
                        <img height="40px" width="40px" src="https://img.icons8.com/ios/50/ffffff/ground-transportation.png"/>
                        <h6 class="category-name">Transport</h6>
                    </div>
</a>
                </div>
            </div>
        </div>
    </div>




<!-- responsive product===================================================================== -->
    <div class="container-fluid pt-4 text-center py-5"  id="responsive-product-home">
        <div class="container d-flex align-items-center justify-content-center">
            <div class="col-lg-3 col-md-6 col-12 d-flex align-items-center justify-content-center">
                <h1 class="section-heading">Hot Product</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($product as $products)
                <div class="col-lg-4 col-md-6 col-6 product-card-responsive p-3">
                    <div class="responsive-product-main">
                        <div class="image-side-responsive">
                            <img class="img-fluid" src="{{asset('storage/'.$products->product_main_image)}}" alt="">
                        </div>
                        <div class="image-text-absolute-responsive">
                            <h6 class="text-dark "><a class="text-dark" href="{{route('product.detail',$products->id)}}" wire.click="mount($products->slug)">{{$products->title}}</a></h6>
                            <div class="mt-3">
                                <p class="m-0"><span class="re-pr-sp">$</span>{{$products->price}}</p>
                                <button  wire:click="addToCart({{$products->id}},1)" class="add-to-cart responsive-ad-cart-btn mt-2">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <a href="/shop" class="view-more">View More<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        </div>
    </div>
<!-- responsive product===================================================================== -->
<!-- large screen product===================================================================== -->
    <div class="container-fluid product-home pt-4 text-center py-5">
        <div class="container d-flex align-items-center justify-content-center">
            <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-center">
                <h1 class="section-heading">Hot Selling Product</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
            @foreach($product as $products)
                <div class="col-lg-4 col-md-6 col-12 product-card p-3">
                    <div class="image-side">
                        <img class="img-fluid" src="{{asset('storage/'.$products->product_main_image)}}" alt="">
                    </div>
                    <div class="image-text-absolute">
                    <h6><a class="text-dark" href="{{route('product.detail',$products->id)}}">{{$products->title}}</a></h6>
                            <p>${{$products->price}}</p>
                        <div class="d-flex">
                            <button class="b-1 add-to-cart" wire:click="addToCart({{$products->id}},1)">Add To Cart</button>
                            <button class="b-2" wire:click="addToCheckout({{$products->id}})">Buy Now</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <a href="/shop" class="view-more">View More<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        </div>
    </div>
    <script>
        $(document).on('click','.add-to-cart',function(){
            location.reload();
        });
    </script>
<!-- large screen product===================================================================== -->
























    



























<!-- responsive product===================================================================== -->
    <!-- <div class="responsive-slider-product container-fluid py-4" style="background: #eeeeec ;">
        <div class="container">
            <div class="container d-flex align-items-center justify-content-center">
                <div class="col-lg-3 col-md-6 col-12 text-center">
                    <h1 class="section-heading">Product</h1>
                </div>
            </div>
            <div class="simple-carasol2">
                @foreach($product as $products)
                <div class="col-lg-4 col-md-6 col-6 product-card-responsive p-3">
                    <div class="responsive-product-main">
                        <div class="image-side-responsive">
                            <img class="img-fluid" src="{{asset('storage/'.$products->product_main_image)}}" alt="">
                        </div>
                        <div class="image-text-absolute-responsive">
                        <h6><a href="{{route('product.detail',$products->slug)}}" wire.click="mount($products->slug)">{{$products->title}}</a></h6>
                            <p>{{$products->price}}</p>
                            <div class="d-flex">
                                <button class="b-1">Add To Cart</button>
                                <button class="b-2"><a href="{{route('add.to.checkout',$products->id)}}">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div> -->
<!-- responsive product===================================================================== -->








<!-- large screen product===================================================================== -->
<div class="slider-product container-fluid py-4" style="background: #eeeeec ;">
    <div class="container">
        <div class="container d-flex align-items-center justify-content-center">
            <div class="col-lg-3 col-md-6 col-12 d-flex align-items-center justify-content-center">
                <h1 class="section-heading">Product</h1>
            </div>
        </div>
        <div class="simple-carasol2">
        @foreach($product as $products)
            <div class="col-lg-4 col-md-6 col-12 product-card p-3">
                <div class="image-side">
                <img class="img-fluid" src="{{asset('storage/'.$products->product_main_image)}}" alt="">
                </div>
                <div class="image-text-absolute1">
                <h6><a href="{{route('product.detail',$products->id)}}">{{$products->title}}</a></h6>
                            <p>${{$products->price}}</p>
                    <div class="d-flex">
                        <button class="b-3">Add To Cart</button>
                        <button class="b-4">Buy Now</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- large screen product===================================================================== -->






















    <div class="container-fluid p-5 ">
        <div class="container d-flex align-items-center justify-content-center">
            <div class="col-lg-4 col-md-6 col-12 text-center">
                <h1 class="section-heading">From Our Shop</h1>
            </div>
        </div>
        <div class="container d-flex align-items-center justify-content-center flex-column">
            <div class="row">
                <div class="col-lg-6 col-12 p-3 pad-zr-x">
                            <video width="100%" height="280" controls>
                                <source src="https://jimta.org/assets/video/1.mp4" type="video/mp4">
                            </video>
                </div>
                <div class="col-lg-6 col-12 p-3 pad-zr-x ">
                            <video width="100%" height="280" controls>
                                <source src="https://jimta.org/assets/video/2.mp4" type="video/mp4">
                            </video>
                        </div>
            </div>

        </div>
    </div>

    <div class="icon-boxes-container">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6 col-lg-3 ">
                    <div  class="icon-box icon-box-side d-flex align-items-center">
                    <img height="50px" src="{{asset('assets/images/Jimta-Coin.png')}}">
                        <div class="icon-box-content ml-3">
                            <h3 class="icon-box-title">Jimta Coin</h3><!-- End .icon-box-title -->
                            <p>Shop & earn more coins</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3 ">
                    <div class="icon-box icon-box-side d-flex align-items-center justify-content-center">
                    <img height="50px" width="50px" src="https://img.icons8.com/external-justicon-flat-justicon/64/000000/external-map-map-and-location-justicon-flat-justicon-2.png"/>
                        <div class="icon-box-content ml-3">
                            <h3 class="icon-box-title">Service Center </h3><!-- End .icon-box-title -->
                            <p>Collect your
product at your
convenience.
</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side d-flex align-items-center justify-content-center">
                    <img src="https://img.icons8.com/color/48/000000/info--v1.png"/>
                        <div class="icon-box-content ml-3">
                            <h3 class="icon-box-title">10% Bonus</h3><!-- End .icon-box-title -->
                            <p>On connecting a
member with Jimta
via Referral link </p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side  d-flex align-items-center">
                    <img src="https://img.icons8.com/office/40/000000/technical-support--v1.png"/>
                        <div class="icon-box-content ml-3">
                            <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                            <p>24/7 amazing services</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div>
</div>










<!-- <div class="container pt-5 intro-content">
                    <h3 class="intro-subtitle">Living Room</h3>
                    <h1 class="intro-title">
                        Make Your Living Room <br>Work For You.<br>
                        <span class="primary-two">
                            <sup class="text-white font-weight-light">from</sup><sup>$</sup>9,99
                        </span>
                    </h1>

                    <a href="category.html" class="btn banner-button">
                        <span>Shop Now </span>
                        <i class="icon-long-arrow-right"></i>
                    </a>
                </div> -->