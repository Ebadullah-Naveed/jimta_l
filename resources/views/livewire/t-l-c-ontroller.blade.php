<div>
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Transfer Log</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                  <thead>
            <tr>
                <th>Transfer From</th>
                <th>Transfer To</th>
                <th>Amount</th>
                <th>Source</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tl as $product)
            <tr class="child-row">
                <td>{{ App\Models\User::where('id',$product->user_id)->value('first_name'); }}</td>
                <td>{{ App\Models\User::where('id',$product->transfer_to)->value('first_name'); }}</td>
                <td>{{$product->amount}}</td>
                <td>{{$product->source}}</td>
          </tr>
            @endforeach
        </tbody>
                  </table>
                  {{ $tl->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

</div>
