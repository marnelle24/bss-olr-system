@props(['venue'])
<div class="flex flex-col gap-2">
    <div class="flex gap-2 space-x-4">
        <img src="{{ asset('images/location1.png') }}" alt="location" class="w-6 h-6">
        <p class="text-md text-black" style="margin-left: 2px;">
            {!! $venue !!}
        </p>
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