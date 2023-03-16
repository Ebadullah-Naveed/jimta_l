<div>
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">code</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">   
    @if(auth()->user()->is_admin == 1) 
    @include('livewire.code.create')
    @endif
                  <table class="table tablesorter " id="">
                  <thead>
            <tr>
                <th>No.</th>
                <th>level</th>
                <th>code</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($codes as $code)
            <tr class="child-row">
                <td>{{ $code->id }}</td>
                @if($code->level == 1)
                <td><p>$20 Package</p></td>
                @elseif($code->level == 2)
                <td><p>$100 Package</p></td>
                @endif
                <td>{{ $code->code }}</td>
                @if($code->status == 1)
                <td>
                    <button class="btn btn-success btn-sm">Unused</button>
                </td>
                @else
                <td>
                    <button class="btn btn-danger btn-sm">Used</button>
                </td>
                @endif
          </tr>
            @endforeach
        </tbody>
                  </table>
                  {{ $codes->links() }}

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

</div>
