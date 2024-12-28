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
    public $programCode;
    public $totalPromotions;
    public $label;

    public $hasPromotion = false;
    public $countPromotions;

    public function mount()
    {
        $this->programCode = request()->segment(2);
        $this->hasPromotion = isset($this->promotion);
        $this->countPromotions = isset($this->totalPromotions) ? $this->totalPromotions : 0;
    }

    public function selectedPromotion($data)
    {
        // $this->dispatch('promotionSelected', $promotion)->to(ReviewDetailsCheckout::class);
        $this->dispatch('openRegistrationFormModal', [
            'promotion' => $data,
            'programCode' => $data ? $data['programCode'] : $this->programCode,
            'programType' => $this->programType
        ]); // dispatch to RegistrationFormModal
    }

    public function render()
    {
        return view('livewire.promotion-card');
    }
}
