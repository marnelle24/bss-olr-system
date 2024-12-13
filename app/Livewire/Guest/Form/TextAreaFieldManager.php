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

    public function render()
    {
        return view('livewire.guest.form.text-area-field-manager');
    }
}
