<div>
    
<div class="container-fluid py-4 seconery-nav p-0">
        <div class="container h-100">
            <div class="col-12 h-100 d-flex align-items-center">
                <a href="">Home</a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="">Jimta Coin Package</a>
            </div>
        </div>
    </div>
    <div class="user-welcome container-fluid">
        <div class="container">
            <div class="row py-5 d-flex-column align-items-center justify-content-center flex-column complusory-header-inner-page">
                <h1>Jimta Coin Package</h1>
            </div>
        </div>
    </div>
    <!-- body -->
    <div class="container-fluid">
        <div class="container">
        <p class="pt-5">An opportunity to earn great profits is a dream for some, but the members at Jimta can avail it in real. The company offers you four profitable Jimta Coin Package packages through which you can earn huge profits in no time.</p>
            <div class="row py-5">
                @foreach($investment as $key=>$i)
                <div class="col-lg-3 col-md-6 col-12">
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
                            <span>Full Access to</span>
                            <p>{{$i->description}}</p>
                        </div>
                       <div class="package-detail-buy1">
                           <button wire:click="invest({{$key+1}},{{$i->price}})">Buy Now</button>
                       </div>
                   </div>
                </div>
                @endforeach
            </div>
            <p class="py-5">Member of our ecosystem can simply be a part of our Jimta Coin Package program. These packages are valid for 18 months, we guarantee you 80% profit on Jimta Coin Package in any packages, profits will be given on daily basis means you can start earning from the very next day for the next 18 months (547 days). All profit will be given in form of Jimta Coin from which you can buy products transfer to other members as well. Jimta Coin will become our crypto currency soon so you can sell and trade as well from this coin, all your coin in your wallet will convert into crypto once we launch jimta coin in blockchain. You can buy multiple packages or same package multiple times. Basic Member can Jimta Coin Package in Bronze & Silver only while VIP members can buy any Packages.
</p>
<h3>Future Benefits of Jimta Coin</h3>
            <p>Are you not convinced yet? Check out the benefits listed below that ensure a transparent policy for our members. 
            </p>
            <ol>
<li>Jimta Coin Become Crypto Currency.</li>
<li>Convert your jimta wallet into crypto wallet.</li>
<li>Tradable in our Decentralize exchange.</li>
<li>Can buy sell trade with different crypto coins.</li>
<li>Transfer in personal wallet.</li>
<li>Withdraw through USDT .</li>
</ol>

        </div>
    </div>
    <!-- body -->
    </div>
</div>
