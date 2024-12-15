<?php

namespace App\Livewire\Modal;

use Livewire\Component;

class RegistrationFormModal extends Component
{
    public $programItem = [];
    public $showModal = false;
    public $step = 1;
    public $totalSteps = 4;
    public $isInternational = false;
    public $contacNumberLabel;
    
    // fields in json
    public $hiddenFields = [];
    public $requiredFields = [];
    public $extraFields = [];


    // to be deleted
    public $loadedComponents = [];

    protected $listeners = [
        // 'setProgramCode' => 'openModal',
        'setProgramCode' => 'getProgramItem',
        'triggerStepChange' => 'changeStep'
    ];

    public function mount()
    {
        $this->getProgramItem('EYHY2022', 'event');
        if($this->isInternational)
        {
            $this->contacNumberLabel = 'International Contact Number';
        }
        else
        {
            $this->contacNumberLabel = 'Contact Number';
        }

        // Initialize first component
        $this->loadedComponents[1] = true;
        $this->openModal();
        
    }

    public function changeStep($step)
    {
        $this->step = $step;
        // Load component for the selected step if not already loaded
        $this->loadedComponents[$step] = true;
    }

    public function nextStep()
    {
        if ($this->step < $this->totalSteps) {
            $this->step++;
            // Preload next component
            $this->loadedComponents[$this->step] = true;
        }
    }

    public function prevStep()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function getProgramItem($programCode, $programType)
    {
        $model = 'App\Models\Program_' . $programType;
        $program_item = $model::where('programCode', $programCode)->first();
        $this->programItem = collect($program_item)->toArray();
        
        $settings = json_decode($this->programItem['settings']);
        $this->hiddenFields = $settings->addHidden;
        // $this->requiredFields = $settings->addRequired; // FOR LIVE
        $this->requiredFields = ['nric', 'title', 'firstName', 'lastName', 'email', 'contactNumber']; // FOR TESTING

        // Get the extra fields in the order of the order field
        $extra_fields = json_decode($this->programItem['extraFields']);
        $extra_fields = collect($extra_fields)->sortBy('order');
        $this->extraFields = $extra_fields;

        $this->showModal = true;
    }

    public function getFormFieldAttributes($settings)
    {
        $formSettings = json_decode($settings);
        return $formSettings;
        // $this->hiddenFields = $this->programItem['hiddenFields'];
        // $this->requiredFields = $this->programItem['requiredFields'];
    }














    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        // Reset loaded components when modal is closed
        $this->loadedComponents = [1 => true];
        $this->step = 1;
    }

    public function render()
    {
        return view('livewire.modal.registration-form-modal');
    }
}
