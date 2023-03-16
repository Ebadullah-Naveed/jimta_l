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
    padding-block:50px !important; 
    padding-inline:50px !important; 
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
    width:100%;
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
}

.main-login-button{
    background:var(--base-color);
    color:white;
    padding-inline:30px;
    border-radius:10px;
    border:none;
    padding-block:8px;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 48px;
} 
.register-line{
    width:100%;
}
.register_heading{
    font-weight:600;
    color:var(--base-color);
}
label{
    font-weight:700;
}
.terms-condition{
    color:var(--base-color)
}
.register-left{
    background-image:url("/assets/images/UI-Isbah-Yellow-Part.jpg");
    background-size:cover;
    padding-inline:50px !important;
    padding-top:130px !important;
}
.in-reg-left{
    height:100%;
    width:100%;
    padding:50px
}
.card-reg{
    width:100%;
    height:100px;
    border:1px solid black;
    border-radius:10px;
    margin-top:10px;
    display: flex;
    align-items:center;
    flex-direction:column;
    justify-content:center;
    text-align:center;
}
.card-reg p{
    color:black;
    font-weight:500;
    margin:0px
}
.card-reg h4{
    color:black;
    font-weight:700;
    margin:0px;
}@media screen and (max-width: 995px) {
    .res-none{
		display: none !important;
	}  
    .dis-res{
        display:block !important;
    }
    .wid-res{
        width:100% !important;
    }
    .padd-l-res{
        padding-left:0px !important;
        padding-top:1.5rem;
    }
}
</style>
<div class="container-fluid login-amin">
    <div class="row h-100">
            <div class="col-md-4 h-100 p-0 register-left res-none">   
                <div class="in-reg-left">
                    <div class="card-reg">
                        <h4>GET UPTO 80% </h4>
                        <p>PROFIT OF YOUR INVESTMENT </p>
                    
                    </div>
                    <div class="card-reg">
                        <h4>START EARNING</h4>
                        <p>UPTO 10% ON EVERY REFERRAL LINK CLICK
                        </p>
                    </div>
                    <div class="card-reg">
                        <h4>5% SHOPPING POINTS</h4>
                        <p>ON EVERY PURCHASE ON JIMTA STORE
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 h-100 px-5 pb-5 pt-3" >
                <div class="py-3">
                    <h3 class="register_heading">Registration</h3>
                </div>
                <form method="POST" action="https://jimta.org/register">
                        @csrf

                <div class="py-2 d-flex dis-res">
                    <div class="w-50 wid-res d-flex flex-column px-0">
                        <label for="">First Name</label>
                        <input id="first_name" type="text" class="login-inputs @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="Enter First Name">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="w-50 wid-res d-flex flex-column padd-l-res pl-4">
                        <label for="">Last Name</label>
                        <input id="last_name" type="text" placeholder="Enter Lastname" class="login-inputs @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>



                <div class="py-2 d-flex dis-res">
                    <div class="w-50 wid-res d-flex flex-column px-0">
                        <label for="">Enter Email Address</label>
                        <input id="email" type="email" placeholder="Enter Email Address" class="login-inputs @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror


                    </div>
                    <div class="w-50 wid-res d-flex flex-column padd-l-res pl-4">
                        <label for="">Phone Number</label>

                        <input id="phone_number" type="text" placeholder="Phone Number" class="login-inputs @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="py-2 d-flex dis-res">
                    <div class="w-50 wid-res d-flex flex-column px-0">
                        <label for="exampleInputPassword1">Password</label>
                        <div class="login-passord-parent">
                            <input id="myInput1" type="password"  placeholder="Password" class="employee-input-email job-search login-inputs @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <img onclick="seek1()" class="toggle-password21" src="https://img.icons8.com/material-outlined/24/000000/visible--v1.png"/>
                        </div>
                    </div>
                    <div class="w-50 wid-res d-flex flex-column padd-l-res pl-4">
                        <label for="">Confirm Password</label>
                        <div class="login-passord-parent">
                        <input id="myInput2" type="password" class="employee-input-email job-search login-inputs" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                        <img onclick="seek2()" class="toggle-password21" src="https://img.icons8.com/material-outlined/24/000000/visible--v1.png"/>
                        </div>
                    </div>
                </div>

                <div class="py-2 d-flex dis-res">
                    <div class="w-50 wid-res d-flex flex-column px-0">
                        <label for="">Country</label>
                        <input id="country" type="text" placeholder="Enter Country Name" class="login-inputs @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="w-50 wid-res d-flex flex-column padd-l-res pl-4">
                        <label for="">City</label>
                        <input id="city" type="text" placeholder="Enter Your City" class="login-inputs @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>



                <div class="py-2 d-flex dis-res">
                    <div class="w-50 wid-res d-flex flex-column px-0">
                        <label for="">Address</label>
                        <input id="address" type="text" placeholder="Enter Address" class="login-inputs @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>





                
                <div class="py-2 d-flex dis-res">
                    <div class="w-50 wid-res d-flex px-0 align-items-center">
                        <input type="checkbox"><p class="m-0 ml-2">I read and agree with <a href="#" class="terms-condition">terms & condition</a></p>
                    </div>
                    <div class="w-50 wid-res px-0 d-flex align-items-center justify-content-end">
                        <button type="submit" class="main-login-button">Register</button>
                    </div>
                </div>
                </form>
            </div>
            
            
        </div>
    </div>
</div>
<script>
        function seek1() {
            var x = document.getElementById("myInput1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function seek2() {
            var x = document.getElementById("myInput2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
