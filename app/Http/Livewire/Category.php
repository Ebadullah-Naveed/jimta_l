<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProductCategory;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Category extends Component
{
    use WithPagination;
    public $title, $type, $slug,$category_id;
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
      
        if(auth()->user()->is_subscriber == 1)
        {
            return view('livewire.category.category', [
                'categorys' => ProductCategory::paginate(4),
            ]);
        }
        else
        {
            abort(403, 'Please Subscribe to view this page');
        }
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->title = '';
        $this->type = '';
        $this->slug = '';
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
            'type' => 'required',
        ]);

        $validatedDate['slug'] = strtolower(str_replace(" ", "-",$this->title));
  
        ProductCategory::create($validatedDate);
  
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"category Store Successfully!!"
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
        $category = ProductCategory::findOrFail($id);
        $this->category_id = $id;
        $this->title = $category->title;
        $this->type = $category->type;
        $this->slug = $category->slug;
  
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
            'type' => 'required',
        ]);
  
        $category = ProductCategory::find($this->category_id);
        $category->update([
            'title' => $this->title,
            'type' => $this->type,
            'slug' => strtolower(str_replace(" ", "-",$this->title)),
        ]);
  
        $this->updateMode = false;
  
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"category Updated Successfully!!"
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
        ProductCategory::destroy($id);
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"category Deleted Successfully!!"
        ]);
    }
}
