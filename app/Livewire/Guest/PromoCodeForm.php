<?php

namespace App\Livewire\Guest;

use Livewire\Component;

class PromoCodeForm extends Component
{
    public $programCode;
    public function render()
    {
        return view('livewire.guest.promo-code-form');
    }
}
