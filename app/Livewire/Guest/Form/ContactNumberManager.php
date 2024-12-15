<?php

namespace App\Livewire\Guest\Form;

use Livewire\Component;

class ContactNumberManager extends Component
{
    public $isInternational;
    public $countryCode = null;
    public $contactNumber = null;
    public $label;
    public $type;
    public $placeholder;
    public $class;
    public $required;
    public $maxlength;
    public $value;

    public function mount()
    {
        $this->countryCode = '+65';
        
        if($this->isInternational) {
            $this->value = $this->countryCode . '-' . $this->contactNumber;
        } else {
            $this->value = $this->contactNumber;
        }
    }

    public function updatedCountryCode($value)
    {
        if($this->isInternational) {
            $this->value = $value . '-' . $this->contactNumber;
        } else {
            $this->value = $this->contactNumber;
        }
    }

    public function updatedContactNumber($value)
    {
        if($this->isInternational) {
            $this->value = $this->countryCode . '-' . $value;
        } else {
            $this->value = $value;
        }
    }

    public function render()
    {
        return view('livewire.guest.form.contact-number-manager');
    }
}
