<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="{{asset('assets/images/Jimta-LOgo.png')}}">
  <title>
    Jimta
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="{{asset('black/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{asset('black/assets/css/black-dashboard.css?v=1.0.0')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('black/assets/demo/demo.css')}}" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/echarts@5.3.0/dist/echarts.js" integrity="sha256-SlS4zwUj+5wnX/dEqfUzDYd5CbWK/0GTMJfAIT9h3s8=" crossorigin="anonymous"></script>

</head>
<style>
  .nav li a{
    margin: 10px 15px 0;
    border-radius: 30px;
    color: #ffffff;
    display: block;
    text-decoration: none;
    position: relative;
    text-transform: uppercase;
    cursor: pointer;
    font-size: 0.62475rem;
    padding: 10px 0px !important;
    line-height: 1.625rem;
  }
  .nav li a i{
    font-size: 20px;
    float: left;
    margin-right: 0px !important;
    line-height: 30px;
    width: 34px;
    text-align: center;
    color: rgba(255, 255, 255, 0.8);
    position: relative;
  }
  .nav li a p{
    font-size: 13px;
    
  }
  .card label{
    color:white !important;
  }
  .navbar-nav li a {
    color:#ebb700;
}
.sidebar .nav, .off-canvas-sidebar .nav {
    margin-top: 20px;
    display: block;
    padding-bottom: 100px !important;
}
.modal.show .modal-dialog {
    -webkit-transform: translate(0, 30%);
    transform: translate(0, 5%) !important;
}
.sidebar .nav p{
  color: black !important;
  font-weight:500;
}
.sidebar .nav i {
  color: black !important;
  font-weight:500;
}
.form-group label{
  color:white !important;
}
</style>
<body class="">

  <div class="wrapper">
    <div style="background:#ebb700" class="sidebar" >
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <ul class="nav"> 
          <li class="">
            <a href="/">
            <i class="tim-icons icon-atom"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="active ">
            <a href="{{route('dashboard')}}">
            <i class="tim-icons icon-atom"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="{{route('code')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Referral Code</p>
            </a>
          </li>
          <li>
            <a href="{{route('transferlog')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Transfer Log</p>
            </a>
          </li>
          <li>
            <a href="{{route('il')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Investment log</p>
            </a>
          </li>
          <li>
            
            <a href="{{route('reflogs')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Referal Logs</p>
            </a>
          </li>
          <li>
            <a href="{{route('createrecord')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Change User Password</p>
            </a>
          </li>
          @if(auth()->user()->is_admin == 1)
          <li>
            <a href="{{route('product')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Product</p>
            </a>
          </li>
          <li>
            <a href="{{route('category')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Product Category</p>
            </a>
          </li>
         
          <li>
            <a href="{{route('referal')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Referral</p>
            </a>
          </li>

          <li>
            <a href="{{route('notification')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Notification</p>
            </a>
          </li>
          <li>
            <a href="{{route('fundreq')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Requested Fund</p>
            </a>
          </li>
          <li>
            <a href="{{route('blog')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Blogs</p>
            </a>
          </li>
          <li>
            <a href="{{route('investmentdet')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Investment Package</p>
            </a>
          </li>
          <li>
            <a href="{{route('code')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Referral Code</p>
            </a>
          </li>
         
         
          @endif
          <li>
            <a href="{{route('addbalance')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Wallet balance</p>
            </a>
          </li>
          @if(auth()->user()->is_admin == 1 or auth()->user()->is_investor == 1)

<li>
  <a href="{{route('investorinfo')}}">
    <i class="tim-icons icon-atom"></i>
    <p>Investment Information</p>
  </a>
</li>
<li>

            <a href="{{route('withreq')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Withdraw Request</p>
            </a>
          </li>
@endif
          @if(auth()->user()->is_admin == 1 or auth()->user()->is_service_center == 1)

          <li>
            <a href="{{route('servicecenter')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Service Center</p>
            </a>
          </li>
          <li>
            <a href="{{route('ordertodeliver')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Order to Deliver</p>
            </a>
          </li>
          <li>
            <a href="{{route('confirmdelivery')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Confirm Delivery</p>
            </a>
          </li>
          @endif
          <li>
            <a href="{{route('jimtacoins')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Jimta Coin</p>
            </a>
          </li>
          <li>
            <a href="{{route('bankdet')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Bank Details</p>
            </a>
          </li>
         
          <li>
            <a href="{{route('passwordchange')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Change Password</p>
            </a>
          </li>

          <li>
            <a href="{{route('userdet')}}">
              <i class="tim-icons icon-atom"></i>
              <p>Users/My profile</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <img height="80px" width="80px" src="{{asset('assets/images/Jimta-LOgo.png')}}" alt="">
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="search-bar input-group d-flex align-items-center">
                <p>User ID :{{auth()->user()->id}}</p>
              </li>
              <li class="dropdown nav-item">
                <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="notification d-none d-lg-block d-xl-block"></div>
                  <i class="tim-icons icon-bell-55"></i>
                  <span style="background:#ebb700;color:white;padding-inline:10px;padding-block:5px;border-radius:50%" class="child_of_cart m-0">12</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                @foreach(\App\Models\Notification::where('user_id',null)->orWhere('user_id',auth()->user()->id)->latest()->get() as $notification)
                  <li class="nav-link"><a href="#" class="nav-item dropdown-item">{{$notification->message}}</a></li>
                @endforeach
                </ul>
              </li>
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="black/assets/img/anime3.png" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->