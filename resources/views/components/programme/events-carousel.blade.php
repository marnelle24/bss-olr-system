<div class="max-w-6xl mx-auto px-4 py-16">
    <h2 class="xl:text-4xl text-3xl tracking-wider uppercase font-extrabold mb-8 text-center font-nunito drop-shadow text-white">Events</h2>
    <div class="events-carousel relative">
        <!-- Previous Button -->
        <button class="shadow-lg absolute left-0 xl:top-60 md:top-52 top-1/3 -translate-y-1/2 z-10 bg-teal-700/70 hover:bg-teal-900/80 text-white p-3 rounded-r-lg opacity-100 transition-opacity duration-300 block"
            onclick="document.querySelector('.events-scroll').scrollBy({left: -300, behavior: 'smooth'})">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </button>

        <!-- Next Button -->
        <button class="shadow-lg absolute right-0 xl:top-60 md:top-52 top-1/3 -translate-y-1/2 z-10 bg-teal-700/70 hover:bg-teal-900/80 text-white p-3 rounded-l-lg opacity-100 transition-opacity duration-300 block"
            onclick="document.querySelector('.events-scroll').scrollBy({left: 300, behavior: 'smooth'})">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </button>

        <div class="events-scroll flex overflow-x-auto gap-5 py-4 hide-scrollbar snap-x snap-mandatory">
            <!-- Event Cards -->
            @foreach ($events as $event)
                <x-programme.event-card :event="$event" />
            @endforeach
        </div>
    </div>
    <div class="w-full flex justify-center items-start mt-8">
        <a href="{{route('programme.public', ['event'])}}" class="bg-teal-600 text-white px-5 py-3 hover:-translate-y-0.5 uppercase font-bold tracking-wider rounded-full duration-300 hover:bg-teal-700 shadow drop-shadow">
            View All Events
        </a>
        {{-- <a href="{{route('events.public')}}" class="bg-teal-600 text-white px-5 py-3 hover:-translate-y-0.5 uppercase font-bold tracking-wider rounded-full duration-300 hover:bg-teal-700 shadow drop-shadow">
            View All Events
        </a> --}}
    </div>
</div>