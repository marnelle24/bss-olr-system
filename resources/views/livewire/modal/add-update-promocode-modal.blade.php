<div>
    <button 
        wire:click="openModal"
        class="flex gap-1 items-center justify-center text-md shadow hover:-translate-y-0.5 bg-meta-3 hover:bg-meta-6 dark:hover:bg-meta-4 duration-300 text-white py-1.5 px-3 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 font-extrabold">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        {{ $buttonLabel }}
    </button>

    <div 
        x-data="{ open: @entangle('showModal') }" 
        x-show="open" 
        x-transition:enter="transform transition ease-in-out duration-300" 
        x-transition:enter-start="translate-x-full" 
        x-transition:enter-end="translate-x-0" 
        x-transition:leave="transform transition ease-in-out duration-300" 
        x-transition:leave-start="translate-x-0" 
        x-transition:leave-end="translate-x-full" 
        class="fixed right-0 top-0 z-[999] flex items-center justify-center"
        style="display: none;"
    >
        <!-- Modal background -->
        <div class="fixed inset-0 bg-black opacity-50"></div>

        <!-- Modal content -->
        <div class="bg-white h-screen overflow-y-auto rounded-none shadow-lg z-10">
            <div class="flex justify-between items-center p-6 border-b bg-meta-4">
                <p class="text-slate-100 mr-10 uppercase text-lg">
                    {{ $promocode ? 'Update Promo Code' : 'Add Promo Code' }}
                </p>
                <button wire:click="closeModal" class="text-slate-500 hover:-translate-y-1 duration-300 drop-shadow text-2xl">
                    &#10005;
                </button>
            </div>
            <div class="p-6">
                <form wire:submit="submit">
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col gap-2">
                            <label for="promocode" class="text-sm text-slate-700">Code</label>
                            <input type="text" id="promocode" placeholder="Promo Code" class="border focus:ring-0 border-slate-300 placeholder:text-slate-400 text-slate-600 rounded-none p-2" wire:model="form.promocode" />
                            @error('form.promocode')
                                <em class="text-red-500 text-xs">{{ $message }}</em>
                            @enderror
                        </div>
                        <div class="flex w-full gap-2">
                            <div class="flex flex-col w-1/2 gap-2">
                                <label for="startDate" class="text-sm text-slate-700">From</label>
                                <input type="date" id="startDate" class="border focus:ring-0 border-slate-300 placeholder:text-slate-400 text-slate-600 rounded-none p-2" wire:model="form.startDate" />
                                @error('form.startDate')
                                    <em class="text-red-500 text-xs">{{ $message }}</em>
                                @enderror
                            </div>
                            <div class="flex flex-col w-1/2 gap-2">
                                <label for="endDate" class="text-sm text-slate-700">To</label>
                                <input type="date" id="endDate" class="border focus:ring-0 border-slate-300 placeholder:text-slate-400 text-slate-600 rounded-none p-2" wire:model="form.endDate" />
                                @error('form.endDate')
                                    <em class="text-red-500 text-xs">{{ $message }}</em>
                                @enderror
                            </div>
                        </div>

                        <div class="flex gap-2 mt-4">
                            <div class="flex flex-col gap-2">
                                <label for="price" class="text-sm text-slate-700">Promo Price (SGD)</label>
                                <input type="number" wire:model="form.price" min="0" step="0.10" id="price" placeholder="Promo Price" class="border focus:ring-0 border-slate-300 placeholder:text-slate-400 text-slate-600 rounded-none p-2" />
                                @error('form.price')
                                    <em class="text-red-500 text-xs">{{ $message }}</em>
                                @enderror
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="maxUses" class="text-sm text-slate-700">Max Limit</label>
                                <input type="number" wire:model="form.maxUses" min="0" step="0.10" id="price" placeholder="Max Limit" class="border focus:ring-0 border-slate-300 placeholder:text-slate-400 text-slate-600 rounded-none p-2" />
                                @error('form.maxUses')
                                    <em class="text-red-500 text-xs">{{ $message }}</em>
                                @enderror
                            </div>
                        </div>

                        @if(!$promocode)
                            <div class="flex items-center gap-2 mt-3">
                                <p class="text-sm text-slate-700">Status</p>
                                <label for="status" class="inline-flex items-center cursor-pointer">
                                    <input id="status" type="checkbox" value="" class="sr-only peer" checked wire:model="form.status">
                                    <div class="relative w-11 h-6 rounded-full peer peer-focus:ring-slate-500 bg-red-400 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-slate-500 after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-slate-500 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                                </label>
                            </div>
                        @endif
                        <div class="flex items-center gap-2 mt-3">
                            <p class="text-sm italic text-slate-700">Created By: {{ $promocode ? $promocode['createdBy'] : auth()->user()->firstname .' '. auth()->user()->lastname }}</p>
                        </div>
                        <div class="flex flex-col mt-4">
                            <button type="submit" class="bg-meta-3/90 hover:bg-meta-3 border border-meta-3 shadow duration-300 hover:-translate-y-0.5 text-white py-2 px-4 text-md rounded-none">
                                {{ $promocode ? 'Update Promo Code' : 'Add Promo Code' }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>