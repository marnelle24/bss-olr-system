<x-guest-layout>
    <div class="relative min-h-screen bg-gradient-to-b from-zinc-50 via-25% via-teal-100/20 to-teal-400/40">
        <div class="relative w-full xl:h-[650px] h-auto overflow-hidden">
            <div class="max-w-6xl mx-auto px-4 py-16">
                <div class="flex gap-4">
                    <div class="flex flex-col gap-4 w-2/3 xl:px-0 px-4">
                        <div class="flex flex-col gap-4">
                            <h1 class="text-4xl font-bold tracking-wide drop-shadow text-slate-800">
                                {{ $programme->title }}
                            </h1>
                            <div class="flex gap-2">
                                <p class="text-slate-800 bg-slate-300/50 border border-slate-300/90 px-2.5 py-1 rounded-md text-xs">
                                    Published on {{ $programme->created_at->format('d F Y') }}
                                </p>
                                <p class="text-slate-800 bg-teal-300/50 border border-teal-400/70 px-2.5 py-1 rounded-md text-xs">
                                    By: {{ $programme->partner->name }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-6 flex flex-col gap-2">
                            <p class="text-slate-800 leading-normal text-sm font-bold italic">Course Description:</p>
                            <p class="text-slate-800 leading-normal text-md">
                                {!! $programme->description !!}
                            </p>
                        </div>
                    </div>
                    <div class="w-1/3 xl:px-0 px-4">
                        <p class="text-slate-800 text-sm">
                            About the trainers
                        </p>
                    </div>
                </div>
                </h1>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <x-footer-public />

</x-guest-layout>