<div>
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Category</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                @if($updateMode)
    @include('livewire.category.update')
    @else
    @include('livewire.category.create')
    @endif
                  <table class="table tablesorter " id="">
                  <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Type</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorys as $category)
            <tr class="child-row">
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->type }}</td>
                <td>
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $category->id }})" class="btn btn-primary btn-sm">Edit</button>                    
                @if($confirming==$category->id)
                    <button wire:click="kill({{ $category->id }})"
                        class="btn btn-danger btn-sm">Sure?</button>
                @else
                    <button wire:click="confirmDelete({{ $category->id }})"
                        class="btn btn-dark btn-sm">Delete</button>
                @endif
                </td>
          </tr>
            @endforeach
        </tbody>
                  </table>
                  {{ $categorys->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
</div>
