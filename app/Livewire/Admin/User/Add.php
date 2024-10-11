<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;
use App\Livewire\Forms\UserForm;

class Add extends Component
{
    public UserForm $form;

    protected $listeners = [
        'getUserPartners' => 'loadSelectedPartners'
    ];

    public function loadSelectedPartners($value)
    {
        $this->form->userform['selectedPartners'] = $value;
    }

    public function resetForm()
    {
        $this->form->resetForm();
    }

    public function submit()
    {
        $this->form->store();
    }

    public function render()
    {
        return view('livewire.admin.user.form');
    }
}
