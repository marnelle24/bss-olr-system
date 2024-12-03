<x-guest-layout>
    <div class="lg:mt-5 max-w-6xl mx-auto lg:px-0 px-4 lg:py-10 py-3">
        <div class="rounded-xl flex lg:flex-row flex-col shadow">
            <img 
                src="{{ $event->thumb }}" 
                alt="{{ strip_tags($event->title) }}" 
                class="lg:rounded-tl-xl rounded-tl-none lg:rounded-bl-xl rounded-bl-none w-full xl:h-[475px] lg:h-[500px] h-[200px] object-cover object-center"
            >
            <div class="lg:rounded-tr-xl rounded-tr-none lg:rounded-br-xl rounded-br-none p-4 w-full lg:w-1/2 flex justify-start flex-col gap-2 bg-gradient-to-r from-zinc-100 to-zinc-200">
                <h1 class="text-4xl font-bold">{{ strip_tags($event->title) }}</h1>
                <p class="mt-4 text-sm leading-relaxed text-black ">
                    {{ Str::words(strip_tags($event->description), 25, '...') }}
                </p>

                <div>
                    <div class="flex items-center justify-between mt-2">
                        <a href="#registration-form" 
                            class="bg-gradient-to-tl 
                            from-orange-1 
                            via-orange-300 
                            to-orange-1 
                            bg-size-200 
                            bg-pos-0 
                            hover:bg-pos-100
                            hover:-translate-y-1
                            text-white
                            drop-shadow
                            px-6 
                            py-2 
                            text-lg 
                            font-bold 
                            rounded-xl 
                            shadow 
                            hover:shadow-lg 
                            transition-all 
                            duration-300"
                        >
                            Register Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-12 flex lg:flex-row flex-col lg:gap-0 gap-8 max-w-6xl mx-auto">
            <h3 class="text-3xl font-nunito font-extrabold my-4">About Event</h3>
        </div>
        <div class="flex lg:flex-row flex-col lg:gap-0 gap-10 lg:space-x-10 space-x-0 max-w-6xl mx-auto">
            <div class="w-full lg:w-2/3">
                <div class="text-lg text-gray-500">
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
            <div class="w-full flex flex-col gap-6 lg:w-1/3">
                <div class="flex items-start gap-1 space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 stroke-zinc-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                    <div>
                        @if ($event->customDate)
                            <p class="lg:text-md text-xl leading-relaxed text-black">
                                {!! $event->customDate !!}
                            </p>
                        @else
                            <p class="lg:text-md text-xl leading-relaxed text-black">{{ \Carbon\Carbon::parse($event->startDate . ' ' . $event->startTime)->format('F j, Y, g:i A') }}</p>
                            <p class="lg:text-md text-xl leading-relaxed text-black">{{ \Carbon\Carbon::parse($event->endDate . ' ' . $event->endTime)->format('F j, Y, g:i A') }}</p>
                        @endif
                    </div>
                </div>
                <div class="flex flex-wrap items-start gap-1">
                    <div class="flex space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="lg:w-14 lg:h-14 w-16 h-16 stroke-zinc-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
    
                        <div>
                            <p class="lg:text-md text-xl text-black">
                                {!! $event->venue !!}
                            </p>
                        </div>
                    </div>
                    <div class="mt-4 w-full">
                        <div class="opacity-60 w-full h-48 bg-zinc-700 text-white/50 flex flex-col items-center justify-center border border-slate-700">
                            Map Location Here
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-6">
                    <div>
                        <p class="font-thin text-sm text-neutral-600 drop-shadow mb-1">Organized by:</p>
                        <div class="flex">
                            <p class="font-extrabold shadow-md font-nunito text-sm text-white bg-meta-3/80 border border-meta-3 rounded-full px-2 py-1">
                                {{ $event->partner->name }}
                            </p>
                        </div>
                    </div>
                    <div>
                        <p class="font-thin text-sm text-neutral-600 drop-shadow mb-1">For inquiries, contact:</p>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline-block mr-1 align-text-bottom text-slate-500 dark:text-slate-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            <p class="font-extrabold text-md py-1">{{ $event->contactPerson }}</p>
                        </div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1 stroke-slate-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                            <p class="font-extrabold text-md py-1">{{ $event->contactEmail ? $event->contactEmail : 'registration@biblesociety.sg' }}</p>
                        </div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1 stroke-slate-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                            <p class="font-extrabold text-md py-1">{{ $event->contactNumber ? $event->contactNumber : '63-871-234' }}</p>
                        </div>
                    </div>
                    <div>
                        <p class="font-thin text-sm text-neutral-700 drop-shadow mb-3">Share Event</p>
                        <div class="flex space-x-5">
                            <a href="#" class="text-gray-600 hover:text-blue-600 hover:-translate-y-0.5 duration-300" aria-label="Facebook">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-pink-600 hover:-translate-y-0.5 duration-300" aria-label="Instagram">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-zinc-700 hover:-translate-y-0.5 duration-300" aria-label="TikTok">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z" />
                                </svg>
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
                        @livewire('promotion-card', [
                            'promotion' => $promotion, 
                            'totalPromotions' => $event->promotions->count(), 
                            'label' => 'Register Now',
                            'programType' => $programType
                        ], key($key))
                    @endforeach
                </div>
            </div>
        @endif

        <div id="registration-form" class="pb-8 max-w-5xl mx-auto lg:px-0 px-4">
            <h3 class="text-center text-4xl text-meta-4/80 font-nunito font-extrabold my-8">Start your registration now!</h3>
            <p class="text-center text-2xl text-meta-4/80 font-nunito my-8">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
            </p>
            <div class="border border-slate-400/20 bg-white lg:p-12 p-6 rounded-lg shadow-lg">
                {{-- Registration Form --}}
                {{-- @livewire('guest.registration-form', ['eventDetails' => $event]) --}}
            </div>
        </div>
    </div>

    {{-- footer --}}
    <div class="bg-slate-800 p-8">
        <div class="mt-5 max-w-6xl mx-auto lg:px-0 px-4">
            <p class="text-white font-nunito text-sm text-center">
                &copy; {{ date('Y') }} Streams Of Life. All rights reserved.
            </p>
        </div>
    </div>

    @livewire('modal.registration-form')

</x-guest-layout>