<div wire:ignore.self>
<div class="container-fluid py-4 seconery-nav p-0">
        <div class="container h-100">
            <div class="col-12 h-100 d-flex align-items-center">
                <a href="">Home</a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="">Account</a>
            </div>
        </div>
    </div>

    <div class="user-welcome container-fluid">
        <div class="container">
            <div class="row py-5 d-flex-column align-items-center justify-content-center flex-column complusory-header-inner-page">
                <h1>User Account</h1>
                <p class="User-Name">{{auth()->user()->first_name}}</p>
            </div>
        </div>
    </div>
    <div class="container-fluid responsive-p-m p-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">My Profile</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Order</a>
                      </div>
                </div>
                <div class="col-lg-9 col-md-6 col-12 py-5">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active p-3" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                           <div class="Profile-main p-4">
                               <div class="row align-items-center justify-content-start">
                                   <div class="col-lg-4 my-1 col-12 d-flex flex-column align-items-start px-4">
                                        Full Name
                                        <hr class="my-1">
                                        <span>{{auth()->user()->first_name}}</span>
                                   </div>
                                   <hr class="">
                                   <div class="col-lg-4 my-1 col-12 d-flex flex-column align-items-start px-4">
                                        email
                                        <hr class="my-1">
                                        <span>{{auth()->user()->email}}</span>
                                    </div>
                                   <hr>
                                    <div class="col-lg-4 my-1 col-12 d-flex flex-column align-items-start px-4">
                                        Number
                                        <hr class="my-1">
                                        <span>{{auth()->user()->phone_number}}</span>
                                    </div>
                               </div>
                               <div class="row align-items-center justify-content-start">
                               <div class="col-lg-4 my-1 col-12 d-flex flex-column align-items-start px-4">
                                        Country
                                        <hr class="my-1">
                                        <span>{{auth()->user()->country}}</span>
                                    </div>
                                    @if(auth()->user()->is_subscriber == 1)
                                    <div class="col-lg-4 my-1 col-12 d-flex flex-column align-items-start px-4">
                                        Referal Link
                                        <hr class="my-1">
                                        <span>https://jimta.org/user/referal/{{auth()->user()->id}}</span>
                                    </div>
                                    @endif
                               </div>

                           </div>
                           
                        </div>
                        <div class="tab-pane fade p-3 table-responsive" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <p>Your Recent Order</p>
                            <table class="table cart-table">
                                <thead>
                                  <tr>
                                    <th scope="col">Order Id</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Delivery</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Verification Code</th>
                                    <th scope="col">Invoice</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($order as $o)
                                  <tr>
                                    <td scope="row">
                                        <p>#{{$o->id}}</p>
                                    </td>
                                    <td>{{$o->total}}$</td>
                                    <td>
                                        @if($o->payment_id != null)
                                        <button class="btn btn-sm btn-success">Paid</button>
                                        @endif
                                    </td>
                                    <td>
                                    <p style="color: red;">{{$o->delivery}}</p>
                                    </td>
                                    <td>
                                        {{App\Models\OrderToDelivery::where('order_id',$o->id)->value('status')}}
                                    </td>
                                    <td>
                                        {{App\Models\OrderToDelivery::where('order_id',$o->id)->value('verification_code')}}
                                    </td>
                                    <td>
                                        <a href="{{ route('downloadinvoice', $o->id) }}">Invoice</a>
                                    </td>
                                  </tr>
                                @endforeach
                                </tbody>
                              </table>
                        </div>
                      </div>
                
                </div>
            </div>
        </div>
    </div>        
</div>

