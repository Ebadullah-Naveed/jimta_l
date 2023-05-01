    @extends('layouts.app')

@section('content')

<style>
:root{
    --fonts:'Poppins', sans-serif;
    --base-color:#ebb700;
    --secondary-color:#1d1d1d;
    --nav-color:#dadada;
}
a:hover{
    color:var(--base-color)
}
.login-amin{
    height:calc(100vh);
}
.card{
    border-radius:0px
}
.login-left-sight{
    padding-block:100px !important; 
    padding-inline:80px !important; 
    background:white;
}
.left-login-inner{
    height:100%;
    width:100%;
}
.log-soc-med-i{
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    border-radius:50%;
}
.log-soc-med-i img{
    height:30px;
    width:30px;
}
.login-inputs{
    border:1px solid #f8fafc;
    border-radius:10px;
    padding-inline:15px !important;
    width:400px;
    background-color:white !important;
    height:45px !important;
    outline:none !important;
    transition:0.6s all;
    box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;
}
.login-inputs:focus{
    border:1px solid var(--base-color);
}
.remember-text{
    color:var(--base-color);
}
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
.toggle-password21{
    position:absolute;
    right:10px;
    top:10px;
    color:black
}

    .login-passord-parent{
        position:relative;
        width:400px
    }
    .login-last-info{
        width:400px
    }
.login-last-info2{
    width:300px;
}
.main-login-button{
    background:var(--base-color);
    color:white;
    padding-inline:20px;
    border:none;
    border-radius:10px;
    padding-block:8px;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 48px;
}


label{
    font-weight:700;
}
.login-right-inner{
    background-image:url("assets/images/loginwall.jpg");
    background-size:cover;
    height:100%;
    display:flex;
    align-items:center;
    justify-content:center;
    width:100%;
    text-align:center;
}
.login-right-inner h1{
    color:black;
    font-weight:900 !important;
    font-size:3rem;
}
.login-al-res{
    width:100%;
    display:flex;
    align-items:center;
    justify-content:center;
    position:absolute;
    bottom:0px;
    left:0px;
    padding-bottom:6px;
    font-weight:600
}
.left-login-inner .wid-100{
        width:462px;
    }

@media screen and (max-width: 995px) {
    .res-none{
		display: none !important;
	}
    .res-vis-log{
        height:100vh !important;
    }
    .login-left-sight{
    padding-block:0px !important; 
    padding-inline:0px !important; 
    background:white;
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
    .login-passord-parent{
        position:relative;
        width:100%;
    }
    .login-last-info{
        width:100%;
    }

    .left-login-inner .wid-100{
        width:100%
    }
    .remember-text {
    color: var(--base-color);
    font-size: 12px;
}
}
</style>
<div class="container-fluid login-amin">
@if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
    <div class="row h-100">
        <div class="col-md-7 h-100 p-0 login-left-sight d-flex align-items-center justify-content-center res-vis-log">
            <div class="left-login-inner d-flex align-items-center justify-content-center flex-column">
                <div class="d-flex justify-content-start  login-last-info">
                    <img height="100px" width="100px" src="{{asset('assets/images/Jimta-LOgo.png')}}" alt="">
                </div>


                <form method="POST" action="/login">
                @csrf
                <div class="p-3 d-flex flex-column">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="p-2 login-inputs custom_text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email / Username">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="pb-3 px-3 pt-0 d-flex flex-column">
                    <label for="password">{{ __('Password') }}</label>
                    <div class="login-passord-parent">
                        <input id="myInput" type="password" class="employee-input-email job-search login-inputs custom_text @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        <img onclick="seek()" class="toggle-password21" src="https://img.icons8.com/material-outlined/24/000000/visible--v1.png"/>
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
                <div class="pb-3 px-3 pt-0 d-flex align-items-center justify-content-between login-last-info">
                    @if (Route::has('password.request'))
                        <a class="remember-text" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif    

                    <div class="d-flex align-items-center">
                        <input class="form-check-input mb-1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <div class="pb-3 pl-3 pr-3 pt-0 d-flex align-items-center justify-content-space login-last-info">
                    <div class="d-flex align-items-center justify-content-start login-last-info2">
                        <a href="https://www.facebook.com/Jimtaci-104026015107353/" class="log-soc-med-i"><img src="https://img.icons8.com/material-outlined/24/000000/facebook-new.png"/></a>
                        <a href="https://instagram.com/jimta91?r=nametag" class="log-soc-med-i"><img src="https://img.icons8.com/material-outlined/24/000000/instagram-new--v1.png"/></a>

                    </div>
                    <button type="submit" class="main-login-button">
                                    {{ __('Login') }}
                    </button>
                </div>
                </form>




                <div class="pb-0 pl-3 pr-3 pt-0 d-flex align-items-center justify-content-space login-last-info wid-100">
                    <a class="remember-text pr-2" href="/howtomem">How To Become a member</a> / <a class="remember-text px-2" href="/register">Register</a> / <a class="remember-text px-2"  href="/how-to-regi-ser-cen">Service Center Agent</a> /
                </div>
                <div class="pb-3 pl-3 pr-3 pt-0 d-flex align-items-center justify-content-space login-last-info wid-100">
                 <a class="remember-text" href="/service/register">Service Center Registration</a>
                </div>
                
            </div>
            <div class="login-al-res">&copy; 2022 Jimta Group Int. All Right Reserved</div>
        </div>
        <div class="res-none col-md-5 h-100 p-0 ">
            <div class="login-right-inner">
                <h1>WELCOME TO THE AMAZING WORLD OF JIMTA</h1>
            </div>
            <!-- <img height="100%" width="100%" src="{{asset('assets/images/loginwall.jpg')}}" alt=""> -->
        </div>
    </div>
</div>
<script>
        function seek() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
