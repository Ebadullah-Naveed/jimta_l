<div>
<style>
.main-login-button{
    background:var(--base-color);
    color:white;
    padding-inline:30px !important;
    border-radius:10px;
    border:none;
    padding-block:8px;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 48px;
} 
.jimta-coin-headh4{
    color:var(--base-color);
}
.jimta-coin-cus{
    color:black;
    font-weight:600;
    border:1px solid black;
    padding-inline:30px;
    padding-block:5px;
    text-align:center;
    cursor:pointer;
}
</style>
<div class="user-welcome container-fluid">
        <div class="container">
            <div class="row py-5 d-flex-column align-items-center justify-content-center flex-column complusory-header-inner-page">
                <h1>Buy Subscription code</h1>
            </div>
        </div>
</div>
<div class="container py-5">
    <div class="row  py-5 align-items-center justify-content-center">
    <p class="pb-5">Our subscription code program allows members to purchase a unique code from their account, which can be used for new members to register as their referral. By purchasing and sharing a subscription code, members can get up to 10% bonus by using their referral link to registered New Member.</p>
        <div style="border:1px solid black;border-radius:5px;width:300px" class="p-0 d-flex align-items-center justify-content-center flex-column pt-5 px-3">
                <div class="col-12">
                <form>
                    <div class="align-items-center">
                     <h4 class="jimta-coin-headh4">Get Subscription Code</h4>
                        <hr>
                    <label for="exampleFormControlInput1">Select Subscription</label>
        <select class="form-control form-control-sm" wire:model="level">
        <option value="">Select</option>
            <option value="1">20$ Package</option>
            <option value="2">100$ Package</option>
        </select>
        @error('level') <span class="text-danger">{{ $message }}</span>@enderror
        <button wire:click.prevent="getCode()" class="main-login-button  mt-2">Buy</button>
        <hr>
        @if($this->code)
        <p data-toggle="tooltip" data-placement="top" title="copy Code" onclick="myFunction21()" id="myInput" class="jimta-coin-cus mt-0">{{$this->code}}</p>
        @endif
            </div>
                    </div>
                </form>
                </div>
            </div>
        <p class="py-5">.Our subscription code program offers two types of memberships - Basic and VIP. The Basic membership is priced at $20 and includes access to all our basic features and services. The VIP membership is priced at $100 and offers exclusive access to our premium features and services, along with additional discounts and benefits. By purchasing and sharing a subscription code, members can not only save on their own membership fees, but also earn rewards for every new member they refer. This program is a win-win for both current members and those looking to join, as it allows for exclusive discounts and benefits for all involved. So, whether you choose Basic or VIP, purchase a subscription code today and start sharing the savings with your friends and family."

To registered a Service Center in Jimta eco system you can use VIP subscription code also.</p>

        </div>
</div>
