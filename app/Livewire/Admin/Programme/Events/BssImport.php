<?php

namespace App\Livewire\Admin\Programme\Events;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class BssImport extends Component
{
    public $bss_events = [];

    public function mount()
    {
        // Fetch the JSON data from the WP API
        $response = Http::get('https://www.biblesociety.sg/wp-json/bss/v1/bss-events');
        
        // Check if the request was successful and store the response data
        if ($response->successful()) {
            $this->bss_events = $response->json();
        } else {
            $this->bss_events = [];
        }

    }
    public function render()
    {

        return view('livewire.admin.programme.events.bss-import');
    }
}
