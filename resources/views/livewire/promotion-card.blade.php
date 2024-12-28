<div 
    class="{{ $countPromotions < 4 ? 'xl:w-1/3 w-full' : '' }} {{ $hasPromotion ? 'bg-white flex flex-col p-6 rounded-lg shadow-md border-2 border-slate-400/50 hover:-translate-y-1 duration-300' : '' }}"
>
    @if($hasPromotion)
        <h3 class="text-2xl text-meta-4 font-bold font-nunito mb-4 leading-tight">{{ $promotion->title }}</h3>
        <p class="text-meta-4 font-thin mb-4 capitalize leading-tight">{{ $promotion->description }}</p>
        <br />
        <br />
    @endif
    
    @if($hasPromotion)
    <div class="flex flex-col justify-center items-center mt-auto"> 
        <p class="text-3xl font-bold font-nunito mb-6">{{ 'SG$'.number_format($promotion->price, 2) }}</p>
        {{-- <button wire:click="selectedPromotion({{ $promotion }})" class="selectButton px-4 uppercase drop-shadow w-full font-nunito font-bold bg-gradient-to-l from-teal-600 via-teal-500 to-teal-600 bg-size-200 bg-pos-0 hover:bg-pos-100 text-white py-3 rounded-none hover:bg-meta-3 shadow hover:-translate-y-0.5 duration-300" onclick="window.scrollTo(0, 0);"> --}}
        <button wire:click="selectedPromotion({{ $promotion }})" class="selectButton px-4 uppercase drop-shadow w-full font-nunito font-bold bg-gradient-to-l from-teal-600 via-teal-500 to-teal-600 bg-size-200 bg-pos-0 hover:bg-pos-100 text-white py-3 rounded-none hover:bg-meta-3 shadow hover:-translate-y-0.5 duration-300">
                {{ $label }}
            </button>
        </div>
    @else
        <button
            wire:click="selectedPromotion([])"
            class="py-5 px-8 text-2xl uppercase drop-shadow font-nunito font-bold bg-gradient-to-l from-teal-600 via-teal-500 to-teal-600 bg-size-200 bg-pos-0 hover:bg-pos-100 text-white rounded-sm hover:bg-meta-3 shadow hover:-translate-y-0.5 duration-300">
            Register Now
        </button>
    @endif
</div>
