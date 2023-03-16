  <!--Modal-->
  <div wire:ignore.self class="modal fade" id="refmodal" tabindex="-1" role="dialog" aria-labelledby="refmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="refmodalLabel">Your Referrers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
  <thead>
    <tr>
    <th style="color:black" scope="col">User ID</th>
      <th style="color:black" scope="col">User Name</th>
      <th style="color:black" scope="col">Email</th>
      <th style="color:black" scope="col">Type</th>
    </tr>
  </thead>
  <tbody>
  @foreach($this->user_referer as $o)

    <tr>
         <td>
          <p>{{$o->id}}</p>
         </td>
         <td>
         <p>{{$o->first_name}}</p>
         </td>
         <td>
         <p>{{$o->email}}</p>
         </td>
         <td>
           @if($o->level == 1)
           <p>Basic</p>
           @else
           <p>VIP</p>
           @endif
         </td>
    </tr>
    @endforeach
                                </tbody>
                              </table>
                              </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--Modal-->