<x-guest-layout>
    <div class="bg-gradient-to-br from-slate-600 via-stone-500/70 to-meta-9 p-4 min-h-[40vh] flex justify-center items-center">
        <h1 class="text-6xl uppercase tracking-wider drop-shadow text-white">Courses</h1>
    </div>
    <div class="lg:mt-5 min-h-screen max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            
            @foreach ($courses as $course)
                <div class="bg-white p-4 rounded-lg shadow-md">
                    @dump($course)
                    {{-- <h2 class="text-2xl font-bold">{{ $course->title }}</h2> --}}
                    {{-- <p class="text-gray-600">{{ $course->description }}</p> --}}
                </div>
            @endforeach
        </div>
    </div>
    <x-footer-public />
</x-guest-layout>