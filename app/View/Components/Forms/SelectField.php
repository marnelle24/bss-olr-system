<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class SelectField extends Component
{
    public $inputKey;
    public $label;
    public $placeholder;
    public $options;
    public $required;

    public function __construct($inputKey, $label, $options, $placeholder = null, $required = false)
    {
        $this->inputKey = $inputKey;
        $this->label = $label;
        $this->options = $options;
        $this->placeholder = $placeholder ?? $label;
        $this->required = $required;
    }

    public function render()
    {
        return view('components.forms.select-field');
    }
}