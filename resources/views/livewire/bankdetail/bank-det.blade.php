<div>
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Bank Details</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
         
                @if($updateMode)
    @include('livewire.bankdetail.update')
    @else
    @include('livewire.bankdetail.create')
    @endif
                  <table class="table tablesorter " id="">
                  <thead>
            <tr>
                <th>No.</th>
                <th>User Name</th>
                <th>Bank Name</th>
                <th>Account Number</th>
                <th>Account Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banks as $bank)
            <tr class="child-row">
                <td>{{ $bank->id }}</td>
                <td>{{ App\Models\User::where('id',$bank->user_id)->value('first_name') }}</td>
                <td>{{ $bank->bank_name }}</td>
                <td>{{ $bank->account_number }}</td>
                <td>{{ $bank->account_title }}</td>
                <td>
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $bank->id }})" class="btn btn-primary btn-sm">Edit</button>                    
                </td>
          </tr>
            @endforeach
        </tbody>
                  </table>
                  {{ $banks->links() }}
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
</div>
