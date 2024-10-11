<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use App\Models\Partner;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class UserForm extends Form
{
    public $userID;

    public $userform = [
        'firstname' => '',
        'lastname' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => '',
        'is_admin' => false,
        'is_active' => false,
        'selectedPartners' => []
    ];

    public function setUser($user)
    {
        $this->userform = [
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'email' => $user->email,
            'password' => '',
            'password_confirmation' => '',
            'is_admin' => $user->is_admin,
            'is_active' => $user->is_active,
        ];
        $this->userform['selectedPartners'] = Collect($user->partners)->pluck('id')->toArray();

    }

    public function rules()
    {
        $rules = [
            'userform.firstname' => 'required|min:4',
            'userform.lastname'  => 'required|min:4',
            'userform.email'     => ['required', 'max:255', 'email', Rule::unique('users', 'email')->ignore($this->userID)],
            'userform.is_admin'  => 'nullable',
            'userform.is_active' => 'nullable',  
        ];

        if($this->userID && !$this->userform['password'])
            $rules['userform.password'] = 'min:4|same:userform.password_confirmation';
        else
            $rules['userform.password'] = 'required|min:4|same:userform.password_confirmation';

        return $rules;
    }

    protected $messages = [
        'userform.firstname.required'=> 'First name must not be empty.',
        'userform.firstname.min'     => 'Atleast 8 characters is required.',
        'userform.lastname.required' => 'Last name must not be empty.',
        'userform.lastname.min'      => 'Atleast 8 characters is required.',
        'userform.email.required'    => 'Email address must not be empty.',
        'userform.email.max'         => 'Email address too long.',
        'userform.email.email'       => 'Email invalid format.',
        'userform.email.unique'      => 'Email already exists.',
        'userform.password.required' => 'Password is required.',
        'userform.password.min'      => 'Alteast 4 characters is required.',
        'userform.password.same'     => 'Confirm Password did not match.',
    ];

    public function store()
    {
        $this->validate();

        $user = User::create([
            'firstname' => $this->userform['firstname'],
            'lastname' => $this->userform['lastname'],
            'email' => $this->userform['email'],
            'password' => Hash::make($this->userform['password']),
            'is_admin' => $this->userform['is_admin'],
            'is_active' => $this->userform['is_active'],
        ]);

        if( count($this->userform['selectedPartners']) > 0 )
        {
            $user->partners()->sync($this->userform['selectedPartners'], false);
        }
        
        $this->resetForm();

        session()->flash('success', 'New user added successfully'); // success message

        return redirect()->route('admin.users.lists');

    }

    public function update()
    {
        $this->validate();

        $usr = $this->all();
        $user = User::find($usr['userID']);

        $user->firstname = $usr['userform']['firstname'];
        $user->lastname  = $usr['userform']['lastname'];
        $user->is_admin  = $usr['userform']['is_admin'];
        $user->is_active = $usr['userform']['is_active'];

        if($user->email !== $usr['userform']['email'])
            $user->email = $usr['userform']['email'];

        if($usr['userform']['password'])
            $user->password = Hash::make($usr['userform']['password']);

        //saved changes
        $user->save();

        // remove all the pivot partners and sync new set of partners['regardless there are changes or not]
        $user->partners()->detach();
        $user->partners()->sync($usr['userform']['selectedPartners'], false);

        session()->flash('success', 'User updated successfully'); // success message

        return redirect()->route('admin.users.lists');

    }

    public function resetForm()
    {
        $this->reset();
    }

}
