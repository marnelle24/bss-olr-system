<?php

namespace App\Livewire\Guest;

use Livewire\Component;

class PromoCodeForm extends Component
{
    public $programItem;

    public function mount($programItem)
    {
        $this->programItem = json_decode($programItem);
    }

    public function render()
    {
        return view('livewire.guest.promo-code-form');
    }
}
