<?php

namespace App\Livewire\Admin\Partner;

use App\Models\Partner;
use Livewire\Component;

class SelectPartner extends Component
{
    public $selectedPartner = null;
    public $partners;
    public $s_partners = [];

    public $userPartners;

    public function mount()
    {
        $this->partners = Partner::all();

        $this->s_partners = $this->userPartners;
    }

    public function updateselectedPartner($value)
    {
        // check if already exist in the selected items
        if ($value && !in_array($value, $this->s_partners)) 
        {
            $this->s_partners[] = $value;
            $this->dispatch('getUserPartners', $this->s_partners);
        }
    }

    public function removePartner($partnerID)
    {
        // Remove the role from the selectedRoles array
        $this->s_partners = array_filter($this->s_partners, function($id) use ($partnerID) {
            return $id != $partnerID;
        });

        $this->dispatch('getUserPartners', $this->s_partners);
    }

    public function render()
    {
        return view('livewire.admin.partner.select-partner');
    }
}
