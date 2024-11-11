<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;

class Form extends Component
{
    public $id;
    public $name;
    public $slug;

    protected $listeners = [
        'getSelectedCategory' => 'loadSelectedCategory'
    ];

    public function loadSelectedCategory($value)
    {
        $this->id = $value['id'];
        $this->name = $value['name'];
        $this->slug = $value['slug'];
    }

    public function save()
    {
        $this->validate(
            [
                'name' => 'required|min:4',
                'slug' => 'nullable',
            ],
            [
                'name.required' => 'Name must not empty.',
                'name.min' => 'Name is too short',
            ]
        );

        // Data to be updated or created
        Category::updateOrCreate(
            [ 
                'id' => $this->id
            ], 
            [
                'name' => $this->name,
                'slug' => isset($this->slug) ? $this->slug : null
            ]
        );

        $this->resetForm();
        $this->dispatch('greenAlert', message: 'Changes saved successfully.');

    }

    public function resetForm()
    {
        $this->id = '';
        $this->name = '';
        $this->slug = '';
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.admin.category.form');
    }
}
