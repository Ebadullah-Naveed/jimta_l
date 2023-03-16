  <!--Modal-->
  <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
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