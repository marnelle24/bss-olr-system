<div class="mx-auto w-full h-full">
    <p class="text-slate-800 leading-normal text-lg font-bold mb-4">Topics & Resources</p>
    <div class="relative h-full w-full">
        @php
            $outlines = [
                [
                    'title' => 'Introduction',
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
                ],
                [
                    'title' => 'Topic #1',
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
                ],
                [
                    'title' => 'Topic #2',
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
                ],
                [
                    'title' => 'Topic #3',
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
                ],
                [
                    'title' => 'Conclusion',
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
                ],
            ];
        @endphp
        @foreach ($outlines as $outline)
            <div class="mb-8 flex justify-between items-center w-full">
                <div class="z-20">
                    <div class="my-4 rounded-full h-10 w-10 flex items-center bg-indigo-300 ring-4 ring-indigo-400 ring-opacity-30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div class="ml-4 order-1 bg-white/60 rounded-lg shadow w-full px-6 py-4">
                    <h3 class="mb-3 font-bold text-gray-800 text-xl">{{ $outline['title'] }}</h3>
                    <p class="text-base leading-snug tracking-wide text-gray-900 text-opacity-100">
                        {{ $outline['description'] }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>
