<?php

namespace App\Livewire\Guest\Form;

use Livewire\Component;

class InputFieldManager extends Component
{
    public $inputKey;
    public $label;
    public $type;
    public $required;
    public $value;
    public $placeholder;
    public $maxlength;
    public $class;

    protected $listeners = ['updateFormValue' => 'updateFormValue'];

    // listen to any changes in the value property
    public function updateFormValue($data)
    {
        if ($data['key'] === $this->inputKey) {
            $this->value = $data['value'];
        }
    }

    // dispatch the updateFormValue event to the parent component
    public function updatedValue($value)
    {
        $this->dispatch('updateFormValue', ['key' => $this->inputKey, 'value' => $value]);
    }

    public function render()
    {
        return view('livewire.guest.form.input-field-manager');
    }
}