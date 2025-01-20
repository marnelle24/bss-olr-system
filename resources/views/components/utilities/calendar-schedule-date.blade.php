@props(['startDate', 'endDate', 'startTime', 'endTime', 'customDate'])

<div class="flex gap-2">
    <div class="relative w-10 h-10">
        <img src="{{ asset('images/calendar.png') }}" alt="Calendar" class="w-10 h-10 z-10 absolute top-0 left-0">
        <p class="text-black text-center mt-4 flex items-center justify-center font-extrabold font-nunito uppercase text-sm">{{ $month }}</p>
    </div>

    <div class="flex flex-col">
        @if ($customDate)
            <p class="text-md leading-relaxed text-black">
                {!! $customDate !!}
            </p>
        @else
            <p class="text-lg text-black">
                {{ \Carbon\Carbon::parse($startDate)->format('M j') . ' - ' . \Carbon\Carbon::parse($endDate)->format('M j, Y') }}
            </p>
            <p class="text-sm text-black">
                {{ \Carbon\Carbon::parse($startTime)->format('g:i A') . ' - ' . \Carbon\Carbon::parse($endTime)->format('g:i A') }}
            </p>
        @endif
    </div>
</div>