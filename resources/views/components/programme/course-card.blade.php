@props(['course'])
<div class="overflow-hidden relative border-2 border-teal-700/50 bg-gradient-to-r from-white/70 via-white to-white/70 shadow rounded py-8 xl:px-10 px-5 gap-2 hover:from-white hover:to-white hover:via-white/60 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 flex xl:flex-row flex-col items-start">
    {{-- @if($course['isPromo']) --}}
        <div class="flex justify-center items-end drop-shadow absolute -top-3 -right-15 bg-gradient-to-r from-red-500/70 via-red-300/70 to-red-500/70 px-4 py-3 h-20 w-40 transform rotate-45">
            <p class="text-white text-center text-md font-nunito uppercase font-bold drop-shadow">Promo</p>
        </div>
    {{-- @endif --}}
    <img src="{{ $course->thumb }}" alt="{{ $course->title }}" class="bg-teal-500/70 mx-auto rounded-full shadow-md xl:h-32 xl:w-32 h-40 w-40">
    <div class="h-60 relative pl-4 xl:w-auto w-full">
        <h3 class="text-slate-500 text-md font-bold">{{ $course->title }}</h3>
        <p class="text-slate-800 mt-2 text-xs overflow-hidden">{!! Str::words($course->excerpt, 16, '...') !!}</p>
        <div class="flex flex-col justify-start items-start gap-3 mt-4">
            <div class="flex xl:items-start items-center gap-1">
                <img src="{{ asset('images/speaker-trainer/speaker-dummy.png') }}" alt="{{ $course->title }}" class="bg-teal-500/70 rounded-full shadow border border-teal-700/80 h-6 w-6">
                <p class="text-slate-800 drop-shadow text-sm">{{ 'John Doe III' }}</p>
            </div>
        </div>
        <div class="absolute bottom-0 flex xl:items-start items-center xl:w-auto w-full gap-3">
            <a href="{{ route('programme.public.show', [$course->programmeType, $course->programmeCode]) }}" class="bg-slate-600 text-white hover:bg-slate-700 px-3 shadow-sm duration-300 py-2 text-sm rounded-full hover:-translate-y-0.5">
                Read More
            </a>
            <p class="text-slate-800 bg-gradient-to-r from-teal-500/70 via-teal-400 to-teal-500/70 px-2.5 font-bold py-1.5 text-sm rounded-full border-2 border-teal-500 shadow-sm drop-shadow">
                {{ 'SG$'.number_format($course->price, 2) }}
            </p>
        </div>
    </div>
</div>