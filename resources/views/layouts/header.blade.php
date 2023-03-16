<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="{{asset('assets/images/Jimta-LOgo.png')}}">
    <title>Jimta</title>
    <link rel="stylesheet" href="{{asset('assets/css/packages.css')}}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/shop.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pro-detail.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/media.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/user_account.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet"
          type="text/css"
          href="lightbox2/dist/css/lightbox.min.css">
    <script src=
"lightbox2/dist/js/lightbox-plus-jquery.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- css -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
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
<style>
    :root{
        --fonts:'Poppins', sans-serif;
        --base-color:#ebb700;
        --secondary-color:#1d1d1d;
        --nav-color:#dadada;
    }
    .cart_drop_down_buttons{
        padding-inline: 10px;
        padding-block: 5px;
        border: none;
        background: var(--base-color);
        border-radius: 5px;
        color:white;
        font-size:16px;
    }
    .cart_drop_down_buttons:hover{
       color:white;
    }
    .mobile-cart{
        background:var(--base-color);
        color:white !important;
        font-size:10px;
        height:17px;
        width:17px;
        display:flex;
        align-items:center;
        justify-content:center;
        border-radius:50%;
        position: absolute;
        left: -12px;
    top: 7px;
    }
    body a{
        color:black !important;
    }
    .hover-side{
        background:white;
    }
    .hover-side:hover{
        background:#efefef;
    }
    .user-i-col{
        color:var(--base-color);
    }
    .color-yellow-tp{
        color:#ebb700;
        font-weight:600
    }
</style>
<body>


<div class="w3-sidebar w3-bar-block w3-border-right" style="width:0px" id="mySidebar">
        <div class="w-100 d-flex align-items-center justify-content-center p-5">
        <img height="100px" width="100px" src="{{asset('assets/images/Jimta-LOgo.png')}}" alt="">
        </div>
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
                <a  class="w3-bar-item w3-button hover-side" href="/about">About</a>
                <a  class="w3-bar-item w3-button hover-side" href="/servicecenterc">Services</a>
                <a  class="w3-bar-item w3-button hover-side" href="/investment">Coin Package</a>
                <a  class="w3-bar-item w3-button hover-side" href="/jimtacoin">Jimta Coin</a>
                <a  class="w3-bar-item w3-button hover-side" href="/jimtaecosystem">Jimta Eco System</a>
                <a  class="w3-bar-item w3-button hover-side" href="/user/account">User Account</a>
                <a  class="w3-bar-item w3-button hover-side" href="/shop">Shop</a>
                <a  class="w3-bar-item w3-button hover-side" href="/dash">Dashboard</a>
                <a  class="w3-bar-item w3-button hover-side" href="/subscribe/package">Upgrate</a>
                <a  class="w3-bar-item w3-button hover-side" href="/pvpoint">Jimta Rewards</a>

