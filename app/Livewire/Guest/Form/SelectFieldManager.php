<?php

namespace App\Livewire\Guest\Form;

use Livewire\Component;

class SelectFieldManager extends Component
{
    public $inputKey;
    public $label;
    public $type;
    public $options;
    public $required;
    public $value;

    protected $listeners = ['updateFormValue' => 'updateFormValue'];
    
    public function updateFormValue($data)
    {
        if ($data['key'] === $this->inputKey) {
            $this->value = $data['value'];
        }
    }

    // listen to any changes in the value property
    public function updatedValue($value)
    {
        $this->dispatch('updateFormValue', [
            'key' => $this->inputKey, 
            'value' => $value
        ]);
    }

    public function render()
    {
        return view('livewire.guest.form.select-field-manager');
    }
}
