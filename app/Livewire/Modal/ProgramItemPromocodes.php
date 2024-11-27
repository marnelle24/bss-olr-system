<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use App\Models\Promocode;

class ProgramItemPromocodes extends Component
{
    // Modal visibility
    public $showModal = false;

    // Program code
    public $programCode;

    // Promocodes
    public $promoCodes = [];

    // listen for Create & Update Promocode events
    protected $listeners = [
        'successAddPromocode' => 'refreshPromocodes',
        'successUpdatePromocode' => 'refreshUpdatedPromocodes'
    ];

    // trigger to refresh promocodes after adding
    public function refreshPromocodes()
    {
        $this->openModal();
        $this->dispatch('greenAlert', message:'Promocode added successfully');
    }

    // trigger to refresh promocodes after updating
    public function refreshUpdatedPromocodes()
    {
        $this->openModal();
        $this->dispatch('greenAlert', message:'Promocode updated successfully');
    }

    // Open the modal and fetch promocodes related to the program code
    public function openModal()
    {
        $this->promoCodes = Promocode::where('programCode', $this->programCode)->get();
        $this->showModal = true;
    }

    // Close the modal
    public function closeModal()
    {
        $this->showModal = false;
    }

    // Delete a promocode
    public function deletePromocode($id)
    {
        Promocode::find($id)->delete();
        $this->openModal();
        $this->dispatch('redAlert', message:'Promotion deleted successfully');
    }

    // Edit a promocode
    public function editPromocode($promocode)
    {
        $this->dispatch('editPromocode', promocode:$promocode);
    }

    // Render the component
    public function render()
    {
        return view('livewire.modal.program-item-promocodes');
    }
}
