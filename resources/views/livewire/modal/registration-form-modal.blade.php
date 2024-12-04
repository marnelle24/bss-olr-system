<div>
    <!-- Modal -->
    <div 
        x-data="{ open: @entangle('showModal') }" 
        x-show="open" 
        x-transition:enter="transition ease-in-out duration-300" 
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100" 
        x-transition:leave="transition ease-in-out duration-300" 
        x-transition:leave-start="opacity-100" 
        x-transition:leave-end="opacity-0" 
        class="absolute inset-0 z-[99999] flex items-start justify-center"
        style="display: none;"
    >
        <!-- Modal background -->
        <div class="w-full h-full fixed inset-0 bg-black opacity-70"></div>

        <!-- Modal content -->
        <div class="bg-white xl:w-1/2 w-full h-auto overflow-y-auto rounded-none shadow-lg z-10 my-10 xl:mx-0 mx-3">
            <div class="flex justify-between items-center p-6 bg-gradient-to-l from-teal-600 via-teal-500 to-teal-600 bg-size-200 bg-pos-0">
                <p class="text-xl text-white uppercase mb-2">{{ $programItem ? 'Registration for ' . $programItem->title : 'Registration Here' }}</p>
                <button wire:click="closeModal" class="text-slate-100 hover:text-white hover:-translate-y-1 duration-300 drop-shadow text-2xl">
                    &#10005;
                </button>
            </div>
            <div class="p-8">
                @if($programItem)
                    <livewire:guest.registration-form :eventDetails="$programItem" :promotion="$getPromotion" key="registration-form-modal{{rand(1, 100)}}" />
                @endif
            </div>
        </div>
    </div>
</div>
