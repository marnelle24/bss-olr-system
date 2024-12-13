<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class CheckboxField extends Component
{
    public $inputKey;
    public $label;
    public $type;
    public $options;
    public $required;

    public function __construct($inputKey, $label, $type, $options, $required = false)
    {
        $this->inputKey = $inputKey;
        $this->label = $label;
        $this->type = $type;
        $this->options = $options;
        $this->required = $required;
    }

    public function render()
    {
        return view('components.forms.checkbox-field');
    }
}