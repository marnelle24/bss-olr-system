<div class="bg-white {{ $totalPromotions < 4 ? 'xl:w-1/3 w-full' : '' }} flex flex-col p-6 rounded-lg shadow-md border-2 border-slate-400/50 hover:-translate-y-1 duration-300">
    <h3 class="text-2xl text-meta-4 font-bold font-nunito mb-4 leading-tight">{{ $promotion->title }}</h3>
    <p class="text-meta-4 font-thin mb-4 capitalize leading-tight">{{ $promotion->description }}</p>
    <br />
    <br />
    <div class="flex flex-col justify-center items-center mt-auto"> 
        <p class="text-3xl font-bold font-nunito mb-6">{{ 'SG$'.number_format($promotion->price, 2) }}</p>
        <button wire:click="selectedPromotion({{ $promotion }})" class="selectButton px-4 uppercase drop-shadow w-full font-nunito font-bold bg-gradient-to-l from-teal-600 via-teal-500 to-teal-600 bg-size-200 bg-pos-0 hover:bg-pos-100 text-white py-3 rounded-none hover:bg-meta-3 shadow hover:-translate-y-0.5 duration-300">
            {{ $label }}
        </button>
    </div>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.selectButton').forEach(button => {
                button.addEventListener('click', function() {
                    window.scrollTo(0, 0);
                });
            });
        });
    </script> --}}
</div>