<?php

namespace App\Livewire\Guest\Form;

use Livewire\Component;

class ContactNumberManager extends Component
{
    public $isInternational;
    public $countryCode = '+65';
    public $contactNumber = null;
    public $inputKey;
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
        $this->value = $value . '-' . $this->contactNumber;
        $this->dispatch('updateFormValue', ['key' => $this->inputKey, 'value' => $this->value]);
    }

    public function updatedContactNumber($value)
    {
        $this->value = $this->countryCode . '-' . $value;
        $this->dispatch('updateFormValue', ['key' => $this->inputKey, 'value' => $this->value]);
    }

    public function render()
    {
        return view('livewire.guest.form.contact-number-manager');
    }
}
