<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use App\Livewire\Forms\PromotionForm;

class AddUpdatePromotionModal extends Component
{
    public PromotionForm $form;
    public $showModal = false;
    public $programCode;
    public $promotion;

    protected $listeners = [
        'editPromotion' => 'updateProgramItemPromotion'
    ];

    public function updateProgramItemPromotion($promotion)
    {
        $this->promotion = $promotion;
        $this->openModal();
        $this->form->setPromotion($promotion);

    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

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

    public function render()
    {
        return view('livewire.modal.add-update-promotion-modal');
    }
}
