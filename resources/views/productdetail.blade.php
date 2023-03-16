@include('layouts.header')

<style>
    .slick-track a{
        width:0px !important;
    }
</style>
                    <div class="card-body p-0">
                    <div class="container-fluid py-4 seconery-nav p-0">
        <div class="container h-100">
            <div class="col-12 h-100 d-flex align-items-center">
                <a href="">Home</a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="">Products</a>
            </div>
        </div>
    </div>
    <div class="user-welcome container-fluid my-4">
        <div class="container">
            <div class="row py-5 d-flex-column align-items-center justify-content-center flex-column complusory-header-inner-page">
                <h1>Product Detail</h1>
            </div>
        </div>
    </div>
    <div class="pro-detail-main container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-6 col-12 prodetail-main-image">
                    <div class="row">
                        <div class="col-lg-2 responsive-none p-0">
                            @foreach($pg as $images)
                            <div class="pro-detail-main-thumbnail-side">
                                <!-- <div class="pro-detail-main-thumbnail-side-overlay"></div> -->
                                <a href="{{asset('storage/'.$images->image)}}" data-lightbox="mygallery">
                                    <img src="{{asset('storage/'.$images->image)}}">
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-lg-10 col-12 img-magnifier-container pro-detail-main-thumbnail">
                        <a href="{{asset('storage/'.$product->product_main_image)}}" data-lightbox="mygallery">
                                    <img id="myimage" style="height: 100%;width: 100%;" src="{{asset('storage/'.$product->product_main_image)}}">
                                </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-6 col-12 px-4 py-0 pro-detail-text-area">
                    <h4>{{$product->title}}</h4>
                  
                    <h3>${{$product->price}}</h3>
                    <div class="pro-detail-text-area-description">
                        <p>{{$product->description}}</p>
                    </div>
                    <div class="d-flex mt-4 align-items-center quantity">
                        <h6 class="m-0">Quantity: </h6>
                        <input name="quantity" value="1" type="number">
                    </div>
                    <div class="d-flex align-items-center justify-content-start py-4 pro-deta-opration">
                        <a id="cart" class="pro-detail-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add To Cart</a>
                    </div>
                    <hr class="mt-0">
                    <div class="d-flex mt-2 align-items-center quantity">
                        <h6 class="m-0">Category: </h6><p class="mb-0 ml-2">{{App\Models\ProductCategory::where('id',$product->category_id)->value('title')}}</p>
                    </div>
                </div>  
            </div>
        </div>
    </div>

    <!-- large screen product===================================================================== -->
    <div class="slider-product container-fluid py-4" style="background: #eeeeec ;">
        <div class="container">
            <div class="container d-flex align-items-center justify-content-center">
                <div class="col-lg-3 col-md-6 col-12 text-center">
                    <h1 class="section-heading">Hot Product</h1>
                </div>
            </div>
            <div class="simple-carasol2">
                @foreach($ph as $products)
                    <div class="col-lg-4 col-md-6 col-12 product-card p-3">
                        <div class="image-side">
                            <img class="img-fluid" src="{{asset('storage/'.$products->product_main_image)}}" alt="">
                        </div>
                        <div class="image-text-absolute1">
                            <h6>
                                <a class="text-dark" href="{{route('product.detail',$products->slug)}}" wire.click="mount($products->slug)">{{$products->title}}</a>
                            </h6>
                            <p>{{$products->price}}</p>
                            <div class="d-flex">
                                <button wire:click="addToCart({{$products->id,1}})" class="b-1">Add To Cart</button>
                                <button class="b-2"><a href="{{route('add.to.checkout',$products->id)}}">Buy Now</button>
                            </div>
                        </div>
                </div>
                    @endforeach
            </div>
        </div>
    </div>
    </div>

                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        showCloseButton: true,
        timer: 5000,
        timerProgressBar:true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    window.addEventListener('alert',({detail:{type,message}})=>{
        Toast.fire({
            icon:type,
            title:message
        })
    })
</script> 

                    @include('layouts.footer')       
<script>
$(document).ready(function(){
$("#cart").click(function(){
    var a = $("input[name=quantity]").val();
        window.location.href = "/add-to-cart/{{$product->id}}/"+a+""
});
});
</script>  
   
