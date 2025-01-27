<x-guest-layout>
    <div class="relative min-h-screen bg-gradient-to-b from-zinc-50 via-25% via-teal-100/20 to-teal-400/40">
        <div class="relative w-full">
            <div class="max-w-6xl mx-auto px-4 py-16">
                <div class="flex flex-col gap-3">
                    <h1 class="text-4xl font-bold tracking-wide drop-shadow text-slate-800">{{ $programme->title }}</h1>
                    <p class="text-xs text-slate-600">By: {{ $programme->partner->name }} | Published on {{ $programme->created_at->format('F d, Y') }}</p>
                </div>
                <div class="mt-8 flex flex-col xl:flex-row xl:space-x-8 gap-4">
                    <div class="flex flex-col w-full xl:w-2/3 xl:px-0 px-4">
                        <div class="mt-6 flex flex-col gap-2">
                            <p class="text-slate-800 leading-normal text-lg font-bold">About the course:</p>
                            <p class="text-slate-800 leading-normal text-md">
                                {!! $programme->description !!}
                            </p>
                        </div>
                        <br />
                        <br />
                        <x-programme.course-timeline :programme="$programme" />
                    </div>
                    <div class="w-full xl:w-1/3 xl:px-0 px-4">
                        <div class="bg-slate-200/50 p-4 shadow min-h-[400px]">
                            <p class="text-slate-800 text-sm">
                                About the trainers
                            </p>
                        </div>
                    </div>
                </div>
                </h1>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <x-footer-public />

</x-guest-layout>