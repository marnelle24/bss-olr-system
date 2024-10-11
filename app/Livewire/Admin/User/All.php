<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class All extends Component
{
    public $search;

    use WithPagination;

    public function toggleActive( $user )
    {
        $_user = User::find($user['id']);
        $newStatus = $user['is_active'] ? 0 : 1;
        $_user->update(['is_active' => $newStatus]);

        if($newStatus)
            $this->dispatch('greenAlert', message:'User activated successfully');
        else
            $this->dispatch('redAlert', message:'User inactivated successfully');
    }

    public function delete($user)
    {
        if(auth()->check()) 
        {
            $user = User::find($user['id']);
            $user->partners()->detach();
            $user->delete();
            $this->dispatch('redAlert', message:'User deleted successfully');
        }
    }


    #[Computed]
    public function users()
    {
        return User::latest()
            ->where('firstname', 'like', "%{$this->search}%")
            ->orWhere('lastname', 'like', "%{$this->search}%")
            ->with('partners')
            ->paginate(7);
    }
}
