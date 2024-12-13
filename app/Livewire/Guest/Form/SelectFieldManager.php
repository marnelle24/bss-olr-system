<?php

namespace App\Livewire\Guest\Form;

use Livewire\Component;

class SelectFieldManager extends Component
{
    public $inputKey;
    public $label;
    public $options;
    public $required;
    public $value;

    public function render()
    {
        return view('livewire.guest.form.select-field-manager');
    }
}
