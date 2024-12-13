<?php

namespace App\Livewire\Guest\Form;

use Livewire\Component;

class RadioFieldManager extends Component
{
    public $inputKey;
    public $label;
    public $type;
    public $options;
    public $required;
    public $value;

    public function render()
    {
        return view('livewire.guest.form.radio-field-manager');
    }
}
