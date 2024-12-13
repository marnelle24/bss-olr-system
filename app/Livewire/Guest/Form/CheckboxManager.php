<?php

namespace App\Livewire\Guest\Form;

use Livewire\Component;

class CheckboxManager extends Component
{
    public $selectedOptions = [];
    public $inputKey;
    public $label;
    public $type;
    public $options;
    public $required;
    
    public function mount()
    {
        $this->selectedOptions = [];
    }
    
    public function render()
    {
        return view('livewire.guest.form.checkbox-manager');
    }
}
