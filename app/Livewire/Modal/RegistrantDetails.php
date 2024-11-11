<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use App\Models\Registrant;

class RegistrantDetails extends Component
{
    public $showModal = false;
    public $id;
    public $registrant;

    public function openModal()
    {
        $this->registrant = Registrant::findOrFail($this->id);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.modal.registrant-details');
    }
}
