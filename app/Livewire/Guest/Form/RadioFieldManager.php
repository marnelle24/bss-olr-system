<?php

namespace App\Livewire\Guest\Form;

use Livewire\Component;
use Livewire\Attributes\On;

class RadioFieldManager extends Component
{
    public $inputKey;
    public $label;
    public $type;
    public $options;
    public $required;
    public $value;

    protected $listeners = ['updateFormValue' => 'updateFormValue'];

    // listen to any changes in the value property
    public function updateFormValue($data)
    {
        if ($data['key'] === $this->inputKey) {
            $this->value = $data['value'];
        }
    }

    // update the form value and dispatch to the parent component
    public function updatedValue()
    {
        $this->dispatch('updateFormValue', [
            'key' => $this->inputKey, 
            'value' => $this->value
        ]);
    }

    public function render()
    {
        return view('livewire.guest.form.radio-field-manager');
    }
}
