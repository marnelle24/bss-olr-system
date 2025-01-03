<div
    x-data
    @scrollToSearch.window="$el.querySelector('#categoryList').scrollIntoView({ behavior: 'smooth' })"
>
    <div id="categoryList" class="flex justify-center items-center gap-7 mt-10 mb-5">
        @foreach ($categories as $category)
            <div class="group">
                <a href="/" class="text-md text-slate-600 drop-shadow hover:text-slate-500 duration-300 hover:-translate-y-0.5">{{ $category->name }}</a>
                <hr class="border-2 border-teal-700 group-hover:w-full duration-300 opacity-0 group-hover:opacity-100" />
            </div>
        @endforeach
    </div>
    <div id="searchForm" class="bg-white rounded-md shadow">
        <div class="relative p-5 w-full">
            <span class="absolute inset-y-0 left-0 pl-8 flex items-center text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="stroke-slate-500 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </span>
            <input 
                wire:model.live.debounce.500ms="search"
                type="search" 
                class="pl-10 w-full px-2 py-4 placeholder:text-slate-500 placeholder:font-light placeholder:text-lg focus:outline-none border border-slate-400 focus:ring-0 focus:ring-slate-500 focus:border-slate-600" 
                placeholder="Search for an event"
            >
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
        @if($events->isEmpty())
            <div class="col-span-3 text-center py-8">
                <p class="text-slate-600 text-lg">No events found matching your search.</p>
            </div>
        @else
            @foreach ($events as $event)
                <x-event-card :event="$event" />
            @endforeach
        @endif
    </div>

    <div class="flex justify-start items-center mt-8">
        {{ $events->links('vendor.livewire.custom') }}
    </div>
</div>
