<?php

namespace App\Livewire\Guest\Form;

use Livewire\Component;

class CheckboxManager extends Component
{
    public $selectedOptions = [];
    public $inputKey;
    public $label;
    public $type;
    public $options;
    public $required;

    // protected $listeners = ['updateFormValue' => 'updateFormValue'];

    public function mount()
    {
        $this->selectedOptions = [];
    }

    // listen to any changes in the value property
    // public function updateFormValue($data)
    // {
    //     $this->selectedOptions = $data['value'];
    // }

    // update the form value and dispatch to the parent component
    public function updatedSelectedOptions()
    {   
        $this->dispatch('updateFormValue', [
            'key' => $this->inputKey, 
            'value' => $this->selectedOptions
        ]);
    }

    public function render()
    {
        return view('livewire.guest.form.checkbox-manager');
    }
}
