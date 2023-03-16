<div>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jimta</title>
    <link rel="stylesheet" href="{{asset('assets/css/packages.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/shop.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pro-detail.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/media.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/user_account.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @livewireStyles
</head>

<body>
    <!-- mobile-nav ------------------------------------------>
    <div class="mobile-nav d-flex">
        <div class="logo-section">
            <h3>logo</h3>
        </div>
        <div class="mobile-nav-hamicon-section">
            <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- mobile-nav ------------------------------------------>
    <div id="mybutton">
        <button class="feedback"><i class="fa fa-comments" aria-hidden="true"></i></button>
        </div>
    <div class="container">
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
            class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header row px-4 d-flex justify-content-around mx-1 mx-sm-3 mb-0 pb-0 border-0">
                        <div class="tabs" id="tab01">
                            <h6 class="text-muted">Login</h6>
                        </div>
                        <div class="tabs active" id="tab02">
                            <h6 class="font-weight-bold">Register</h6>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="modal-body p-0">
                        <fieldset id="tab011">
                            <div class="h-100 w-100 d-flex align-items-center justify-content-center">
                                <img height="150px" src="{{asset('assets/images/log.png')}}" alt="">
                            </div>
                            <div class="h-100 w-100 login-inner-space text-center">
                                <input type="email" placeholder="Email Or Username">
                                <input type="password" placeholder="password">
                                <a href="" class="forget-password">Forget Password</a>
                                <a href="/black/user_account.html" class="login-button">Login</a>
                            </div>
                        </fieldset>
                        <fieldset class="show" id="tab021">
                            <div class="h-100 w-100 d-flex align-items-center justify-content-center">
                                <img height="150px" src="{{asset('assets/images/log.png')}}" alt="">
                            </div>
                            <div class="h-100 w-100 login-inner-space ">
                                <div class="d-flex align-items-center">
                                    <input class="w-50 mr-1" type="text" placeholder="Firstname">
                                    <input class="w-50 ml-1" type="text" placeholder="lastname">
                                </div>
                                <input type="Email" placeholder="Email">
                                <input type="password" placeholder="password">
                                <input type="password" placeholder="Confirm password">
                                <div class="d-flex align-items-center register-check">
                                    <input type="checkbox">
                                    <p class="mb-0 ml-2">I Accept <span>Terms OF Use</span></p>
                                </div>
                                <a href="" class="login-button">Register</a>
                            </div>
                        </fieldset>
                    </div>
                    <div class="line"></div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container-fluid navbar p-0">
        <div class="container h-100">
            <div class="col-2 h-100 logo-side">
               <img height="100%" width="70%" src="{{asset('assets/images/Jimka Logo.png')}}" alt="">
            </div>
            <div class="col-5 h-100 d-flex align-items-center justify-content-center search-parent">
                <input type="text" placeholder="Search Here ...." class="navbar-search">
                <i class="fa fa-search" aria-hidden="true"></i>
            </div>



            <div class="col-5 h-100 nav-button d-flex align-items-center justify-content-space">
                

                <div class="dropdown px-2 bl_rg">
                    <button class="currency_Flag" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="d-flex align-items-center">
                            <img height="22px" width="18px" src="https://img.icons8.com/material-outlined/24/000000/us-dollar--v1.png"/><p style="font-size:20px" class="mb-0">us</p><i class="fa fa-angle-down mx-2" aria-hidden="true"></i>
                     </div> 
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <p class="mr-3 mb-0">Dollar</p><img height="30px" width="30px" src="https://img.icons8.com/material-outlined/24/000000/us-dollar--v1.png"/>
                            </div>      
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <p class="mr-3 mb-0">Euro</p><img height="30px" width="30px" src="https://img.icons8.com/material-outlined/24/000000/euro-pound-exchange.png"/>
                            </div>      
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <p class="mr-3 mb-0">Yen</p><img height="30px" width="30px" src="https://img.icons8.com/external-icongeek26-outline-icongeek26/64/000000/external-yen-currency-icongeek26-outline-icongeek26.png"/>
                            </div>      
                        </a>
                    </div>
                </div>


                <div class="dropdown px-2 bl_rg">
                    <button class="currency_Flag" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <img height="30px" width="30px" src="https://img.icons8.com/color/48/000000/usa.png"/>  <p class="ml-2 mb-0">En</p><i class="fa fa-angle-down mx-2" aria-hidden="true"></i>
                            </div> 
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <p class="mr-3 mb-0">English</p><img height="30px" width="30px" src="https://img.icons8.com/color/48/000000/usa.png"/>
                            </div>      
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <p class="mr-3 mb-0">French</p><img height="30px" width="30px" src="https://img.icons8.com/color/48/000000/france.png"/>
                            </div>      
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <p class="mr-3 mb-0">Spanish</p><img height="30px" width="30px" src="https://img.icons8.com/color/48/000000/spain.png"/>
                            </div>      
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <p class="mr-3 mb-0">Portuguese</p><img height="30px" width="30px" src="https://img.icons8.com/color/48/000000/portugal.png"/>
                            </div>      
                        </a>
                    </div>
                </div>

                
                @if(!(auth()->user()))
                <a class="nav-button_sec d-flex align-items-center px-2" href="{{route('login')}}">
                    <i class="fa fa-sign-in mr-2" aria-hidden="true"></i>
                    Login
                </a>
                @else




                <!-- @php {{$amount = App\Models\Wallet::where('id',auth()->user()->id)->value('amount');}} @endphp
                    <div class="mb-0 d-flex"><p class="mb-0 mr-1">Wallet</p> : <p class="mb-0 ml-1">   
                    {{$amount}}</p></div>  -->





                <div class="dropdown nav-button_sec px-1">
                    <a style="cursor: pointer;" class="nav-button_sec mx-3 parent_of-cart-icon" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img height="30px" width="30px" src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/50/000000/external-shopping-cart-miscellaneous-kiranshastry-lineal-kiranshastry.png"/>
                        <span class="child_of_cart m-0">{{ count((array) session('cart')) }}</span>
                    </a>
                    <div class="dropdown-menu px-4" style="right:-20px !important;left:unset !important;width:200px" aria-labelledby="dropdownMenu3">
                    <div class="row total-header-section">
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-12 col-sm-12 col-12 total-section ">
                            <p class="d-flex align-items-center">Total :<span class="text-info mx-1">{{ $total }}$</span></p>
                        </div>
                    </div>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail py-2">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="{{asset('storage/'.$details['image']) }}" width=100/>
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p style="font-size:12px !important" class="m-0">{{ $details['name'] }}</p>
                                    <span style="font-size:12px !important" class="m-0 price text-info"> ${{ $details['price'] }}</span>
                                    <span class="m-0 count" style="font-size:12px !important"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                            <hr class="cart_hr">

                            <a href="{{route('cart')}}">View Cart</a>
                        @endforeach
                    @endif
                </div>
                @endif
            </div>
            </div>
        </div>
    </div>

    <div class="container-fluid seconery-nav p-0">
        <div class="container h-100">
            <div class="col-12 h-100 d-flex align-items-center">
                <div class="dropdown">
                    <a href="" class="dropbtn category-navigation"><i class="fa fa-angle-down"
                            aria-hidden="true"></i>Products</a>
                    <div class="dropdown-content">
                        <a href="#">Electronic Devices</a>
                        <a href="#">Electronic Accessories</a>
                        <a href="#">TV & Home Appliances</a>
                        <a href="#">Health & Beauty</a>
                        <a href="#">Babies & Toys</a>
                        <a href="#">Groceries & Pets</a>
                        <a href="#">Automotive & Motorbike</a>
                        <a href="#">Sports & Outdoor</a>
                    </div>
                </div>
                <a href="">Services</a>
                <a href="">Subscription</a>
                <a href="">Investment</a>
                <a href="">Jimta Coin</a>
                <a href="">Jimta Eco System</a>
                <a href="">About Jimta</a>
                <a href="/jimtacoin">PV Point</a>
            </div>
        </div>
    </div>











                
</div>
