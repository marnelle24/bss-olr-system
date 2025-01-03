<div class="flex-none snap-center group w-full">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition hover:-translate-y-1 duration-300">
        <div class="relative">
            <img src="{{ $event->thumb }}" class="w-full object-cover h-48 sm:h-48 md:h-52 lg:h-52" alt="{{ $event->title }}">
        </div>
        <div class="p-4 sm:p-6 h-[250px] overflow-hidden relative">
            <div class="absolute bottom-0 left-0 h-[250px] right-0 bg-black bg-opacity-80 transition-all duration-300 transform -translate-y-full group-hover:translate-y-0 opacity-0 group-hover:opacity-100">
                <div class="p-4 relative h-[250px] flex flex-col gap-2">
                    <div class="flex flex-col">
                        <p class="text-white drop-shadow font-thin text-sm">Date:</p>
                        <p class="text-white drop-shadow font-bold sm:text-lg">
                            {{ \Carbon\Carbon::parse($event->startDate)->format('M j') }} - {{ \Carbon\Carbon::parse($event->endDate)->format('M j, Y') }}
                        </p>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-white drop-shadow font-thin text-sm">Venue:</p>
                        <p class="text-white drop-shadow font-bold text-md">
                            {!! Str::words($event->venue, 5, '...') !!}
                        </p>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-white drop-shadow font-thin text-sm">Hosted by:</p>
                        <p class="text-white drop-shadow font-bold text-base sm:text-lg">
                            {{ $event->partner->name}}
                        </p>
                    </div>
                </div>
            </div>
            <h3 class="text-xl sm:text-2xl font-bold mb-2 text-slate-700 leading-0">
                {!! Str::words($event->title, 5, '...') !!}
            </h3>
            <p class="text-slate-600 mb-4 min-h-[120px] text-sm leading-tight">
                {!! $event->excerpt !!}
            </p>
            <div class="absolute inset-x-0 bottom-4">
                <div class="flex justify-between items-center px-4">
                    <div class="relative">
                        @if($event->promotions && $event->promotions->count() > 0)
                            <p class="text-white drop-shadow font-bold text-sm absolute top-[-22px] z-50 uppercase left-0 bg-red-500 px-1.5" style="transform: rotate(-10deg);">Promo</p>
                        @endif
                        <p class="drop-shadow font-bold bg-slate-700 group-hover:bg-slate-100 group-hover:text-slate-700 group-hover:border-slate-700 group-hover:border text-white px-3 py-1.5 text-sm rounded-full duration-300 hover:bg-slate-500 uppercase">
                            {{ $event->price > 0 ? 'SG$ '.number_format($event->price, 2) : 'Free' }}
                        </p>
                    </div>
                    <a href="{{ route('event-profile.public', $event->programCode) }}" 
                        class="bg-teal-500 text-white px-3 py-1.5 hover:-translate-y-0.5 text-sm rounded-full duration-300 hover:bg-teal-600 shadow drop-shadow">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> 