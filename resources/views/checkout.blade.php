@include('layouts.header')
<style>
    :root{
    --fonts:'Poppins', sans-serif;
    --base-color:#ebb700;
    --secondary-color:#1d1d1d;
    --nav-color:#dadada;
}
   .dark_color{
       color:var(--base-color) !important; 
   }
   .Proceed-To-Checkout{
        background-color: var(--base-color);
        border: 1px solid var(--base-color);
        width: 100%;
        color:white !important;
        cursor: pointer;
        padding-block: 7px;
        border-radius: 4px;
        display: flex;
        transition: 0.4s all;
        align-items: center;
        justify-content: center;
        outline: none;
        text-decoration: none;
    }
        .Proceed-To-Checkout:hover{
        color: white;
        border: 1px solid white;
        width: 100%;
        outline: none;
        text-decoration: none;
        background-color: var(--base-color);
        padding-block: 7px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
<div class="container-fluid py-4 seconery-nav p-0">
        <div class="container h-100">
            <div class="col-12 h-100 d-flex align-items-center">
                <a href="">Home</a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="">Checkout</a>
            </div>
        </div>
    </div>
    <div class="user-welcome container-fluid">
        <div class="container">
            <div class="row py-5 d-flex-column align-items-center justify-content-center flex-column complusory-header-inner-page">
                <h1>Checkout</h1>
            </div>
        </div>
    </div>
    <!-- body -->
    <div class="container-fluid confirm-order p-5 responsive-p-m">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12 table-responsive">
                    <table class="table ">
                        <thead>
                          <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                        @php $total = 0 @endphp
                            @if(session('checkout'))
                                @foreach(session('checkout') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                    <tr data-id="{{ $id }}">
                                    <td scope="row" data-th="Product">
                                                    <div class="d-flex align-items-center">
                                                        <div class="cart-item-image">
                                                            <img class="img-fluid" src="{{asset('storage/'.$details['image'])}}" alt="" width="100">
                                                        </div>
                                                        <h6 class="ml-2">{{ $details['name'] }}</h6>
                                                    </div>

                                    </td>


                                        <td data-th="Price">${{ $details['price'] }}</td>
                                        <td data-th="Quantity" class="">
                                           {{ $details['quantity'] }}
                                        </td>
                                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                      </table>
                      </div>
                <div class="col-lg-3 col-md-12 col-12 py-0 px-2 responsive-mt-m">
                    <div class="cart-total-session p-0">
                        <h6>Cart Total</h6>
                        <hr>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6>Subtotal</h6>
                            <h6>{{$total}}$</h6>
                        </div>
                        <hr>
                        <h6>Shipping:</h6>
                        <div class="mt-3">
                            <!-- <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <input type="radio" name="delivery" value="99" class="mr-1">Home Delivery:
                                </div>
                                @php {{$charges = App\Models\DeliveryCharges::limit(1)->value('charges');}} @endphp
                                <h6 class="m-0 cart-shipping-total">{{$charges}}$</h6>
                        </div> -->
                        @if(auth()->user()->service_center_id != null)
                        <div class="d-flex align-items-center justify-content-between pt-3">
                                <div class="d-flex align-items-center">
                                    <input type="radio" name="delivery" value="0" class="mr-1">Service Center:
                                </div>
                                <div class="d-flex align-items-center justify-content-end">
                                    <h6 class="m-0 cart-shipping-total dark_color">{{$sc_user->first_name}}</h6><br>
                                </div>
                        </div>
                        @else
                        
                        <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                <a href="{{route('servicecenterf')}}" class="m-0 cart-shipping-total dark_color">Select Service Center</a>
                                </div>
                        </div>
                        @endif
                        <div class="d-flex align-items-center justify-content-start pt-3">
                                    <a href="{{route('servicecenterf')}}" class="m-0 cart-shipping-total dark_color">Change Service Center</a>
                                </div>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 >Super Total</h6>
                            <h6 class="dark_color">{{$total}}$</h6>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center justify-content-center">
                            <!-- <a href="{{route('checkout')}}" class="Proceed-To-Checkout">Proceed To Checkout</a> -->
                            <a id="checkout-jimta" class="Proceed-To-Checkout"  style="cursor:pointer">Pay with jimta coin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- body -->
    @include('layouts.footer')
    <script>
        $( document ).ready(function() {
            $("#checkout-jimta").on("click",function(e) 
            {
                e.preventDefault();
                Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Order it!'
}).then((result) => {
  if (result.isConfirmed) {
    var a = $("input[name=delivery]:checked").val();
        window.location.href = "/wallet/checkout/{{$total}}/"+a+""
  }
});
    });
        
});
    </script>