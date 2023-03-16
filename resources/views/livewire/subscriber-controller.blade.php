

<div>
    <div class="container-fluid py-4 seconery-nav p-0">

        <div class="container h-100">
            <div class="col-12 h-100 d-flex align-items-center">
                <a href="">Home</a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="">Subscription</a>
            </div>
        </div>
    </div>
    <div class="user-welcome container-fluid">
        <div class="container">
            <div class="row py-5 d-flex-column align-items-center justify-content-center flex-column complusory-header-inner-page">
                <h1>Subscription</h1>
            </div>
        </div>
    </div>
    <!-- body -->
    <div class="container-fluid">
    <div class="container d-flex alitgn-items-center justify-content-center pt-5 text-center">
            <p>Jimta makes all of your dreams come true. We have two subscription packages for our loyal members. By buying one of these packages, the member can get access to its customized dashboard. Jimta provides a path to fulfilling the dreams that are unlocked by subscribing to one of our packages.</p>
        </div>
        <div class="container">
            <div class="row">
            <div class="col-lg-4 col-md-6 col-12 p-5 animate__animated animate__backInLeft">
                <form>
                    
                    <div class="main-body-package">
                        <div class="package-level-pack ">
                            Referral Code
                        </div>
                        <div class="package-price">
                            <div class="py-5">
                            <input wire:model="codesend" type="text" class="login-inputs" placeholder="Enter Here Referral Code">
                            </div>
                        </div>
                        <div class="package-detail-bar2 px-2">
                            <span>Full Access to</span>
                            <p>International Job (Previw Only)</p>
                            <p>The Bridge Live:Video & Interviews</p>
                        </div>
                       <div class="package-detail-buy1">
                           <button wire:click.prevent="subscribeCode()">Subscribe</button>
                       </div>
                   </div>
                </form>
                </div> 


            <div class="col-lg-4 col-md-6 col-12 p-5 animate__animated animate__backInDown ">
                    <div class="main-body-package black">
                        <div class="package-level-pack">
                            BASIC
                        </div>
                        <div class="package-price">
                            <div style="justify-content:end" class="pakage-head-div">
                                <span>$</span> 
                            </div>
                            <div class="pakage-head-div">
                                <h1>20</h1> 
                            </div>
                            <div style="justify-content:start" class="pakage-head-div">
                                <span>/One Time</span>
                            </div>
                        </div>
                        <div class="package-detail-bar2 px-2">
                            <span>Full Access to</span>
                            <p>International Job (Previw Only)</p>
                            <p>The Bridge Live:Video & Interviews</p>
                        </div>
                       <div class="package-detail-buy1">
                       <button wire:click="subscribe(1)">Buy Now</button>
                       </div>
                   </div>
                </div> 
                


                



                <div class="col-lg-4 col-md-6 col-12 p-5 animate__animated animate__backInRight">
                   <div class="main-body-package yellow">
                        <div class="package-level-pack">
                            VIP
                        </div>
                        <div class="package-price">
                            <div style="justify-content:end" class="pakage-head-div">
                                <span>$</span> 
                            </div>
                            <div class="pakage-head-div">
                                <h1>100</h1> 
                            </div>
                            <div style="justify-content:start" class="pakage-head-div">
                                <span>/One Time</span>
                            </div>
                        </div>
                        <div class="package-detail-bar2 px-2">
                            <span>Full Access to</span>
                            <p>International Job (Previw Only)</p>
                            <p>The Bridge Live:Video & Interviews</p>
                            <p>The Bridge Live:Video & Interviews</p>
                            <p>The Bridge Live:Video & Interviews Live</p>
                            <p>The Interviews Bridge Live:Video & Interviews</p>
                            <p>The Bridge Live:Video & Interviews Bridge</p>
                        </div>
                        <div class="package-detail-buy1">
                        <button wire:click="subscribe(2)">Buy Now</button>
                       </div>
                   </div>
                </div> 





                <div class="container d-flex alitgn-items-center justify-content-center pt-5 text-center">
            <p>Having a personalized dashboard means getting your hands on the most exciting features. A member can generate referral links, earn unlimited shopping points, win bonus points, buy Jimta coins, and much more. Get ready to make the most out of Jimta by subscribing to our valuable packages. By subscribing to a plan using a referral link, the member get 10% of the bonus point</p>
        </div>
            </div>
        </div>
    </div>
    <!-- body -->
</div>
