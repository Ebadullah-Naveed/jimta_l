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
.login-inputs{
    border:1px solid #f8fafc;
    border-radius:10px;
    padding-inline:15px !important;
    width:100%;
    background-color:white !important;
    height:45px !important;
    outline:none !important;
    padding-block: 8px;
    transition:0.6s all;
    box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;
}
.login-inputs:focus{
    border:1px solid var(--base-color) !important;
}
</style>
<div class="user-welcome container-fluid">
        <div class="container">
            <div class="row py-5 d-flex-column align-items-center justify-content-center flex-column complusory-header-inner-page">
                <h1>Jimta Wallet</h1>
            </div>
        </div>
</div>
<div class="container py-5">
    <div class="row  py-5 align-items-center justify-content-center">
        <h4 style="color:#ebb700">How to Get Fund</h4>
        <p class="pb-5">
            If you’re a new member you can use “Request Fund” option to receive funds in your wallet by paying directly in Jimta account through Binance  & uploading  screen shot below. You can also ask your leader to give you fund or “Referral Code” directly to subscribe.
            <br><br>
            For transfer in binance USDT TRC20
            <br><br>
            Wallet: <a style="color:#ebb700">(TMM78EP7vFK1ED8DnjHEDzPQVrRmgwY7Bx)</a>
            
        </p>
        <div style="border:1px solid black;border-radius:5px" class="col-lg-4 col-12 p-0 d-flex align-items-center justify-content-center flex-column py-3 px-5">
            <div class="row align-items-center mt-4">
                <div class="col-12">
                <form enctype="multipart/form-data">
                    <div class=" align-items-center">
                        <div class=" w-100 d-flex justify-content-center align-items-center">
                            <h3 class="jimta-coin-headh4">Get Fund</h3>
                        </div>
                        <hr>
                    <div class="form-group">
        <label for="exampleFormControlInput1">Amount</label>
        <input type="text" class="login-inputs" id="exampleFormControlInput1" placeholder="Enter amount" wire:model="amount">
        @error('amount') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Image</label>
        <input type="file" class="login-inputs" id="exampleFormControlInput1" placeholder="Enter image" wire:model="image">
        @error('image') <span class="text-danger">{{ $message }}</span>@enderror
        <div wire:loading wire:target="image">Uploading...</div>
                @if ($image)
                Photo Preview:
                <img src="{{ $image->temporaryUrl() }}" width="150">
                @endif
    </div>
                        <button wire:click.prevent="store()" class="main-login-button py-1 px-2 ml-3">Request</button>
                    </div>
                </form>
                </div>
            </div>
        </div><br>
        <div class="mt-4">

        <h4 style="color:#ebb700">Jimta Wallet Is More Than An Ordinary Wallet</h4>
        <p class="py-3">Our wallet is not the one you are thinking about. Jimta wallet is an exclusive feature of our company’s services that allows the members to store their savings and pay site-wide from the ease of your comfort. Once a non-member becomes a part of Jimta, it gets access to a secure digital wallet. As the name suggests, Jimta wallet works the same as your usual wallet.
<br><br>
One of the advantages the member gets is that it doesn’t have to worry about the transactions and storing money online. With Jimta wallet, you can easily shop around and invest as much as you can. It includes various options for you like bonus points, shopping points, and Jimta coins.
</p>
</div>







<div class="mt-4">

        <h4 style="color:#ebb700">Who Can Use Jimta Wallet?</h4>
        <p class="py-3">Since our company offers its versatile services to the members, a wallet is only available for use to members. It is an ultimate transaction solution, which brings a lot of conveniences. Not only is this feature reliable, but it ensures to provide safety and security in every manner.
<br><br>
        You don’t have to carry your cards and worry about the brank’s approval to shop online. Jimta wallet is a simple way to keep the money safe and pay when you add something to your cart. This is the best way to make your experience safe and memorable.  

</p>
</div>
        </div>
    
</div>
</div>
