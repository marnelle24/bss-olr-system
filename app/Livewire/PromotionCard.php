<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\URL;

class PromotionCard extends Component
{
    public $promotion;
    public $programType;
    public $totalPromotions;
    public $label;

    public function selectedPromotion($promotion)
    {
        $this->dispatch('openRegistrationModal', $promotion, $this->programType);
    }

    public function render()
    {
        return view('livewire.promotion-card');
    }
}
