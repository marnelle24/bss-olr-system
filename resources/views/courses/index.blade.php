<x-guest-layout>
    <div
        style="
            background-size:top; 
            background-repeat:none; 
            background-size:cover; 
            filter: grayscale(100%); 
            -webkit-background-size: cover; 
            -moz-background-size: cover; 
            -o-background-size: cover; 
            position: top center;
            background-image: linear-gradient( rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7) ), 
            url({{asset('images/course-bg.png')}});"
        {{-- style="background-image: url('{{asset('images/course-bg.png')}}'); background-size: cover; filter: grayscale(100%); position: top center; background-opacity: 0.9; color: rgba(0, 0, 0, 0.5);" --}}
        class="min-h-[50vh] flex justify-center items-center">
        <div class="w-full h-full flex flex-col gap-4 justify-center items-center">
            <h1 class="xl:text-6xl text-4xl font-bold uppercase tracking-wider drop-shadow text-white/80">Courses</h1>
            <p class="text-white/70 xl:text-2xl text-xl text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
        </div>
    </div>
    <div class="relative min-h-screen bg-gradient-to-b from-zinc-50 via-25% via-teal-100/60 to-teal-500/60">    
        <div id="categoryList" class="w-full flex overflow-x-auto xl:justify-center justify-start items-center xl:gap-10 gap-3 pt-10 pb-5 xl:px-0 px-5">
            @foreach ($categories as $category)
                <div class="group">
                    <a href="/" class="whitespace-nowrap xl:text-md text-sm text-slate-600 drop-shadow hover:text-slate-500 duration-300 group-hover:text-teal-700 tracking-wide">{{ $category->name }}</a>
                    <hr class="border-2 border-teal-700 group-hover:w-full duration-300 opacity-0 group-hover:opacity-100" />
                </div>
            @endforeach
        </div>
        
        <div id="searchForm" class="max-w-6xl mx-auto xl:px-0 px-5">
            <div class="relative w-full">
                <span class="absolute inset-y-0 left-0 pl-8 flex items-center text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="stroke-slate-500 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </span>
                <input 
                    {{-- wire:model.live.debounce.500ms="search" --}}
                    type="search" 
                    class="pl-16 w-full px-2 py-4 placeholder:text-slate-500 placeholder:font-light placeholder:text-lg focus:outline-none border border-slate-400 focus:ring-0 focus:ring-slate-500 focus:border-slate-600" 
                    placeholder="Search Courses"
                >
            </div>
        </div>
        
        
        <div class="relative py-8 max-w-6xl mx-auto min-h-screen xl:px-0 px-5">
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">
                @foreach ($programmes as $programme)
                    <x-programme.course-card :course='$programme' />
                @endforeach
            </div>
            <div class="mt-4 xl:absolute bottom-12 left-0 w-full">
                {{ $programmes->links() }}
            </div>
        </div>

    </div>
    <x-footer-public />
</x-guest-layout>