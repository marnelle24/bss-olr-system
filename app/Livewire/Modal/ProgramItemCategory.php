<?php

namespace App\Livewire\Modal;

use App\Models\Program_event;
use Livewire\Component;
use App\Models\Category;

class ProgramItemCategory extends Component
{
    // Props
    public $programCode;
    public $programCategories = [];

    public $showModal = false;
    public $allCategories = [];

    public $selectedCategory = null;


    public function mount()
    {
        $this->allCategories = Category::all();

    }

    public function updateSelectedCategory($value)
    {
        // check if already exist in the selected items
        if ($value && !in_array($value, Collect($this->programCategories)->pluck('id')->toArray())) 
        {
            $this->programCategories[] = $this->allCategories->find($value);
        }
    }

    // Remove Category in the list
    public function removeCategory($categoryID)
    {
        $this->programCategories = array_filter(collect($this->programCategories)->toArray(), 
            function($category) use ($categoryID) {
                return $category['id'] != $categoryID;
            }
        );
    }

    //  Store the updated categories to database
    public function storeUpdatedCategories()
    {
        //  Update the program categories
        $program = Program_event::where('programCode', $this->programCode)->first();

        if ($program)
        {
            $program->categories()->sync(collect($this->programCategories)->pluck('id'));
            session()->flash('success', 'Categories updated successfully.');
            redirect()->route('admin.event-profile', $this->programCode);
        }
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }


    public function render()
    {
        return view('livewire.modal.program-item-category');
    }
}
