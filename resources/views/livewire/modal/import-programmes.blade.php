<div>
    <button wire:click="openModal" 
        class="w-full bg-gradient-to-tl from-meta-3 via-meta-6 to-meta-1 bg-size-200 bg-pos-0 hover:bg-pos-100 hover:-translate-y-1 text-white drop-shadow px-6 py-2 text-lg font-bold rounded-md shadow hover:shadow-lg transition-all duration-300">
      Sync BSS Programmes
    </button>

    <!-- Modal -->
    <div 
        x-data="{ open: @entangle('showModal') }" 
        x-show="open" 
        x-transition:enter="transform transition ease-in-out duration-300" 
        x-transition:enter-start="translate-x-full" 
        x-transition:enter-end="translate-x-0" 
        x-transition:leave="transform transition ease-in-out duration-300" 
        x-transition:leave-start="translate-x-0" 
        x-transition:leave-end="translate-x-full" 
        class="fixed right-0 top-0 z-[99999] flex items-center justify-center"
        style="display: none;"
    >
        <!-- Modal background -->
        <div class="fixed inset-0 bg-black opacity-50"></div>

        <!-- Modal content -->
        <div class="bg-white h-screen overflow-y-auto rounded-none shadow-lg z-10">
            <div class="flex justify-between items-center p-6 border-b">
                <p class="text-slate-700 mr-10 uppercase text-lg">Syncing Programmes</p>
                {{-- <h3 class="text-lg font-semibold">View Details</h3> --}}
                <button wire:click="closeModal" class="text-slate-500 hover:-translate-y-1 duration-300 drop-shadow text-2xl">
                    &#10005;
                </button>
            </div>
            <div class="p-6">
                <div class="bg-zinc-100 border border-zinc-300 py-5 px-2 rounded text-[9px] flex flex-col gap-4">
                    <p class="text-slate-700 font-mono text-xs">fetching from BSS website...</p>
                    <p class="text-slate-700 font-mono text-xs">syncing programmes...</p>
                    <p class="text-slate-700 font-mono text-xs">Store new prgorammes to database...</p>
                </div>

                @foreach ( $bss_events as $event )
                   <pre>@dump($event)</pre>
                @endforeach
            </div>
        </div>
    </div>
</div>
