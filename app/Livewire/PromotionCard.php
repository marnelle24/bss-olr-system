<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\URL;
use App\Livewire\Modal\RegistrationFormModal;
use App\Livewire\Guest\ReviewDetailsCheckout;

class PromotionCard extends Component
{
    public $promotion;
    public $programType;
    public $totalPromotions;
    public $label;

    public function selectedPromotion($promotion)
    {
        // $this->dispatch('promotionSelected', $promotion)->to(ReviewDetailsCheckout::class);
        $this->dispatch('setProgramCode', $promotion['programCode'], $this->programType); // dispatch to RegistrationFormModal
    }

    public function render()
    {
        return view('livewire.promotion-card');
    }
}
