<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\Program_event;
use Livewire\WithoutUrlPagination;

class EventsList extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';
    protected $events;

    protected $listeners = ['scrollTo'];

    public function scrollTo()
    {
        $this->dispatch('scrollToSearch');
    }

    public function mount()
    {
        $this->events = Program_event::where('searchable', 1)
            ->where('status', 'active')
            ->where('publishable', 1)
            ->paginate(6);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function searchProgramEvents()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Program_event::query()
            ->where('searchable', 1)
            ->where('status', 'active')
            ->where('publishable', 1);

        if (!empty($this->search)) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }

        $this->events = $query->with('promotions')
            ->with('categories', function ($query) {
                return $query->select('programCode','name');
            })
            ->with('speakers')
            ->with('trainers')
            ->with('partner')
            ->paginate(6);

        $categories = Category::all();

        return view('livewire.events-list', [
            'events' => $this->events,
            'categories' => $categories
        ]);
    }
}
