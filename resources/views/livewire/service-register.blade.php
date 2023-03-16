<div>
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
label{
    font-family:var(--fonts)
}
.login-al-res{
    width:100%;
    display:flex;
    align-items:center;
    justify-content:center;
    
    padding-bottom:6px;
    font-weight:600
}
@media screen and (max-width: 768px) {
  .flex-media{
      flex-direction:column;
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
    .container-fluid .row .paddingzerol{
        /* padding-inline:3rem !important; */
    }
   
}
</style>

<div wire:ignore.self>
    <div class="container-fluid user-welcome">
        <div class="container">
            <div class="row py-5 d-flex-column align-items-center justify-content-center flex-column complusory-header-inner-page">
                <h1>Service Cernter Registration</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-5">
        <div class="row">
            <div class="col-lg-4 col-12 p-0">
            <iframe width="100%" height="100%" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=52.70967533219885, -8.020019531250002&amp;q={{$this->location}}&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
            <div class="col-lg-8 col-12">
                <form enctype="multipart/form-data">
                    <div class="row flex-media">
                        <div class="col-lg-6 col-12 paddingzerol">
                            <div class="form-group d-flex flex-column">
                                <label for="exampleFormControlInput1">First Name</label>
                                <input type="text" required class="login-inputs custom_text" placeholder="Enter First Name" wire:model="first_name">
                                    @error('first_name') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="exampleFormControlInput2">Last Name</label>
                                <input type="text" required class="login-inputs custom_text" placeholder="Enter Last Name" wire:model="last_name">
                                @error('last_name') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="exampleFormControlInput1">Email</label>
                                <input type="text" required class="login-inputs custom_text" placeholder="Enter email" wire:model="email">
                                @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="exampleFormControlInput1">password</label>
                                <input type="password" class="login-inputs custom_text" placeholder="Enter password" wire:model="password">
                                @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="exampleFormControlInput1">confirm password</label>
                                <input type="password" class="login-inputs custom_text" placeholder="Enter confirm password" wire:model="cpassword">
                                @error('cpassword') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="exampleFormControlInput1">Country</label>
                                <input type="text" required class="login-inputs custom_text" placeholder="Enter Country" wire:model="country">
                                @error('country') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="exampleFormControlInput1">city</label>
                                <input type="text" required class="login-inputs custom_text" placeholder="Enter city" wire:model="city">
                                @error('city') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="exampleFormControlInput1">address</label>
                                <input type="text" required class="login-inputs custom_text" placeholder="Enter address" wire:model="address">
                                @error('address') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="exampleFormControlInput1">phone number</label>
                                <input type="text" required class="login-inputs custom_text" placeholder="Enter phone number" wire:model="phone_number">
                                @error('phone_number') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 paddingzerol">
                            <div class="form-group d-flex flex-column">
                                <label for="exampleFormControlInput1">business detail</label>
                                <input type="text" required class="login-inputs custom_text" placeholder="Enter business_detail" wire:model="bussiness_details">
                                @error('bussiness_details') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="exampleFormControlInput1">bussiness name</label>
                                <input type="text" required class="login-inputs custom_text" placeholder="Enter bussiness_name" wire:model="bussiness_name">
                                @error('bussiness_name') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="exampleFormControlInput1">shop address</label>
                                <input type="text" required class="login-inputs custom_text" placeholder="Enter shop_address" wire:model="shop_address">
                                @error('shop_address') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="exampleFormControlInput1">location</label>
                                <input type="text" required class="login-inputs custom_text" placeholder="Enter location" wire:model="location">
                                @error('location') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="exampleFormControlInput1">tel office</label>
                                <input type="text" required class="login-inputs custom_text" placeholder="Enter tel_office" wire:model="tel_office">
                                @error('tel_office') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="exampleFormControlInput1">bussiness licence number:</label>
                                <input type="text" required class="login-inputs custom_text" placeholder="Enter bussiness_licence_number" wire:model="bussiness_licence_number">
                                @error('bussiness_licence_number') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="exampleFormControlInput1">mobile</label>
                                <input type="text" required class="login-inputs custom_text" placeholder="Enter mobile" wire:model="mobile">
                                @error('mobile') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="exampleFormControlInput1">contact_person</label>
                                <input type="text" required class="login-inputs custom_text" placeholder="Enter contact_person" wire:model="contact_person">
                                @error('contact_person') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="exampleFormControlInput1">government id</label>
                                <input type="file" required class="login-inputs custom_text" placeholder="Enter gov_id" wire:model="gov_id">
                                @error('gov_id') <span class="text-danger">{{ $message }}</span>@enderror
                                <div wire:loading wire:target="gov_id">Uploading...</div>
                                @if ($gov_id)
                                Photo Preview:
                                <img src="{{ $gov_id->temporaryUrl() }}" width="100">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end pr-5">
                        <button wire:click.prevent="store()" class="login_button_on_form" >Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>