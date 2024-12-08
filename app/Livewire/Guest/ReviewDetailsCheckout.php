<?php

namespace App\Livewire\Guest;

use Livewire\Component;

class ReviewDetailsCheckout extends Component
{
    public $registrationForm;
    public $promoCodeForm;
    public $additionalFieldsForm;

    public function render()
    {
        return view('livewire.guest.review-details-checkout');
    }
}
