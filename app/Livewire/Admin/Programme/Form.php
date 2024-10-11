<?php

namespace App\Livewire\Admin\Programme;

use App\Models\Program;
use Livewire\Component;

class Form extends Component
{
    public $form = [
        'id' => '',
        'name' => '',
        'slug' => '',
        'status' => false
    ];

    protected $listeners = [
        'getSelectedProgramme' => 'loadSelectedProgramme'
    ];

    public function loadSelectedProgramme($value)
    {
        $this->form['id'] = $value['id'];
        $this->form['name'] = $value['name'];
        $this->form['slug'] = $value['slug'];
        $this->form['status'] = $value['status'] ? true : false;
    }

    public function save()
    {
        $this->validate(
            [
                'form.name' => 'required|min:4',
                'form.slug' => 'nullable',
                'form.status' => 'nullable'
            ],
            [
                'form.name.required' => 'Name must not empty.',
                'form.name.min' => 'Name is too short',
            ]
        );

        // Data to be updated or created
        Program::updateOrCreate(
            [ 
                'id' => $this->form['id'] 
            ], 
            [
                'name' => $this->form['name'],
                'slug' => isset($this->form['slug']) ? $this->form['slug'] : null,
                'status' => $this->form['status']
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
        return view('livewire.admin.programme.form');
    }
}
