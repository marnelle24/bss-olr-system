<div>
    <button 
        wire:click="openModal" 
        class="shadow hover:-translate-y-0.5 dark:bg-slate-700 bg-orange-700 hover:bg-orange-600 dark:hover:bg-orange-600 duration-300 text-white py-3 px-4 rounded">
      Promo Codes
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
        class="fixed right-0 top-0 z-[99999] flex items-center justify-center"
        style="display: none;"
    >
        <!-- Modal background -->
        <div class="fixed inset-0 bg-black opacity-50"></div>

        <!-- Modal content -->
        <div class="bg-white h-screen overflow-y-auto rounded-none shadow-lg z-10">
            <div class="flex justify-between items-center p-6 border-b bg-meta-4">
                <p class="text-slate-100 mr-10 uppercase text-lg">Manage Promo Codes</p>
                <button wire:click="closeModal" class="text-slate-500 hover:-translate-y-1 duration-300 drop-shadow text-2xl">
                    &#10005;
                </button>
            </div>
            <div class="p-6">
                <p>List of Promo Codes</p>
            </div>
        </div>
    </div>

</div>
