<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class TextareaField extends Component
{
    public $inputKey;
    public $label;
    public $placeholder;
    public $required;
    public $rows;

    public function __construct($inputKey, $label, $placeholder = null, $required = false, $rows = 4)
    {
        $this->inputKey = $inputKey;
        $this->label = $label;
        $this->placeholder = $placeholder ?? $label;
        $this->required = $required;
        $this->rows = $rows;
    }

    public function render()
    {
        return view('components.forms.textarea-field');
    }
}