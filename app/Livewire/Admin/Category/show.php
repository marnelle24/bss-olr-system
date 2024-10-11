<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use App\Livewire\Admin\Category\Form;

class Show extends Component
{
    use WithPagination;
    
    public $search;
    protected $listeners = ['greenAlert' => 'refreshComponent'];

    #[Computed]
    public function categories()
    {
        return Category::latest()
            ->where('name', 'like', "%{$this->search}%")
            ->paginate(8);
    }

    public function selectCategory($category)
    {
        $this->dispatch('getSelectedCategory', $category);
    }

    public function deleteCategory( $categoryID )
    {
        $category = Category::find($categoryID);
        $category->delete();
        $this->dispatch('redAlert', message: 'Category has been removed.');
        //$category->categories()->detach($streategyId);
    }

}
