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

    public function render()
    {
        return view('livewire.guest.form.input-field-manager');
    }
}
