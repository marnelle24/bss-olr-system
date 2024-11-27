<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Promotion;
use Livewire\Attributes\Validate;

class PromotionForm extends Form
{
    public $id;
    public $title;
    public $description;
    public $startDate;
    public $endDate;
    public $price;
    public $status;

    protected $rules = [
        'title'             => 'required|min:5',
        'description'       => 'nullable',
        'startDate'         => 'date',
        'endDate'           => 'date|after:startDate',
        'price'             => 'required|numeric|min:0',
    ];

    protected $messages = [
        'title.required'    => 'Title must not be empty.',
        'title.min'         => 'Title too short.',
        'price.required'    => 'Price must not be empty.',
        'price.numeric'     => 'Price must be a number.',
        'price.min'         => 'Price must be greater than 0.',
        'startDate.date'    => 'Invalid date.',
        'endDate.date'      => 'Invalid date.',
        'endDate.after'     => 'Must not be before start date.',
    ];

    public function setPromotion($promotion)
    {
        $this->id           = $promotion['id'];
        $this->title        = $promotion['title'];
        $this->description  = $promotion['description'];
        $this->startDate    = $promotion['startDate'];
        $this->endDate      = $promotion['endDate'];
        $this->price        = $promotion['price'];
        $this->status       = $promotion['isActive'];
    }

    public function store($programCode)
    {
        $validatedData = $this->validate();

        $data = [
            'programCode'   => $programCode,
            'title'         => $validatedData['title'],
            'description'   => $validatedData['description'],
            'startDate'     => $validatedData['startDate'],
            'endDate'       => $validatedData['endDate'],
            'price'         => $validatedData['price'],
            'isActive'      => $this->status ? 1 : 0,
            'createdBy'     => auth()->user()->firstname . ' ' . auth()->user()->lastname
        ];

        Promotion::create($data);
    }

    public function update($id)
    {
        $validatedData = $this->validate();

        $data = [
            'title'         => $validatedData['title'],
            'description'   => $validatedData['description'],
            'startDate'     => $validatedData['startDate'], 
            'endDate'       => $validatedData['endDate'],
            'price'         => $validatedData['price'],
            'isActive'      => $this->status ? 1 : 0,
        ];

        Promotion::find($this->id)->update($data);
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetValidation();
    }
}
