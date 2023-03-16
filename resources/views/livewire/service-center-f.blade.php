<div>
<div class="container-fluid py-4 seconery-nav p-0">
        <div class="container h-100">
            <div class="col-12 h-100 d-flex align-items-center">
                <a href="">Home</a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="">Service Center</a>
            </div>
        </div>
    </div>
  
    <div class="user-welcome container-fluid">
        <div class="container">
            <div class="row py-5 d-flex-column align-items-center justify-content-center flex-column complusory-header-inner-page">
                <h1>Service Center</h1>
                <form>
                <select class="form-control" id="exampleFormControlSelect1" wire:model="ser_id">
                <option>Select</option>
        @foreach($service_user as $su)
        <option value="{{$su->id}}">{{$su->first_name}}</option>
        @endforeach
    </select>
    <button wire:click.prevent="getDetail()" class="btn btn-dark">Get Location</button>
    <button wire:click.prevent="defaultServiceCenter()" class="btn btn-dark">Make this a default Service Center</button>
    </form>
            </div>
        </div>
    </div>
    <!-- body -->
    <div class="container-fluid confirm-order responsive-p-m p-5">
        <div class="container">
        <iframe width="100%" height="100%" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=52.70967533219885, -8.020019531250002&amp;q={{$this->location}}&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
    </div>
</div>
