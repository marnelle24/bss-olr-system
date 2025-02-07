<x-guest-layout>
    <div class="relative min-h-screen bg-gradient-to-b from-zinc-50 via-25% via-teal-100/20 to-teal-600/50">
        <div class="relative w-full">
            <div class="max-w-6xl mx-auto px-4 py-16">
                <div class="flex flex-col gap-3">
                    <h1 class="text-4xl font-bold tracking-wide drop-shadow text-slate-800">{{ $programme->title }}</h1>
                    <p class="text-xs text-slate-600">By: {{ $programme->partner->name }} | Published on {{ $programme->created_at->format('F d, Y') }}</p>
                </div>
                <div class="mt-8 flex flex-col xl:flex-row xl:space-x-8 gap-4">
                    <div class="flex flex-col w-full xl:w-2/3 xl:px-0 px-4">
                        <div class="mt-6 flex flex-col gap-2">
                            <p class="text-slate-800 leading-normal text-lg font-bold">Description:</p>
                            <p class="text-slate-800 leading-normal text-md">
                                {!! $programme->description !!}
                            </p>
                        </div>
                        <br />
                        <br />
                        <x-programme.course-timeline :programme="$programme" />
                    </div>
                    <div class="w-full xl:w-1/3 xl:px-0 px-4 flex flex-col gap-4">
                        <img src="{{ $programme->thumb }}" alt="{{ $programme->title }}" class="w-full" />
                        <div class="p-4 bg-slate-300/50 border border-slate-400/20 rounded flex flex-col gap-2">
                            <div class="flex flex-col">
                                <p class="text-slate-500 text-xs italic">Phone Number:</p>
                                <p class="text-slate-800 text-md">{{ $programme->contactNumber ? $programme->contactNumber : 'N/A' }}</p>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-slate-500 text-xs italic">Email Address:</p>
                                <p class="text-slate-800 text-md">{{ $programme->contactEmail ? $programme->contactEmail : 'N/A' }}</p>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-slate-500 text-xs italic">For inquiry, pls contact:</p>
                                <p class="text-slate-800 text-md">{{ $programme->contactPerson ? $programme->contactPerson : 'N/A' }}</p>
                            </div>
                        </div>
                        @if (count($programme->categories) > 0)
                            <div>
                                <p class="text-slate-800 text-md font-nunito font-medium mt-4">Categories:</p>
                                <div class="flex flex-wrap gap-2 mt-2">
                                    @foreach ($programme->categories as $category)
                                        <a href="#!" class="text-white font-bold hover:-translate-y-0.5 transition-all duration-300 hover:bg-teal-600 drop-shadow shadow-sm bg-meta-3 text-sm whitespace-nowrap border border-slate-400/40 rounded-full px-2 py-0.5">
                                            {{ $category->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                </h1>
            </div>
        </div>
    </div>


    @if (count($programme->trainers) > 0)
        <div class=" border-slate-400/20 pt-5 bg-zinc-100/50 pb-20">
            <div class="max-w-6xl mx-auto lg:px-0 px-4 pb-16">
                <h3 class="text-center lg:text-4xl text-3xl text-meta-4/80 font-nunito font-extrabold mt-8">
                    @if($programme->programmeType === 'event')
                        Speakers
                    @else
                        Trainers
                    @endif
                </h3>
                
                <div class="mt-10 grid {{ count($programme->trainers) > 1 ? 'xl:grid-cols-2' : 'grid-cols-1' }} gap-6 justify-center xl:mx-0 mx-auto">
                    @foreach ($programme->trainers as $trainer)
                        <div class="p-4 flex w-full lg:flex-row flex-col lg:justify-start xl:items-start items-center justify-center gap-5">
                            <div class="flex w-1/2 flex-col items-center justify-center gap-3">
                                <img src="{{$trainer->thumbnail}}" alt="trainer" class="rounded-full w-32 h-32 lg:w-26 lg:h-26 object-cover">
                            </div>
                            <div class="flex flex-col gap-2 lg:items-start text-center lg:text-left">
                                <h4 class="font-bold text-2xl font-nunito">{{ $trainer->name }}</h4>
                                <p class="font-thin italic">{{ $trainer->profession }}</p>
                                <p class="text-gray-600 text-md">
                                    {!! $trainer->about !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif



    <div class="border-t-2 border-slate-400/20 pt-8 bg-zinc-300/40 pb-20">

        {{-- Registration with Promotion --}}

        {{-- 
        @if ($programme->promotions->count() > 0)
            <div class="max-w-6xl mx-auto lg:px-0 px-4 pb-16">
                <h3 class="text-center lg:text-4xl text-3xl text-meta-4/80 font-nunito font-extrabold mt-8 mb-3">Conference Rate Packages</h3>
                <p class="text-center lg:text-2xl text-xl text-meta-4/80 font-nunito mb-10">
                    Pick the webinar plan that's right for you. 
                    Provide an opportunity for attendees to learn from experts in a convenient and cost-effective way.
                </p>
               
                <div class="{{ $programme->promotions->count() < 4 ? 'flex xl:flex-row flex-col' : 'grid lg:grid-cols-4 grid-cols-1' }} gap-8 justify-center items-center">
                    @foreach ($programme->promotions as $key => $promotion)
                        <livewire:promotion-card 
                            :promotion="$promotion" 
                            :totalPromotions="$programme->promotions->count()" 
                            :label="'Register Now'" 
                            :programType="$programme->programmeType"
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
                        :programType="$programme->programmeType"
                        key="nopromotion"
                    />
                </div>
                @livewire('modal.registration-form-modal')
            </div>
        @endif 
        --}}

        {{-- Registration Area --}}
        <div id="registration-form" class="pb-8 max-w-5xl mx-auto lg:px-0 px-4">
            <h3 class="text-center text-4xl text-meta-4/80 font-nunito font-extrabold my-8">Start your registration now!</h3>
            <p class="text-center text-2xl text-meta-4/80 font-nunito my-8">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
            </p>
            <br />
            <div class="pb-8 max-w-5xl mx-auto lg:px-0 px-4 flex justify-center items-center"> 
                <livewire:promotion-card 
                    :label="$programme->programmeType === 'event' ? 'Register Now' : 'Enroll Now'" 
                    :programType="$programme->programmeType"
                    key="nopromotion"
                />
            </div>
            @livewire('modal.registration-form-modal')
        </div>


    </div>




    {{-- <div id="registration-form" class="pb-16 pt-8 max-w-5xl mx-auto lg:px-0 px-4">
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
                :programType="$programme->programmeType"
                key="nopromotion"
            />
        </div>
        @livewire('modal.registration-form-modal')
    </div> --}}

    <!-- Footer -->
    <x-footer-public />

</x-guest-layout>