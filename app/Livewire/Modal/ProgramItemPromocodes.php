<?php

namespace App\Livewire\Modal;

use Livewire\Component;

class ProgramItemPromocodes extends Component
{
    public $showModal = false;
    public $programCode;

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.modal.program-item-promocodes');
    }
}
