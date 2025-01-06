@props(['courses'])

<div class="max-w-6xl mx-auto px-4 py-16">
    <h2 class="xl:text-4xl text-3xl tracking-wider uppercase font-extrabold mb-12 text-center font-nunito drop-shadow text-white">Courses</h2>
    @foreach($courses as $course)
        <div class="overflow-hidden relative border-2 border-teal-700/50 bg-gradient-to-r from-white/70 via-white to-white/70 shadow rounded py-8 xl:px-10 px-5 gap-2 mb-5 hover:from-white hover:to-white hover:via-white/60 hover:shadow-lg xl:hover:scale-105 hover:scale-100 hover:-translate-y-0.5 transition-all duration-300 flex xl:flex-row flex-col items-center">
            @if($course['isPromo'])
                <div class="flex justify-center text-center text-md font-nunito uppercase font-bold items-end drop-shadow absolute -top-3 -right-15 bg-gradient-to-r from-red-500 via-red-300 to-red-500 text-white px-4 py-3 h-20 w-40 transform rotate-45">
                    Promo
                </div>
            @endif
            <img src="{{ $course['thumbnail'] }}" alt="{{ $course['title'] }}" class="bg-teal-500/70 rounded-full shadow-md xl:h-32 xl:w-32 h-40 w-40">
            <div class="pl-4 xl:w-auto w-full">
                <h3 class="text-slate-800 text-xl font-bold">{{ $course['title'] }}</h3>
                <p class="text-slate-800 mt-2 xl:truncate">{{ $course['description'] }}</p>
                <div class="flex flex-col justify-start items-start gap-3 mt-1">
                    <div class="flex xl:items-start items-center gap-1">
                        <img src="{{ $course['trainer_image'] }}" alt="{{ $course['trainer'] }}" class="bg-teal-500/70 rounded-full shadow border border-teal-700/80 h-6 w-6">
                        <p class="text-slate-800 drop-shadow text-sm">{{ $course['trainer'] }}</p>
                    </div>
                    <div class="flex xl:items-start items-center xl:w-auto w-full xl:justify-start justify-center gap-3">
                        <button class="bg-slate-600 text-white hover:bg-slate-700 px-3 shadow-sm duration-300 py-2 text-sm rounded-full hover:-translate-y-0.5">
                            Read More
                        </button>
                        <p class="text-slate-800 bg-gradient-to-r from-teal-500/70 via-teal-400 to-teal-500/70 px-2.5 font-bold py-1.5 text-sm rounded-full border-2 border-teal-500 shadow-sm drop-shadow">
                            {{ 'SG$'.number_format($course['price'], 2) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="w-full flex justify-center items-start mt-8">
        <a href="/" class="bg-teal-500 text-white px-5 py-3 border-2 border-teal-500 uppercase font-bold tracking-wider rounded-full duration-300 hover:bg-transparent hover:border-2 hover:scale-105 hover:text-teal-300 hover:border-teal-300 shadow drop-shadow">
            View All Courses
        </a>
    </div>


    {{-- <div class="courses-carousel relative group/carousel">
        <!-- Previous Button -->
        <button class="shadow-lg absolute left-0 xl:top-60 md:top-52 top-1/3 -translate-y-1/2 z-10 bg-teal-700/70 hover:bg-teal-900/80 text-white p-3 rounded-r-lg opacity-100 transition-opacity duration-300 block"
            onclick="this.closest('.courses-carousel').querySelector('.scroll-container').scrollBy({left: -300, behavior: 'smooth'})">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </button>

        <!-- Next Button -->
        <button class="shadow-lg absolute right-0 xl:top-60 md:top-52 top-1/3 -translate-y-1/2 z-10 bg-teal-700/70 hover:bg-teal-900/80 text-white p-3 rounded-l-lg opacity-100 transition-opacity duration-300 block"
            onclick="this.closest('.courses-carousel').querySelector('.scroll-container').scrollBy({left: 300, behavior: 'smooth'})">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </button>

        <div class="scroll-container flex overflow-x-auto gap-9 py-4 hide-scrollbar snap-x snap-mandatory">
            @foreach ($courses as $course)
                <x-programme.course-card :course="$course" />
            @endforeach
        </div>
    </div>
    <div class="w-full flex justify-center items-start mt-8">
        <a href="/" class="bg-teal-600 text-white px-5 py-3 hover:-translate-y-0.5 uppercase font-bold tracking-wider rounded-full duration-300 hover:bg-teal-700 shadow drop-shadow">
            View All Courses
        </a>
    </div> --}}
</div>