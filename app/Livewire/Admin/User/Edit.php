<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use App\Livewire\Forms\UserForm;

class Edit extends Component
{
    public $user_id;

    public UserForm $form;

    protected $listeners = [
        'getUserPartners' => 'loadSelectedPartners'
    ];

    public function loadSelectedPartners($value)
    {
        $this->form->userform['selectedPartners'] = $value;
    }

    public function mount()
    {
        $user = User::find($this->user_id);

        if(!$user)
            return redirect()->route('admin.users.new');

        $this->form->setUser($user);
    }

    public function submit()
    {
        $this->form->userID = $this->user_id;
        $this->form->update();
    }

    public function render()
    {
        return view('livewire.admin.user.form');
    }
}
