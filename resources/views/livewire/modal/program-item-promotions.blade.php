<div>
    <button 
        wire:click="openModal" 
        class="shadow hover:-translate-y-0.5 dark:bg-slate-700 bg-meta-6 hover:bg-meta-6 dark:hover:bg-meta-6 duration-300 text-white py-3 px-4 rounded">
      Price Promotions
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
            <div class="flex justify-between items-center p-6 border-b">
                <p class="text-slate-700 mr-10 uppercase text-lg">Manage Promotions</p>
                <button wire:click="closeModal" class="text-slate-500 hover:-translate-y-1 duration-300 drop-shadow text-2xl">
                    &#10005;
                </button>
            </div>
            <div class="p-6">
                <p>List of Price Promotions</p>
            </div>
        </div>
    </div>
</div>
