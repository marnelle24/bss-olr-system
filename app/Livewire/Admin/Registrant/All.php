<?php

namespace App\Livewire\Admin\Registrant;

use App\Models\Program;
use Livewire\Component;
use App\Models\Registrant;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class All extends Component
{
    use WithPagination;

    public $keyword;
    public $typeQuery;
    public $statusQuery;
    public $dateQuery;

    public $allprogram = [];
    

    public function mount()
    {
        $this->allprogram = Program::all()->pluck('name', 'slug');
    }

    #[Computed]
    public function registrants()
    {

        $registrants = Registrant::latest()
            ->with('event', function($q){
                $q->select('programCode', 'title', 'type', 'partner_id')
                    ->with('partner', function($q) {
                        $q->select('id', 'name');
                    });
            })
            ->paginate(10);

        return $registrants;
    }

    public function resetForm()
    {
        $this->registrants();
    }


    // Thorough search and filter functionality
    public function performSearch()
    {
        // Initial query in the Registrant model
        $query = Registrant::query();

        // If type is not define in the filter input, set `event` as default
        $this->typeQuery = $this->typeQuery ?? 'event';

        //if the keyword is not empty during the perform search, 
        //query in the main column for similar value from the keyword
        if($this->keyword)
        {
            $kw = $this->keyword;

            // filter for keyword
            $query->where(function ($q) use ($kw) {
                $q->where('firstName', 'LIKE', '%' . $kw . '%')
                    ->orWhere('lastName', 'LIKE', '%' . $kw . '%')
                    ->orWhere('email', 'LIKE', '%' . $kw . '%')
                    ->orWhereHas($this->typeQuery, function($q) use ($kw) {
                        $q->where('title', 'LIKE', '%' . $kw . '%');
                    })
                    ->orWhere('programCode', 'LIKE', '%' . $kw . '%');
            });
        }

        // if the type field in the filter is also included in the query, 
        //perform additional query in this column
        if($this->statusQuery)
            $query->where('regStatus', '=', $this->statusQuery);

        // if the date_created field in the filter is also included in the query, 
        //perform additional query in this column
        if($this->dateQuery)
            $query->whereDate('created_at', $this->dateQuery);
        
        // check which type of program the query to look up
        if($this->typeQuery === 'course')
        {
            $reg = $query->with('course', function($q) {
                $q->select('programCode', 'title', 'type', 'partner_id')
                    ->with('partner', function($q) {
                        $q->select('id', 'name');
                    });
            })->paginate(6);
        }
        elseif($this->typeQuery === 'book')
        {
            $reg = $query->with('book', function($q) {
                $q->select('programCode', 'title', 'type', 'partner_id')
                    ->with('partner', function($q) {
                        $q->select('id', 'name');
                    });
            })->paginate(6);
        }
        else
        {
            $reg = $query->with('event', function($q) {
                $q->select('programCode', 'title', 'type', 'partner_id')
                    ->with('partner', function($q) {
                        $q->select('id', 'name');
                    });
            })->paginate(6);
        }

        $this->registrants = $reg;
    }



    // Soft delete action of the item.
    // Basically, record is not totally deleted but changed the status of the soft_delete to true.
    public function soft_delete($id)
    {
        $reg = Registrant::find($id);
        $reg->update([ 'soft_delete' => 1 ]);
        $this->dispatch('redAlert', message: 'Registrant removed successfully.');

        // return dump($reg);
    }
}
