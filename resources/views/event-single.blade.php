<x-guest-layout>
    <div class="mt-5 max-w-6xl mx-auto">
        <div class="rounded-xl flex shadow">
            <img src="{{ $bss_event['thumb'] }}" alt="{{ strip_tags($bss_event['title']) }}" class="rounded-tl-xl rounded-bl-xl w-full xl:h-[350px] h-[300px] object-cover object-center">
            <div class="rounded-tr-xl rounded-br-xl p-4 w-1/2 flex justify-start flex-col gap-2 bg-gradient-to-r from-orange-1/20 to-orange-2/20">
                <h1 class="text-2xl font-bold">test</h1>
                <p class="text-sm text-gray-500">test</p>
                <p class="text-sm text-gray-500">{{ $bss_event['venue'] }}</p>
            </div>
        </div>
    </div>
    
    {{-- @dump($bss_event) --}}
    
    {{-- <div class="container mx-auto px-4 py-8">
        @dump($bss_event)
    </div> --}}
</x-guest-layout>