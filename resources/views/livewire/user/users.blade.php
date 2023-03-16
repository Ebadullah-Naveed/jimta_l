<div>
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Users</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                @if($updateMode)
    @include('livewire.user.update')
    @else
    @include('livewire.user.create')
    @endif
    @if($this->user_referer != null)
  @include('livewire.ref-list')
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
                <th>Subscriber</th>
                <th>Subscriber Type</th>
                <th>Status</th>
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
               <td>{{$user->city}}</td>
               @if($user->is_subscriber == 1)
               <td>
                 <button class="btn btn-success btn-sm">Yes</button>
               </td>
               @else
               <td>
                 <button class="btn btn-danger btn-sm">No</button>
               </td>
               @endif
               @if($user->level == 1)
               <td>
                 <button class="btn btn-success btn-sm">Basic</button>
               </td>
               @elseif($user->level == 2)
               <td>
                 <button class="btn btn-success btn-sm">VIP</button>
               </td>
               @else
               <td>
               <button class="btn btn-success btn-sm">-</button>
               </td>
               @endif
               @if(auth()->user()->is_admin == 1)
                @if($user->status == 1)
                <td>
                    <button wire:click="changeVerification({{ $user->id }},{{$user->status}})" class="btn btn-success btn-sm">Verified</button>
                </td>
                @else
                <td>
                    <button wire:click="changeVerification({{ $user->id }},{{$user->status}})" class="btn btn-danger btn-sm">Un Verified</button>
                </td>
                @endif
                @else
                @if($user->status == 1)
                <td>
                    <button class="btn btn-success btn-sm">Verified</button>
                </td>
                @else
                <td>
                    <button class="btn btn-danger btn-sm">Un Verified</button>
                </td>
                @endif
                @endif
                <td>
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $user->id }})" class="btn btn-primary btn-sm">Edit</button>                    
               @if(auth()->user()->is_admin == 1)
                @if($confirming===$user->id)
                    <button wire:click="kill({{ $user->id }})"
                        class="btn btn-danger btn-sm">Sure?</button>
                @else
                    <button wire:click="confirmDelete({{ $user->id }})"
                        class="btn btn-dark btn-sm">Delete</button>
                @endif
                @endif
                <button wire:click.prevent="referalCheck({{$user->id}})" type="button" data-toggle="modal" data-target="#refmodal" class="btn btn-sm btn-success">Referals</button>
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
