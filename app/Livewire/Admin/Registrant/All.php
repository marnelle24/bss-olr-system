<?php

namespace App\Livewire\Admin\Registrant;

use Livewire\Component;
use App\Models\Registrant;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class All extends Component
{
    use WithPagination;
    
    public function render()
    {
        $registrants = Registrant::latest()
            ->with('event', function($q){
                $q->select('programCode', 'title', 'type');
            })
            ->paginate(20);
        
        return view('livewire.admin.registrant.all', [
            'registrants' => $registrants
        ]);
    }
}
