<div>
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Confirm Delivery</h4>
              </div>
              <div class="card-body">
              <form>
    <div class="form-group">
    <label for="exampleFormControlInput1">Enter Verification Code:</label>
    <input style="color:white !important" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Verficiation Code" wire:model="vc">
    @error('vc') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="getOrder()" class="btn btn-dark">Get</button>
</form>
<h3>Order Details</h3>
@if($this->order != null)
<p>User Name : {{App\Models\User::where('id',$this->order['user_id'])->value('first_name')}}</p>
<p>Amount : {{$this->order['total']}}</p>
@if($this->order['payment_id'] != null)
<p>Bill : Paid</p>
@endif
@endif
<h3>Items</h3>
@if($this->product != null)
<table class="table">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
    </tr>
  </thead>
  <tbody>
  @foreach($this->product as $o)

    <tr>
    <td> <img src="{{asset('storage/'.$o->product_main_image)}}" width="100" alt=""></td>
                                    <td>
                                     <p>{{$o->title}}</p>
                                    </td>
                                    <td>
                                    <p>{{$o->price}}</p>
                                    </td>
                                    <td>
                                    <p>{{App\Models\OrderItem::where('order_id',$this->order['id'])->where('product_id',$o->id)->value('quantity')}}</p>
                                    </td>
    </tr>
    @endforeach
                                </tbody>
                              </table>
@endif
<button wire:click="delivered()" class="btn btn-lg btn-success">Delivered</button>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
