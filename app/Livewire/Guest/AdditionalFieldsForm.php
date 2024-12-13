<?php

namespace App\Livewire\Guest;

use Livewire\Component;

class AdditionalFieldsForm extends Component
{
    public $programItem; // props
    public $extraFields;
    public $extraFieldsValues;

    public function mount($programItem) 
    {
        try {
            $this->programItem = json_decode($programItem, true); // decode as array
            
            if (json_last_error() !== JSON_ERROR_NONE) 
            {
                throw new \Exception('Invalid JSON data');
            }

            // Initialize extraFields only if it exists
            if (isset($this->programItem['extraFields'])) 
            {
                $this->extraFields = json_decode($this->programItem['extraFields'], true);
                
                if (json_last_error() !== JSON_ERROR_NONE) 
                {
                    throw new \Exception('Invalid extraFields JSON data');
                }
            } else {
                $this->extraFields = [];
            }

            // Initialize extraFieldsValues as empty array
            $this->extraFieldsValues = [];

        } 
        catch (\Exception $e) {
            // Handle the error - maybe log it
            $this->programItem = [];
            $this->extraFields = [];
            $this->extraFieldsValues = [];
        }
    }

    // public function updatedExtraFieldsValues($value)
    // {
    //     dump($value);
    // }

    // public function checkAdditionalFieldsForm()
    // {
    //     dump($this->extraFieldsValues);

    //     $this->dispatch('triggerStepChange', 3);
    // }

    public function checkAdditionalFieldsForm()
    {
        // dump($this->extraFieldsValues);

        $this->dispatch('triggerStepChange', 3);
    }

    public function render()
    {
        return view('livewire.guest.additional-fields-form');
    }
}