</div>




    <!-- mobile-nav ------------------------------------------>
    <div class="mobile-nav d-flex">
        <div class="logo-section">
        <img height="40px" width="40px" src="{{asset('assets/images/Jimta-lOgo.png')}}" alt="">
        </div>
             <div class="mobile-nav-hamicon-section pr-0" style="position:relative">
             @if(Auth::check())
                <div class="mb-0 d-flex bl_rg px-1 align-items-center"><img height="30px" width="30px" src="{{asset('assets/images/Jimta-Coin.png')}}"> <span class="font-size:10px;font-weight:700">:</span>  <p style="font-size:17px;font-weight:600;padding-x:5px;margin-bottom:0px">{{App\Models\JimtaCoins::where('user_id',auth()->user()->id)->value('balance');}}</p></div> 
             <div class="dropdown px-1">
                    <button class="currency_Flag mt-2 " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <img class="mr-2" height="28px" width="28px" src="https://img.icons8.com/ios/50/000000/wallet-app--v1.png"/> {{App\Models\Wallet::where('user_id',auth()->user()->id)->value('amount');}}
                     </div> 
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('pvpoint')}}">
                            <div class="d-flex align-items-center">
                                <p class="mr-3 mb-0">JVG : {{App\Models\PvWallet::where('user_id',auth()->user()->id)->value('balance') ?? 0}}</p>
                            </div>      
                        </a>
                        <a class="dropdown-item" href="{{route('pvpoint')}}">
                            <div class="d-flex align-items-center">
                                <p class="mr-3 mb-0">JVP : {{App\Models\PvWalletTrip::where('user_id',auth()->user()->id)->value('balance') ?? 0}}</p>
                            </div>      
                        </a>
                        <a class="dropdown-item" href="{{route('fundreqf')}}">
                            <div class="d-flex align-items-center">
                                <p class="mr-3 mb-0">Request Fund</p>
                            </div>      
                        </a>
                        <a class="dropdown-item" href="{{route('codef')}}">
                            <div class="d-flex align-items-center">
                                <p class="mr-3 mb-0">Buy Subscription Code</p>
                            </div>      
                        </a>
                        <a class="dropdown-item" href="{{route('jimtacoin')}}">
                            <div class="d-flex align-items-center">
                                <p class="mr-3 mb-0">Get Jimta Coin</p>
                            </div>      
                        </a>
                        <a class="dropdown-item" href="{{route('investment')}}">
                            <div class="d-flex align-items-center">
                                <p class="mr-3 mb-0">Make Coin Package</p>
                            </div>      
                        </a>
                    </div>
                </div>
            </div>
            
                <a class="d-flex align-items-center " href="/cart"><img height="30px" width="30px" src="https://img.icons8.com/windows/96/000000/shopping-cart.png"/></a>
                <div style="position:relative">
                <p class="mobile-cart">{{ count((array) session('cart')) }}</p>
                <button class="w3-button standerd-side w3-xlarge pl-0 mt-1" onclick="w3_open()">            <img class="ml-3" height="25px" width="25px" src="https://img.icons8.com/windows/96/000000/menu--v1.png"/></button>
                @endif
            </div>
   
    </div>
  

    <div class="container-fluid navbar p-0">
        <div class="container h-100">
            <div class="col-2 h-100 logo-side">
                <a href="/">
               <img height="100%" width="70%" src="{{asset('assets/images/Jimta-LOgo.png')}}" alt="">
