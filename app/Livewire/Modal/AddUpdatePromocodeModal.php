<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use App\Livewire\Forms\PromocodeForm;

class AddUpdatePromocodeModal extends Component
{
    // Form for handling promocode data
    public PromocodeForm $form;

    // Modal visibility
    public $showModal = false;

    // Button label
    public $buttonLabel = 'Add Promo Code';

    // Program code
    public $programCode;

    // Promocode data
    public $promocode;

    // Listen for Edit Promocode event
    protected $listeners = [
        'editPromocode' => 'updateProgramItemPromocode'
    ];

    // Update the promocode data
    public function updateProgramItemPromocode($promocode)
    {
        $this->promocode = $promocode;
        $this->openModal();
        $this->form->setPromocode($promocode);
    }

    // Open the modal
    public function openModal()
    {
        $this->form->resetForm();
        $this->showModal = true;
    }

    // Close the modal
    public function closeModal()
    {
        $this->showModal = false;
    }

    // Submit the form for adding or updating a promocode
    public function submit()
    {
        if(!is_null($this->promocode))
        {
            $this->form->update($this->promocode['id']);
            $this->dispatch('successUpdatePromocode');
        }
        else
        {
            $this->form->store($this->programCode);
            $this->dispatch('successAddPromocode');
        }

        // Close the modal
        $this->closeModal();
        
        // Reset the form
        $this->form->resetForm();
    }
    
    // Render the component
    public function render()
    {
        return view('livewire.modal.add-update-promocode-modal');
    }
}
