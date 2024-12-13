<?php

namespace App\Livewire\Modal;

use Livewire\Component;

class RegistrationFormModal extends Component
{
    public $programItem = [];
    public $showModal = false;
    public $step = 1;
    public $totalSteps = 4;
    public $loadedComponents = [];


    // testing
    public $hiddenFields = [];
    public $requiredFields = [];

    protected $listeners = [
        // 'setProgramCode' => 'openModal',
        'setProgramCode' => 'getProgramItem',
        'triggerStepChange' => 'changeStep'
    ];

    public function mount()
    {
        // Initialize first component
        $this->loadedComponents[1] = true;
        $this->openModal();
        $this->getProgramItem('EYHY2022', 'event');
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

    public function openModal()
    {
        $this->showModal = true;
    }

    public function getProgramItem($programCode, $programType)
    {
        $model = 'App\Models\Program_' . $programType;
        $program_item = $model::where('programCode', $programCode)->first();
        $this->programItem = collect($program_item)->toArray();
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
