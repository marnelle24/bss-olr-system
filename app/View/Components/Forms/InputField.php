<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class InputField extends Component
{
    public $inputKey;
    public $label;
    public $type;
    public $placeholder;
    public $required;
    public $class;
    public $maxlength;
    public $value;

    public function __construct($inputKey, $label, $type = 'text', $placeholder = null, $required = false, $class = null, $maxlength = null, $value = null)
    {
        $this->inputKey = $inputKey;
        $this->label = $label;
        $this->type = $type;
        $this->placeholder = $placeholder ?? $label;
        $this->required = $required;
        $this->class = $class;
        $this->maxlength = $maxlength;
    }

    public function render()
    {
        return view('components.forms.input-field');
    }
}