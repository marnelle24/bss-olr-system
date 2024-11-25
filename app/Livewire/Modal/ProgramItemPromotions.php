<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use App\Models\Promotion;

class ProgramItemPromotions extends Component
{
    public $programCode;
    public $showModal = false;
    public $promotions = [];


    protected $listeners = [
        'successAddPromotion' => 'refreshPromotions',
        'successUpdatePromotion' => 'refreshUpdatedPromotions'
    ];

    public function refreshUpdatedPromotions()
    {
        $this->openModal();
        $this->dispatch('greenAlert', message:'Promotion updated successfully');
    }

    public function refreshPromotions()
    {
        $this->openModal();
        $this->dispatch('greenAlert', message:'Promotion added successfully');
    }

    // FOR TESTING & DEBUGGING
    // public function mount()
    // {
    //     $this->promotions = Promotion::where('programCode', $this->programCode)->get();
    //     $this->showModal = true;
    // }

    public function openModal()
    {
        $this->promotions = Promotion::where('programCode', $this->programCode)->get();
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function deletePromotion($id)
    {
        Promotion::find($id)->delete();
        $this->openModal();
        $this->dispatch('redAlert', message:'Promotion deleted successfully');
    }

    public function editPromotion($promotion)
    {
        $this->dispatch('editPromotion', promotion:$promotion);
    }
        
    public function render()
    {
        return view('livewire.modal.program-item-promotions');
    }
}
