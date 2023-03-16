<div>
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Investment Packages</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
         
    @if($updateMode)
    @include('livewire.investment.update')
    @else
    @include('livewire.investment.create')
    @endif
                  <table class="table tablesorter " id="">
                  <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Status</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($investments as $investment)
            <tr class="child-row">
                <td>{{ $investment->id }}</td>
                <td>{{ $investment->title }}</td>
                <td>{{ $investment->description }}</td>
                <td>{{ $investment->price }}</td>
                @if($investment->status == 1)
                <td>
                    <button wire:click="changeStatus({{ $investment->id }},{{$investment->status}})" class="btn btn-success btn-sm">Active</button>
                </td>
                @else
                <td>
                    <button wire:click="changeStatus({{ $investment->id }},{{$investment->status}})" class="btn btn-danger btn-sm">In-Active</button>
                </td>
                @endif
                <td>
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $investment->id }})" class="btn btn-primary btn-sm">Edit</button>                    
                <!-- @if($confirming==$investment->id)
                    <button wire:click="kill({{ $investment->id }})"
                        class="btn btn-danger btn-sm">Sure?</button>
                @else
                    <button wire:click="confirmDelete({{ $investment->id }})"
                        class="btn btn-dark btn-sm">Delete</button>
                @endif -->
                </td>
          </tr>
            @endforeach
        </tbody>
                  </table>
                  {{ $investments->links() }}
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
</div>
