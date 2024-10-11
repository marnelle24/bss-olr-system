<?php

namespace App\Livewire\Admin\Programme;

use App\Models\Program;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class Show extends Component
{
    use WithPagination;
    
    public $search;

    protected $listeners = ['greenAlert' => 'refreshComponent'];

    public function selectProgramme( $programme )
    {
        $this->dispatch('getSelectedProgramme', $programme);
    }  

    public function deleteProgramme( $programmeID )
    {
        $programme = Program::find($programmeID);
        $programme->delete();
        $this->dispatch('redAlert', message: 'Programme has been deleted.');
    }


    #[Computed]
    public function programmes()
    {
        return Program::latest()
            ->where('name', 'like', "%{$this->search}%")
            ->paginate(4);
    }
}
