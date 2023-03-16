@include('layouts.header')
    <div class="container-fluid py-4 seconery-nav p-0">
        <div class="container h-100">
            <div class="col-12 h-100 d-flex align-items-center">
                <a href="">Home</a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="">Cart</a>
            </div>
        </div>
    </div>
    <div class="user-welcome container-fluid">
        <div class="container">
            <div class="row py-5 d-flex-column align-items-center justify-content-center flex-column complusory-header-inner-page">
                <h1>Cart</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid cart-item-table p-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-12 table-responsive">
                    <table class="table  cart-responsive-table">
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
        @if(session('cart'))
       
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                <td scope="row" data-th="Product">
                                <div class="d-flex align-items-center">
                                    <div class="cart-item-image">
                                        <img class="img-fluid" src="{{asset('storage/'.$details['image'])}}" alt="">
                                    </div>
                                    <h6 class="ml-2">{{ $details['name'] }}</h6>
                                </div>
                </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                    <td>
                        <a href="{{route('remove.from.cart')}}" class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o text-light"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
                        </tbody>
                      </table>
                </div>













                
                <div class="col-lg-3 col-md-12 col-12 p-0 responsive-mt-m">
                    <div class="cart-total-session p-4">
                        <h6>Cart Total</h6>
                        <hr>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6>Subtotal</h6>
                            <h6>{{$total}}</h6>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="{{route('checkout')}}" class="Proceed-To-Checkout">Proceed To Checkout</a>
                        </div>
                    </div>
                    <a href="#" class="Continue-shoping">Continue Shopping <i class="fa fa-refresh ml-2" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')     
    <script>
   $(document).ready(function () {
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
   });
</script>