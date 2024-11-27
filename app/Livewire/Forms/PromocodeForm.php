<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Promocode;
use Livewire\Attributes\Validate;

class PromocodeForm extends Form
{
    public $id;
    public $promocode;
    public $startDate;
    public $endDate;
    public $price;
    public $maxUses;
    public $usedCount;
    public $status;

    protected $rules = [
        'promocode'         => 'required|min:5',
        'startDate'         => 'date',
        'endDate'           => 'date|after:startDate',
        'price'             => 'required|numeric|min:0',
        'maxUses'           => 'required|numeric',
    ];

    protected $messages = [
        'promocode.required'     => 'Code must not be empty.',
        'promocode.min'          => 'Code too short.',
        'price.required'         => 'Price must not be empty.',
        'price.numeric'          => 'Price must be a number.',
        'price.min'              => 'Price must be greater than 0.',
        'startDate.date'         => 'Invalid date.',
        'endDate.date'           => 'Invalid date.',
        'endDate.after'          => 'Must not be before start date.',
        'maxUses.required'       => 'Max Uses must not be empty.',
        'maxUses.numeric'        => 'Max Uses must be a number.',
    ];

    public function setPromocode($promocode)
    {
        $this->id = $promocode['id'];
        $this->promocode = $promocode['promocode'];
        $this->startDate = $promocode['startDate'];
        $this->endDate = $promocode['endDate'];
        $this->price = $promocode['price'];
        $this->maxUses = $promocode['maxUses'];
        $this->status = $promocode['isActive'];
    }

    public function store($programCode)
    {
        $validatedData = $this->validate();

        $data = [
            'programCode'   => $programCode,
            'promocode'     => $validatedData['promocode'],
            'startDate'     => $validatedData['startDate'],
            'endDate'       => $validatedData['endDate'],
            'price'         => $validatedData['price'],
            'maxUses'       => $validatedData['maxUses'],
            'isActive'      => $this->status ? 1 : 0,
            'createdBy'     => auth()->user()->firstname . ' ' . auth()->user()->lastname
        ];

        Promocode::create($data);
    }

    public function update($id)
    {
        $validatedData = $this->validate();

        $data = [
            'promocode'     => $validatedData['promocode'],
            'startDate'     => $validatedData['startDate'],
            'endDate'       => $validatedData['endDate'],
            'price'         => $validatedData['price'],
            'maxUses'       => $validatedData['maxUses'],
            'isActive'      => $this->status ? 1 : 0,
        ];

        Promocode::find($this->id)->update($data);
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetValidation();
    }
}
