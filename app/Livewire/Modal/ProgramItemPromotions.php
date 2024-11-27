<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use App\Models\Promotion;

class ProgramItemPromotions extends Component
{
    // Program code
    public $programCode;

    // Modal visibility
    public $showModal = false;

    // Promotions
    public $promotions = [];

    // listen for Create & Update Promotion events
    protected $listeners = [
        'successAddPromotion' => 'refreshPromotions',
        'successUpdatePromotion' => 'refreshUpdatedPromotions'
    ];

    // trigger to refresh promotions after updating
    public function refreshUpdatedPromotions()
    {
        $this->openModal();
        $this->dispatch('greenAlert', message:'Promotion updated successfully');
    }

    // trigger to refresh promotions after adding
    public function refreshPromotions()
    {
        $this->openModal();
        $this->dispatch('greenAlert', message:'Promotion added successfully');
    }

    // Open the modal and fetch promotions related to the program code
    public function openModal()
    {
        $this->promotions = Promotion::where('programCode', $this->programCode)->get();
        $this->showModal = true;
    }

    // Close the modal
    public function closeModal()
    {
        $this->showModal = false;
    }

    // Delete a promotion
    public function deletePromotion($id)
    {
        Promotion::find($id)->delete();
        $this->openModal();
        $this->dispatch('redAlert', message:'Promotion deleted successfully');
    }

    // Edit a promotion
    public function editPromotion($promotion)
    {
        $this->dispatch('editPromotion', promotion:$promotion);
    }
        
    // Render the component
    public function render()
    {
        return view('livewire.modal.program-item-promotions');
    }
}