</a>
            </div>
            <div class="col-4 h-100 d-flex align-items-center justify-content-center search-parent">
                <input type="text" placeholder="Search Here ...." class="navbar-search">
                <i class="fa fa-search" aria-hidden="true"></i>
            </div>



            <div class="col-6 h-100 nav-button d-flex align-items-center justify-content-space">
                
            @if(Auth::check())
                <div class="mb-0 d-flex bl_rg px-1 align-items-center"><img height="30px" width="30px" src="{{asset('assets/images/Jimta-Coin.png')}}"> <span class="font-size:10px;font-weight:700">:</span>  <p style="font-size:17px;font-weight:600;padding-x:5px;margin-bottom:0px">{{App\Models\JimtaCoins::where('user_id',auth()->user()->id)->value('balance');}}</p></div> 
            @endif
                <div class="dropdown px-1 bl_rg">
                    <button class="currency_Flag" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <img height="30px" width="30px" src="https://img.icons8.com/color/48/000000/usa.png"/><i class="fa fa-angle-down mx-2" aria-hidden="true"></i>
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
                <a class="nav-button_sec d-flex align-items-center px-1" href="{{route('login')}}">
                    <i class="fa fa-sign-in mr-2" aria-hidden="true"></i>
                    Login
                </a>
                @else

                    <div class="dropdown px-1 bl_rg">
                    <button class="currency_Flag" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <img class="mr-2" height="28px" width="28px" src="https://img.icons8.com/ios/50/000000/wallet-app--v1.png"/> {{App\Models\Wallet::where('user_id',auth()->user()->id)->value('amount');}}<i class="fa fa-angle-down pl-2" aria-hidden="true"></i>
                     </div> 
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('pvpoint')}}">
                            <div class="d-flex align-items-center">
                                <p class="mr-3 mb-0">JVG : {{App\Models\PvWallet::where('user_id',auth()->user()->id)->value('balance') ?? 0}}</p>
                            </div>      
                        </a>
                        <a class="dropdown-item" href="{{route('pvpoint')}}">
                            <div class="d-flex align-items-center">
                                <p class="mr-3 mb-0">JVP : {{App\Models\PvWalletTrip::where('user_id',auth()->user()->id)->value('balance') ?? 0}}</p>
                            </div>      
                        </a>
                        <a class="dropdown-item" href="{{route('fundreqf')}}">
                            <div class="d-flex align-items-center">
                                <p class="mr-3 mb-0">Request Fund</p>
                            </div>      
                        </a>
                        <a class="dropdown-item" href="{{route('codef')}}">
                            <div class="d-flex align-items-center">
                                <p class="mr-3 mb-0">Buy Subscription Code</p>
                            </div>      
                        </a>
                        <a class="dropdown-item" href="{{route('jimtacoin')}}">
                            <div class="d-flex align-items-center">
                                <p class="mr-3 mb-0">Get Jimta Coin</p>
                            </div>      
                        </a>
                        <a class="dropdown-item" href="{{route('investment')}}">
                            <div class="d-flex align-items-center">
                                <p class="mr-3 mb-0">Make Coin Package</p>
                            </div>      
                        </a>
                    </div>
                </div>










                

                <div class="dropdown bl_rg  nav-button_sec px-1 ">
                    <a style="cursor: pointer;" class="nav-button_sec mx-3 parent_of-cart-icon" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img height="30px" width="30px" src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/50/000000/external-shopping-cart-miscellaneous-kiranshastry-lineal-kiranshastry.png"/>
                        <span class="child_of_cart m-0">{{ count((array) session('cart')) }}</span>

                    </a>
                    <div class="dropdown-menu px-4" style="right:-20px !important;left:unset !important;width:250px" aria-labelledby="dropdownMenu3">
                    <div class="row total-header-section">
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-12 col-sm-12 col-12 total-section p-0">
                            <p class="d-flex align-items-center">Total :<span class="text-info mx-1">{{ $total }}$</span></p>
                        </div>
                    </div>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail py-2">
                                <div class="col-lg-5 col-sm-5 col-5 cart-detail-img p-0">
                                    <img src="{{asset('storage/'.$details['image']) }}" height="100%" width="100%"/>
                                </div>
                                <div class="col-lg-7 col-sm-7 col-7 cart-detail-product p-0 pl-2">
                                    <p style="font-size:12px !important" class="m-0">{{ $details['name'] }}</p>
                                    <span style="font-size:12px !important" class="m-0 price text-info"> ${{ $details['price'] }}</span>
                                    <span class="m-0 count" style="font-size:12px !important"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                            <hr class="cart_hr">
                             
                        @endforeach
                        <div class="row py-2">
                                <div class="col-6 p-0">
                                    <a class="cart_drop_down_buttons" href="{{route('cart')}}">View Cart</a>
                                </div>
                                <div class="col-6 p-0">
                                    <a class="cart_drop_down_buttons" href="{{route('checkout')}}">Check Out</a>
                                </div>
                            </div> 
                    @endif
                </div>

                <a class="nav-button_sec bl_lf  bl_rg d-flex align-items-center px-3" href="/user/account">
                    <i class="fa fa-user mx-1" aria-hidden="true"></i><p class="m-0 d-flex align-items-center color-yellow-tp"><span class="user-i-col m-0">ID</span> :{{auth()->user()->id}}</p>
                </a>

               
                
                <a class="nav-button_sec bl_lf  d-flex align-items-center px-3" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                            

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                @endif
                
                </div>
               


                
            </div>
        </div>
    </div>
@if(auth()->user()->is_subscriber == 1)
    <div class="container-fluid seconery-nav p-0">
        <div class="container h-100">
            <div class="col-12 h-100 d-flex align-items-center">
                <a href="/shop">Jimta Shop</a>
                <a href="/about">About Jimta</a>
                <a href="/investment">Coin Package</a>
                <a href="{{route('fundreqf')}}">Jimta wallet</a>
                <a href="/jimtacoin">Jimta Coin</a>
                <a href="/servicecenterc">Service Center</a>
                <a href="/jimtaecosystem">Jimta Eco System</a>
                <a href="/dash">Dashboard</a>
                <a href="/subscribe/package">Upgrade</a>
                <a href="/pvpoint">Jimta Rewards</a>

            </div>
        </div>
    </div>
    @endif