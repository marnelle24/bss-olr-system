<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use App\Models\Registrant;
use App\Services\PaymentService;

class RegistrantDetails extends Component
{
    public $showModal = false;
    public $id;
    public $registrant;
    public $registrantEvent;
    public $paymentDetails = [];

    // public function mount()
    // {
    //     $this->showModal = true;
    //     $this->id = 20;
    //     $this->openModal();
    // }

    public function openModal()
    {
        $this->registrant = Registrant::where('id', $this->id)
            ->with('event')
            ->first();

        if($this->registrant)
            $this->paymentDetails = (new PaymentService)->paymentDetails($this->registrant->paymentReferenceNo);

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
