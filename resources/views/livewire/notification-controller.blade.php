@if(auth()->user()->is_admin == 1)
<div>
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-body">
                    <h2>Notification</h2>
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Message:</label>
                        <input type="text" id="message" class="form-control" id="exampleFormControlInput1" placeholder="Enter Message" wire:model="message">
                        @error('message') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    
                    <button wire:click.prevent="sendNotification()" id="notCreate" class="btn btn-success">Create</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
     
</div>

@endif
