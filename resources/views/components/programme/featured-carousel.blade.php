@props(['programmes'])

<div class="max-w-6xl mx-auto">
    <div class="programme-carousel relative group/carousel">
        <!-- Previous Button -->
        <button class="absolute left-0 xl:top-60 md:top-52 top-1/3 -translate-y-1/2 z-10 text-slate-900 p-3 rounded-r-lg opacity-100 transition-opacity duration-300 block"
            onclick="this.closest('.programme-carousel').querySelector('.scroll-container').scrollBy({left: -300, behavior: 'smooth'})">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </button>

        <!-- Next Button -->
        <button class="absolute right-0 xl:top-60 md:top-52 top-1/3 -translate-y-1/2 z-10 text-slate-900 p-3 rounded-l-lg opacity-100 transition-opacity duration-300 block"
            onclick="this.closest('.programme-carousel').querySelector('.scroll-container').scrollBy({left: 300, behavior: 'smooth'})">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </button>

        <div class="scroll-container flex overflow-x-auto gap-9 hide-scrollbar snap-x snap-mandatory bg-white min-h-[400px] rounded-md shadow">
            @foreach ($programmes as $programme)
                <div class="flex-none snap-center group w-full">
                    <div class="{{ $programme['bgColor'] }} min-h-[400px] overflow-hidden flex justify-center items-center">
                        <div class="flex justify-start items-center h-full relative">
                            <h3 class="text-2xl font-bold text-teal-600">{{ $programme['title'] }}</h3>
                        </div>
                    </div>
                </div> 
            @endforeach
        </div>
    </div>
</div>