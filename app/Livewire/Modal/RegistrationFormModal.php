<?php

namespace App\Livewire\Modal;

use Livewire\Component;

class RegistrationFormModal extends Component
{
    public $getPromotion;
    public $programItem = [];
    public $showModal = false;

    protected $listeners = ['openRegistrationModal' => 'openModal'];

    public function openModal($promotion, $programType)
    {
        $this->getPromotion = $promotion;
        $model = 'App\Models\Program_' . $programType;
        $this->programItem = $model::where('programCode', $this->getPromotion['programCode'])->first();
        // dump($this->programItem);

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->getPromotion = null;
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.modal.registration-form-modal');
    }
}
