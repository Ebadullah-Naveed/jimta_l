<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
   
class Posts extends Component
{
   
    use WithPagination;
    public $title, $body, $author,$post_id;
    public $updateMode = false;
    public $confirming;
    protected $paginationTheme = 'bootstrap';
    use AuthorizesRequests;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        if(auth()->user()->is_admin == 1)
        {
            return view('livewire.post.posts', [
                'posts' => Post::paginate(4),
            ]);
        }
        else
        {
            abort(404);
        }
      
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->title = '';
        $this->body = '';
        $this->author = '';
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'body' => 'required',
            'author' => 'required',
        ]);
  
        Post::create($validatedDate);
  
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Post Store Successfully!!"
        ]);
  
        $this->resetInputFields();

        $this->emit('userStore');
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->body = $post->body;
        $this->author = $post->author;
  
        $this->updateMode = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'body' => 'required',
            'author' => 'required',
        ]);
  
        $post = Post::find($this->post_id);
        $post->update([
            'title' => $this->title,
            'body' => $this->body,
            'author' => $this->author,
        ]);
  
        $this->updateMode = false;
  
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Post Updated Successfully!!"
        ]);
        $this->resetInputFields();

        $this->emit('userUpdate');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        Post::destroy($id);
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Post Deleted Successfully!!"
        ]);
    }

    public function changeStatus($id,$status)
    {
        if($status == 0)
        {
        Post::where('id',$id)->update([
            'status' => 1,
        ]);
        }
        else
        {
        Post::where('id',$id)->update([
            'status' => 0,
        ]);
        }
  
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Status Updated Successfully!!"
        ]);
    }
}
