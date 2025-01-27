<x-guest-layout>
    <div class="lg:mt-5 max-w-6xl mx-auto lg:px-0 px-4 lg:py-10 py-3">
        <div class="rounded-xl flex lg:flex-row flex-col shadow">
            <img 
                src="{{ $event->thumb }}" 
                alt="{{ strip_tags($event->title) }}" 
                class="lg:rounded-tl-xl rounded-tl-none lg:rounded-bl-xl rounded-bl-none w-full xl:h-[475px] lg:h-[500px] h-[200px] object-cover object-center"
            >
            <div class="relative lg:rounded-tr-xl rounded-tr-none lg:rounded-br-xl rounded-br-none p-4 w-full lg:w-1/2 flex justify-start flex-col gap-2 bg-gradient-to-r from-zinc-100 to-zinc-200">
                <h1 class="text-4xl font-bold">{{ strip_tags($event->title) }}</h1>
                <p class="mt-4 text-sm leading-relaxed text-black overflow-auto h-[180px]">
                    {{ Str::words(strip_tags($event->description), 25, '...') }}
                </p>

                <div class="absolute bottom-4 flex items-center justify-between mt-8">
                    <a href="#registration-form" class="bg-gradient-to-tl from-orange-1 via-orange-300 to-orange-1 bg-size-200 bg-pos-0 hover:bg-pos-100 hover:-translate-y-1 text-white drop-shadow px-6 py-2 text-lg font-bold rounded-xl shadow hover:shadow-lg transition-all duration-300">
                        Register Now
                    </a>
                </div>
            </div>
        </div>
        {{-- <div class="mt-12 flex lg:flex-row flex-col lg:gap-0 gap-8 max-w-6xl mx-auto">
            <h3 class="text-3xl font-nunito font-extrabold my-4">About Event</h3>
        </div> --}}
        <div class="mt-10 flex lg:flex-row flex-col lg:gap-0 gap-10 lg:space-x-10 space-x-0 max-w-6xl mx-auto">
            <div class="w-full lg:w-2/3">
                <h3 class="text-2xl font-extrabold my-4 text-meta-4">About Event</h3>
                <div class="text-md text-gray-500">
                    {!! $event->description !!}
                </div>

                @if ($event->categories->count() > 0)
                    <div class="mt-8 border-t-2 border-zinc-400/20 pt-8">
                        <p class="font-thin text-sm text-neutral-600 drop-shadow mb-2 italic">Categories:</p>
                        <div class="flex gap-1">
                            @foreach ($event->categories as $category)
                                <p class="font-extrabold shadow-md font-nunito text-sm text-white bg-meta-3/80 border border-meta-3 rounded-full px-2 py-1">
                                    {{ $category->name }}
                                </p>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <div class="w-full flex flex-col gap-3 lg:w-1/3">
                <x-utilities.calendar-schedule-date 
                    :startDate="$event->startDate" 
                    :endDate="$event->endDate" 
                    startTime="" 
                    endTime="" 
                    :customDate="$event->customDate" 
                />
                <x-utilities.schedule-time :startTime="$event->startTime" :endTime="$event->endTime" />
                <x-utilities.venue-location :venue="$event->venue" />
                
                <div class="flex flex-col gap-6">
                    <div>
                        <p class="font-thin text-sm text-neutral-600 drop-shadow mb-2">Organised by:</p>
                        <div class="flex">
                            <p class="font-extrabold shadow text-sm text-white bg-slate-700 border border-slate-300 rounded-sm px-2.5 py-1.5">
                                {{ $event->partner->name }}
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="font-thin text-sm text-neutral-600">For inquiries, contact:</p>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline-block mr-1 align-text-bottom text-slate-500 dark:text-slate-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            <p class="text-md py-1">{{ $event->contactPerson ? $event->contactPerson : $event->contactEmail }}</p>
                        </div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1 stroke-slate-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                            <p class="text-md py-1">{{ $event->contactNumber ? $event->contactNumber : '63-871-234' }}</p>
                        </div>
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 stroke-slate-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                            <p class="text-md leading-0">{{ $event->contactEmail ? $event->contactEmail : 'registration@biblesociety.sg' }}</p>
                        </div>
                    </div>
                    <div>
                        <p class="font-thin text-sm text-neutral-700 drop-shadow mb-3">Share Event</p>
                        <div class="flex space-x-5">
                            <a href="#" class="text-gray-600 hover:text-blue-600 hover:-translate-y-0.5 duration-300">
                                <i class="fab fa-facebook text-2xl"></i>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-pink-600 hover:-translate-y-0.5 duration-300">
                                <i class="fab fa-instagram text-2xl"></i>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-zinc-700 hover:-translate-y-0.5 duration-300">
                                <i class="fab fa-tiktok text-2xl"></i>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-red-700 hover:-translate-y-0.5 duration-300">
                                <i class="fab fa-youtube text-2xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $speakerTrainer = [];
        if ($event->speakers->count() > 0) 
        {
            foreach ($event->speakers as $speaker) 
            {
                $speakerTrainer[] = $speaker;
                $speaker['type'] = 'speaker';
            }
        }
        if ($event->trainers->count() > 0) 
        {
            foreach ($event->trainers as $trainer) 
            {
                $speakerTrainer[] = $trainer;
                $trainer['type'] = 'trainer';
            }
        }
    @endphp
    @if (count($speakerTrainer) > 0)
        <div class=" border-slate-400/20 pt-5 bg-zinc-100/50 pb-20">
            <div class="max-w-6xl mx-auto lg:px-0 px-4 pb-16">
                <h3 class="text-center lg:text-4xl text-3xl text-meta-4/80 font-nunito font-extrabold mt-8">

                    @if ($event->speakers->count() === 1)
                        Speaker
                    @elseif ($event->speakers->count() > 1)
                        Speakers
                    @endif

                    @if ($event->speakers->count() > 0)
                        & 
                    @endif

                    @if ($event->trainers->count() === 1)
                        Trainer
                    @elseif ($event->trainers->count() > 1)
                        Trainers
                    @endif
                </h3>
                
                <div class="mt-10 grid {{ count($speakerTrainer) > 1 ? 'xl:grid-cols-2' : 'grid-cols-1' }} gap-6 justify-center xl:mx-0 mx-auto">
                    @foreach ($speakerTrainer as $speaker)
                        <div class="p-4 flex w-full lg:flex-row flex-col lg:justify-start xl:items-start items-center justify-center gap-5">
                            <div class="flex w-1/2 flex-col items-center justify-center gap-3">
                                <img src="{{$speaker->thumbnail}}" alt="Speaker" class="rounded-full w-32 h-32 lg:w-26 lg:h-26 object-cover">
                                <p class="text-xs border border-meta-4/10 text-meta-4/80 bg-meta-4/10 rounded-full px-3 py-0.5 font-extrabold capitalize italic">{{ $speaker['type'] }}</p>
                            </div>
                            <div class="flex flex-col gap-2 lg:items-start text-center lg:text-left">
                                <h4 class="font-bold text-2xl font-nunito">{{ $speaker->name }}</h4>
                                <p class="font-thin italic">{{ $speaker->profession }}</p>
                                <p class="text-gray-600 text-md">
                                    {!! $speaker->about !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <div class="border-t-2 border-slate-400/20 pt-8 bg-zinc-300/40 pb-20">
        @if ($event->promotions->count() > 0)
            <div class="max-w-6xl mx-auto lg:px-0 px-4 pb-16">
                <h3 class="text-center lg:text-4xl text-3xl text-meta-4/80 font-nunito font-extrabold mt-8 mb-3">Conference Rate Packages</h3>
                <p class="text-center lg:text-2xl text-xl text-meta-4/80 font-nunito mb-10">
                    Pick the webinar plan that's right for you. 
                    Provide an opportunity for attendees to learn from experts in a convenient and cost-effective way.
                </p>
               
                <div class="{{ $event->promotions->count() < 4 ? 'flex xl:flex-row flex-col' : 'grid lg:grid-cols-4 grid-cols-1' }} gap-8 justify-center items-center">
                    @foreach ($event->promotions as $key => $promotion)
                        <livewire:promotion-card 
                            :promotion="$promotion" 
                            :totalPromotions="$event->promotions->count()" 
                            :label="'Register Now'" 
                            :programType="$programType"
                            :key="$key"
                        />
                    @endforeach
                </div>
                @livewire('modal.registration-form-modal')
            </div>
        @else
            <div id="registration-form" class="pb-8 max-w-5xl mx-auto lg:px-0 px-4">
                <h3 class="text-center text-4xl text-meta-4/80 font-nunito font-extrabold my-8">Start your registration now!</h3>
                <p class="text-center text-2xl text-meta-4/80 font-nunito my-8">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                </p>
                <br />
                <div class="flex flex-col justify-center items-center mt-auto"> 
                    <livewire:promotion-card 
                        :label="'Register Now'" 
                        :programType="$programType"
                        key="nopromotion"
                    />
                </div>
                @livewire('modal.registration-form-modal')
            </div>
        @endif
    </div>

    {{-- footer --}}
    {{-- <div class="bg-slate-800 p-8">
        <div class="mt-5 max-w-6xl mx-auto lg:px-0 px-4">
            <p class="text-white font-nunito text-sm text-center">
                &copy; {{ date('Y') }} Streams Of Life. All rights reserved.
            </p>
        </div>
    </div> --}}
    <x-footer-public />
</x-guest-layout>