<div>
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Post</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                @if($updateMode)
    @include('livewire.post.update')
    @else
    @include('livewire.post.create')
    @endif
                  <table class="table tablesorter " id="">
                  <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Body</th>
                <th>Author</th>
                <th>Status</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr class="child-row">
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->author }}</td>
                @if($post->status == 1)
                <td>
                    <button wire:click="changeStatus({{ $post->id }},{{$post->status}})" class="btn btn-success btn-sm">Active</button>
                </td>
                @else
                <td>
                    <button wire:click="changeStatus({{ $post->id }},{{$post->status}})" class="btn btn-danger btn-sm">In-Active</button>
                </td>
                @endif
                <td>
                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $post->id }})" class="btn btn-primary btn-sm">Edit</button>                    
                @if($confirming==$post->id)
                    <button wire:click="kill({{ $post->id }})"
                        class="btn btn-danger btn-sm">Sure?</button>
                @else
                    <button wire:click="confirmDelete({{ $post->id }})"
                        class="btn btn-dark btn-sm">Delete</button>
                @endif
                </td>
          </tr>
            @endforeach
        </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
{{ $posts->links() }}
</div>
