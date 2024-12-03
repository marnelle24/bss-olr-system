<?php

namespace App\Livewire\Modal;

use Livewire\Component;

class RegistrationForm extends Component
{
    public $promotion;
    public $programItem = [];
    public $showModal = false;

    protected $listeners = ['openRegistrationModal' => 'openModal'];

    public function openModal($promotion, $programType)
    {
        $this->promotion = $promotion;
        $model = 'App\Models\Program_' . $programType;
        $this->programItem = $model::where('programCode', $this->promotion['programCode'])->first();
        // dump($this->programItem);

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.modal.registration-form');
    }
}
