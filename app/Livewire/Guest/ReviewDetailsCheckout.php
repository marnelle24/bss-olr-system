<?php

namespace App\Livewire\Guest;

use Livewire\Component;

class ReviewDetailsCheckout extends Component
{
    public $programItem;

    public function mount($programItem)
    {
        $this->programItem = json_decode($programItem);
    }

    public function render()
    {
        return view('livewire.guest.review-details-checkout');
    }
}
