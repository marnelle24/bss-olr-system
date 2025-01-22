@props(['course'])
<div class="flex-none snap-center group
    w-[90vw] 
    sm:w-[60vw] 
    md:w-[45vw] 
    lg:w-[30vw] 
    xl:w-[350px]"
>
    <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition hover:-translate-y-1 duration-300">
        <div class="relative">
            <img src="{{ $course->thumb }}" 
                class="w-full object-cover h-48 sm:h-52 md:h-56 lg:h-60" alt="{{ $course->title }}">
        </div>
        <div class="p-4 sm:p-6 h-[250px] overflow-hidden relative">
            <div class="absolute bottom-0 left-0 h-[250px] right-0 bg-black bg-opacity-80 transition-all duration-300 transform -translate-y-full group-hover:translate-y-0 opacity-0 group-hover:opacity-100">
                <div class="p-4 relative h-[250px] flex flex-col gap-2">
                    <div class="flex flex-col">
                        <p class="text-white drop-shadow font-thin text-sm">Date:</p>
                        <p class="text-white drop-shadow font-bold text-base sm:text-lg">
                            {{ \Carbon\Carbon::parse($course->startDate)->format('M j') }} - {{ \Carbon\Carbon::parse($course->endDate)->format('M j, Y') }}
                        </p>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-white drop-shadow font-thin text-sm">Venue:</p>
                        <p class="text-white drop-shadow font-bold text-base sm:text-lg">
                            {!! Str::words($course->venue, 5, '...') !!}
                        </p>
                    </div>
                </div>
            </div>
            <h3 class="text-xl sm:text-2xl font-bold mb-2">
                {!! Str::words($course->title, 5, '...') !!}
            </h3>
            <p class="text-gray-600 mb-4 min-h-[120px] text-sm sm:text-base">
                {!! $course->excerpt !!}
            </p>
            <div class="absolute inset-x-0 bottom-4">
                <div class="flex justify-between items-center px-4">
                    <div class="relative">
                        @if($course->promotions && $course->promotions->count() > 0)
                            <p class="text-white drop-shadow font-bold text-md absolute top-[-22px] z-50 uppercase left-0 bg-red-500 px-1" style="transform: rotate(-10deg);">Promo</p>
                        @endif
                        <p class="drop-shadow font-bold bg-slate-700 group-hover:bg-slate-100 group-hover:text-slate-700 group-hover:border-slate-700 group-hover:border text-white px-5 py-2 text-md rounded-full duration-300 hover:bg-slate-500 uppercase">
                            {{ $course->price > 0 ? 'SG$ '.number_format($course->price, 2) : 'Free' }}
                        </p>
                    </div>
                    {{-- <a href="{{ route('event-profile.public', $course->programCode) }}"  --}}
                    {{-- <a href="{{ route('event-profile.public', $course->programCode) }}"  --}}
                    <a href="" 
                        class="bg-teal-500 text-white px-5 py-2 hover:-translate-y-0.5 text-md rounded-full duration-300 hover:bg-teal-600 border border-teal-600 shadow drop-shadow">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>