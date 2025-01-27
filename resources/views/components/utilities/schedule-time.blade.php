@props(['startTime', 'endTime'])

<div class="flex flex-col gap-2">
    <div class="flex items-center gap-2 space-x-4">
        <img src="{{ asset('images/watch1.png') }}" alt="location" class="w-10 h-10">
        <p class="text-md text-black" style="margin-left: 5px;">
            {{ \Carbon\Carbon::parse($startTime)->format('g:i A') . ' - ' . \Carbon\Carbon::parse($endTime)->format('g:i A') }}
        </p>
    </div>
</div>