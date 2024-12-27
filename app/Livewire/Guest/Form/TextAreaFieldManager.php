<?php

namespace App\Livewire\Guest\Form;

use Livewire\Component;

class TextAreaFieldManager extends Component
{
    public $inputKey;
    public $label;
    public $placeholder;
    public $required;
    public $rows;
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
    public function updatedValue($value)
    {
        $this->dispatch('updateFormValue', ['key' => $this->inputKey, 'value' => $value]);
    }

    public function render()
    {
        return view('livewire.guest.form.text-area-field-manager');
    }
}
