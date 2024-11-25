<?php

namespace App\Livewire;

use Livewire\Component;

class ToggleBooleanCheckbox extends Component
{
    public $model;
    public $field;
    public $value;

    public function mount()
    {
        $this->value = $this->model->{$this->field};
    }

    public function updatedValue($value)
    {
        $this->model->{$this->field} = $value;
        $this->model->save();

        if($value)
            $this->dispatch('greenAlert', message:'Record updated to active');
        else
            $this->dispatch('redAlert', message:'Record updated to inactive');
    }

    public function render()
    {
        return view('livewire.toggle-boolean-checkbox');
    }
}
