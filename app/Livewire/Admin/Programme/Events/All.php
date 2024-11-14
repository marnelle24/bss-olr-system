<?php

namespace App\Livewire\Admin\Programme\Events;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Program_event;

class All extends Component
{
    use WithPagination;

    public function render()
    {
        $bssEvents = Program_event::latest()->paginate(8);
        return view('livewire.admin.programme.events.all', [
            'bss_events' => $bssEvents
        ]);
    }
}
