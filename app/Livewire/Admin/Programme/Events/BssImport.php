<?php

namespace App\Livewire\Admin\Programme\Events;

use Livewire\Component;
use App\Models\Program_event;
use Illuminate\Support\Sleep;
use Illuminate\Support\Facades\Http;

class BssImport extends Component
{
    public $showModal = false;
    public $fetchingMsg = '';
    public $synchedRecords = [];
    public $allSyncDone = '';
    public $isMigrating = false;
    public $totalDataAdded = 0;


    public function openModal()
    {
        $this->showModal = true;
        // $this->fetchProgrammes();

    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function startMigration()
    {
        $this->isMigrating = true;
        $this->fetchingMsg = 'fetching from BSS website...';
        $this->dispatch('delayed-assign');
    }

    public function performMigration()
    {
        $this->synchedRecords = [];
        $this->totalDataAdded = 0;

        // Fetch the JSON data from the WP API
        $response = Http::get('https://www.biblesociety.sg/wp-json/bss/v1/bss-events');
        $data = $response->json();

        // Check if the request was successful and store the response data
        if ($response->successful()) 
        {
            // Loop through each record in the JSON response
            foreach ($data as $index => $record) 
            {
                $programCode = substr($record['programCode'], 0, -1); // removing the underscore in the programCode

                // Check if the record already exists in the database
                $exists = Program_event::where('programCode', $programCode)->exists();

                // 2 - record id of Chinise Ministry partner | 17 - BSS partner id
                $partnerID = ($record['settings'] !== '' && str_contains($record['settings'], 'chinese_ministry')) ? 2 : 17; 
                $programID = 9; // event

                if (!$exists) 
                {
                    //prepare the data to store
                    $reg = [
                        'user_id'       => auth()->user()->id, 
                        'partner_id'    => $partnerID, 
                        'program_id'    => $programID, 
                        'type'          => $programID === 9 ? 'event' : NULL, 
                        'programCode'   => $programCode, 
                        'title'         => strip_tags($record['title']), 
                        'startDate'     => $record['startDate'], 
                        'endDate'       => $record['endDate'], 
                        'startTime'     => $record['startTime'], 
                        'endTime'       => $record['endTime'], 
                        'activeUntil'   => $record['activeUntil'], 
                        'venue'         => $record['venue'], 
                        'latLong'       => '', 
                        'price'         => $record['price'],
                        'thumb'         => $record['thumb'],
                        'a3_poster'     => $record['a3_poster'], 
                        'excerpt'       => '', 
                        'description'   => $record['description'], 
                        'contactNumber' => '', 
                        'contactPerson' => $record['chequeHandler'], 
                        'contactEmail'  => $record['email'], 
                        'chequeCode'    => 'CHK-'.$programCode, 
                        'limit'         => $record['limit'] <= 0 ? 0 : $record['limit'], 
                        'settings'      => $record['settings'], 
                    ];

                    // Insert the record if it doesn't exist
                    $pe = Program_event::create($reg);

                    if($pe)
                    {
                        $this->totalDataAdded++;
                        $this->synchedRecords[] = $programCode.' importing to DB...Done';
                    }
                    else
                        $this->synchedRecords[] = $programCode.' failed importing to DB...';
                }

                // Check if it's the last iteration of the loop
                if ($index === count($data) - 1) 
                    $this->allSyncDone = $this->totalDataAdded > 0 ? 'Sync completed...' : 'No record sync. Everything is up to date.';
            }
            $this->isMigrating = false;
        }
    }

    public function render()
    {
        return view('livewire.modal.import-programmes');
    }
    
}
