<div>
  <style>
    .modal.show .modal-dialog {
    -webkit-transform: translate(0, 30%);
    transform: translate(0, 2%) !important;
}
  </style>
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Register Service Center</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                @if($updateMode)
    @include('livewire.service.update')
    @else
    @include('livewire.service.create')
    @endif
                  <table class="table tablesorter " id="">
                  <thead>
            <tr>
                <th>No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Country</th>
                <th>City</th>
                <th>Total Orders</th>
                <th>Orders value</th>
                @if(auth()->user()->is_admin == 1)
                <th>Status</th>
                @endif
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="child-row">
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->country }}</td>
                <td>{{ $user->city }}</td>
                <td>{{$this->getTotalOrder(\App\Models\ServiceCenter::where('user_id',$user->id)->value('id'))}}</td>
                <td>{{$this->getTotal(\App\Models\ServiceCenter::where('user_id',$user->id)->value('id'))}}</td>
                @if(auth()->user()->is_admin == 1)
                @if($user->status == 1)
                <td>
                    <button wire:click.prevent="changeStatus({{$user->id}},{{$user->status}})" class="btn btn-success btn-sm">Active</button>
                </td>
                @elseif($user->status == 0)
                <td>
                    <button wire:click.prevent="changeStatus({{$user->id}},{{$user->status}})" class="btn btn-dark btn-sm">In-Active</button>
                </td>
                @else
                <td>
                    <button wire:click.prevent="changeStatus({{$user->id}},{{$user->status}})" class="btn btn-danger btn-sm">Banned</button>
                </td>
                @endif
                @endif
                <td>
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $user->id }})" class="btn btn-primary btn-sm">Edit/View</button>      
                </td>
          </tr>
            @endforeach
        </tbody>
                  </table>
                  {{ $users->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
</div>
