<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use App\Livewire\Forms\PromotionForm;

class AddUpdatePromotionModal extends Component
{
    // Form for handling promotion data
    public PromotionForm $form;

    // Modal visibility
    public $showModal = false;

    // Button label
    public $buttonLabel = 'Add Promotion';

    // Program code
    public $programCode;

    // Promotion data
    public $promotion;

    // Listen for Edit Promotion event
    protected $listeners = [
        'editPromotion' => 'updateProgramItemPromotion'
    ];

    // Update the promotion data
    public function updateProgramItemPromotion($promotion)
    {
        $this->promotion = $promotion;
        $this->openModal();
        $this->form->setPromotion($promotion);
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

    // Submit the form for adding or updating a promotion
    public function submit()
    {
        if(!is_null($this->promotion))
        {
            $this->form->update($this->promotion['id']);
            $this->dispatch('successUpdatePromotion');
        }
        else
        {
            $this->form->store($this->programCode);
            $this->dispatch('successAddPromotion');
        }

        // reset the form
        $this->form->resetForm();

        // close the modal
        $this->closeModal();

    }

    // Render the component
    public function render()
    {
        return view('livewire.modal.add-update-promotion-modal');
    }
}
