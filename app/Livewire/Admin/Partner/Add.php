<?php

namespace App\Livewire\Admin\Partner;

use Livewire\Component;
use App\Livewire\Forms\PartnerForm;

class Add extends Component
{
    public PartnerForm $partner;

    public function submit()
    {
        $this->partner->store();
    }

    public function resetForm()
    {
        $this->partner->resetForm();
    }
    
    public function render()
    {
        return view('livewire.admin.partner.single');
    }
}
