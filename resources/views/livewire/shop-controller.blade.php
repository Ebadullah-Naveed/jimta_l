<div>
    <style>
        .Box-of-Price_img img{
            height:250px
        }

        @media screen and (max-width: 995px) {
            .Box-of-Price_img img{
            height:400px
            }
        }
    </style>
    <!-- second-header -->
    <div class="user-welcome container-fluid">
        <div class="container">
            <div class="row py-5 d-flex-column align-items-center justify-content-center flex-column complusory-header-inner-page">
                <h1>Jimta Products</h1>
            </div>
        </div>
</div>
    <div class="plisting">
        <div class="container">
            <div class="row">
                <!-- Prodcut Filtering -->
                <div class="col-md-3 filter-border">
                    <div class="filter-window">
                        <h4>Filter Your Products</h4>
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-head" id="headingFour">
                                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">
                                        Categories
                                    </h2>
                                </div>
                                <div id="collapseFour" aria-labelledby="headingFour"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="select-categories pt-1">
                                            <div class="w-100">
                                                @foreach($pc as $key=>$p)
                                                <div class="d-flex align-items-center mx-2">
                                                    <input class="mr-1" type="radio" value="{{$p->id}}" wire:model="cat_filter" name="{{$key}}" id="">
                                                    {{$p->title}}
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-head" id="headingNine">
                                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseNine"
                                        aria-expanded="false" aria-controls="collapseNine">
                                        Price
                                    </h2>
                                </div>
                                <div id="collapseNine" aria-labelledby="headingNine"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="select-categories pt-1">
                                            <div class="d-flex w-100">
                                                <div class="w-100 ">
                                                    <div class="d-flex align-items-center">
                                                        <input class="mr-1" type="range" name="" id="" max="250" wire:model="max_price">
                                                        {{$this->max_price}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="Filter_Confirm_Button">Apply Filter</button>
                        </div>
                    </div>
                </div>
                <!-- Prodcut Listing -->
                <div class="col-md-9 bradcramb">
                    <div class="Box-of-Price_nav d-flex align-items-center justify-content-between py-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            <p class="mb-0 ml-1">New Search</p>
                        </div>
                    </div>
                    <div class="Box-of-Price_nav_result">
                        <p>We found <span>{{$productcount}}</span> products</p>
                    </div>
                    <div class="row">
                        @foreach($product as $pro)
                        <div class="col-lg-4 col-md-6 col-12 mb-6 d-flex p-3">
                        <a style="width:100%" href="{{route('product.detail',$pro->id)}}" class="pro-name" >
                            <div class="Box-of-Price w-100">
                                <div class="d-flex flex-column">
                                    <div class="Box-of-Price_img flex-column d-flex">
                                        <img class="w-100"  src="{{asset('storage/'.$pro->product_main_image)}}" alt="">
                                    </div>
                                </div>
                                <div class="Box-of-Price_data text-center p-4">
                                    <p class="pro-cate m-2">
                                        {{$pro->category}}
                                    </p>
                                    <h6 class="pro-name m-2">
                                        {{$pro->title}}
                                    </h6>
                                    <h6 class="pro-price m-2">
                                        {{$pro->price}}$
                                    </h6>
                                </div>
                            </div>
                            </a> 
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
<div class="container-fluid d-flex align-items-center justify-content-center pagination">
    <nav aria-label="Page navigation example">
       {{$product->links()}}
      </nav>
</div>
</div>
