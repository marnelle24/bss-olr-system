<?php

namespace App\Livewire\Admin\Partner;

use App\Models\Partner;
use Livewire\Component;
use App\Livewire\Forms\PartnerForm;

class Single extends Component
{
    public $partnerSlug;

    public PartnerForm $partner;

    public function mount()
    {
        // get the partner information by querying to the DB based on URL param slug
        $partner = Partner::where('slug', '=', $this->partnerSlug)->first();

        // redirect to list of partners if no record found. 
        //(When someone manually change the URL param slug randomly and the slug is not exists in the DB)
        if(!$partner)
            return redirect()->route('admin.partner.new');
        
        // pass to the Partner Form
        $this->partner->setPartner($partner);
    }

    public function submit()
    {
        $this->partner->update($this->partner);
        
        $this->dispatch('greenAlert', message:'Partners updated successfully');
    }

    public function resetForm()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.partner.single');
    }
}
