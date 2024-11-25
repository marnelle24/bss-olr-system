<div class="flex items-center">
    <label class="inline-flex items-center cursor-pointer">
        <input 
            wire:model.live="value"
            type="checkbox" 
            class="sr-only peer"
        >
        <div class="relative w-11 h-6 rounded-full peer peer-focus:ring-slate-500 bg-red-500 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-slate-500 after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-slate-500 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
    </label>
</div>