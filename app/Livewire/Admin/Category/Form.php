<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;

class Form extends Component
{
    public $form = [
        'id' => '',
        'name' => '',
        'slug' => '',
    ];

    protected $listeners = [
        'getSelectedCategory' => 'loadSelectedCategory'
    ];

    public function loadSelectedCategory($value)
    {
        $this->form['id'] = $value['id'];
        $this->form['name'] = $value['name'];
        $this->form['slug'] = $value['slug'];
    }

    public function save()
    {
        $this->validate(
            [
                'form.name' => 'required|min:4',
                'form.slug' => 'nullable',
            ],
            [
                'form.name.required' => 'Name must not empty.',
                'form.name.min' => 'Name is too short',
            ]
        );

        // Data to be updated or created
        Category::updateOrCreate(
            [ 
                'id' => $this->form['id'] 
            ], 
            [
                'name' => $this->form['name'],
                'slug' => isset($this->form['slug']) ? $this->form['slug'] : null
            ]
        );

        $this->resetForm();
        $this->dispatch('greenAlert', message: 'Changes saved successfully.');

    }

    public function resetForm()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.admin.category.form');
    }
}
