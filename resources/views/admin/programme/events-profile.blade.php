@section('title', 'Event Profile | SOL Online Registration')
<x-app-layout>
    {{-- @dd($bss_event->categories) --}}
    @if(session('success'))
        <p 
            x-transition:leave.opacity.duration.1000ms
            x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)"
            class="rounded-md bg-green-100/50 border border-green-700/50 shadow my-4 p-3 text-green-700 text-sm">
            {{ session('success') }}
        </p>
    @endif
    <div>
        <div class="flex flex-col xl:flex-row lg:flex-row md:flex-row gap-1 xl:gap-4 lg:gap-4 md:gap-4 items-start lg:items-center">
            <h1 class="drop-shadow-lg text-4xl font-bold text-slate-800 dark:text-white capitalize mb-2">
                {{ strip_tags($bss_event['title']) }}
            </h1>
        </div>
        <p class="bg-meta-5 dark:bg-meta-3 inline-block text-xs text-white py-1 px-2 rounded-lg mb-2">Organised by {{$bss_event->partner->name}}</p>
        <p class="text-xs text-black dark:text-white/70 italic mb-8">Last Updated: {{ \Carbon\Carbon::parse($bss_event['last_update'])->format('F j, Y') }}</p>
        
        @livewire('admin.programme.events.chart-component')
        
        <p class="text-xl font-bold text-slate-800 dark:text-white capitalize mb-2">
            Event Details
        </p>
        <div class="flex flex-col md:flex-row gap-5 mb-8">
            <div class="w-full xl:w-3/4">
                <div class="xl:hidden lg:hidden md:hidden block">
                    @php
                        $thumbUrl = $bss_event['thumb'];
                        if (!str_starts_with($thumbUrl, 'https://www.biblesociety.sg')) {
                            $thumbUrl = 'https://www.biblesociety.sg' . $thumbUrl;
                        }
                    @endphp
                    <img src="{{ $thumbUrl }}" alt="{{ strip_tags($bss_event['title']) }}" class="mb-5 w-full object-cover border-white border-[7px] shadow-md">
                </div>
                <div class="bg-white dark:bg-slate-900/60 border border-slate-400 text-black dark:text-white p-4 rounded-lg shadow-sm mb-8">
                    <p class="font-bold italic text-black dark:text-white text-sm mb-2">Description:</p>
                    <p class="text-sm leading-relaxed text-black dark:text-white">
                        {{ strip_tags($bss_event['description']) }}
                    </p>

                    <p class="mt-4 font-bold italic text-black dark:text-white text-sm mb-2">Excerpt:</p>
                    <p class="text-sm leading-relaxed text-black dark:text-white">
                        {{ strip_tags($bss_event['excerpt']) }}
                    </p>
                </div>
                <p class="mt-8 font-bold text-black dark:text-white text-md mb-2">Contact Information</p>
                <table class="w-full bg-white dark:bg-slate-900/60">
                    <tbody>
                        <tr>
                            <td class="w-1/4 border border-slate-400 text-black dark:text-white px-4 py-3 font-semibold">Program Code</td>
                            <td class="border border-slate-400 text-black dark:text-white px-4 py-3">{{ strip_tags($bss_event['programCode']) }}</td>
                        </tr>
                        <tr>
                            <td class="border border-slate-400 text-black dark:text-white px-4 py-3 font-semibold">Contact Person</td>
                            <td class="border border-slate-400 text-black dark:text-white px-4 py-3">{{ strip_tags($bss_event['contactPerson']) }}</td>
                        </tr>
                        <tr>
                            <td class="border border-slate-400 text-black dark:text-white px-4 py-3 font-semibold">Contact Email Address</td>
                            <td class="border border-slate-400 text-black dark:text-white px-4 py-3">{{ strip_tags($bss_event['contactEmail']) }}</td>
                        </tr>
                    </tbody>
                </table>

                <p class="mt-8 font-bold text-black dark:text-white text-md mb-2">Cheque Payment Details</p>
                <table class="w-full bg-white dark:bg-slate-900/60">
                    <tbody>
                        <tr>
                            <td class="w-1/4 border border-slate-400 text-black dark:text-white px-4 py-3 font-semibold">Cheque Payment Code</td>
                            <td class="border border-slate-400 text-black dark:text-white px-4 py-3">{{ $bss_event['chequeCode'] ? strip_tags($bss_event['chequeCode']) : 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border border-slate-400 text-black dark:text-white px-4 py-3 font-semibold">Check Payable to</td>
                            <td class="border border-slate-400 text-black dark:text-white px-4 py-3">{{ strip_tags($bss_event['contactPerson']) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border border-slate-400 text-black dark:text-white px-4 py-3">
                                <p class="font-bold text-black dark:text-white text-md mb-2">Check Payment Instructions</p>
                                <ul class="list-disc list-inside text-sm italic text-black dark:text-white/70">
                                    <li class="list-none">
                                        1.  make the cheque payable to the above name and send it to the following address:
                                    </li>
                                    <li class="list-none">2. Office Address: The Bible House, 7th Armenian Street, Singapore 179957</li>
                                    <li class="list-none">3. Office Hours: Monday to Friday, 9:00 AM to 5:00 PM</li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @if ($bss_event['settings'])
                    <p class="mt-8 font-bold text-black dark:text-white text-md mb-2">Additional Settings</p>
                    <div class="w-full bg-white dark:bg-slate-900/60">
                        <p class="text-black dark:text-white px-4 py-3">Test</p>
                    </div>
                @endif

                @if ($bss_event['extraFields'])
                    <p class="mt-8 font-bold text-black dark:text-white text-md mb-2">Extra Fields (For Custom Form Registration)</p>
                    <div class="w-full bg-white dark:bg-slate-900/60">
                        <p class="text-black dark:text-white px-4 py-3">Test</p>
                    </div>
                @endif

                <p class="mt-8 font-bold text-black dark:text-white text-md mb-2">Extra Fields (For Custom Form Registration)</p>
                <div class="w-full bg-white dark:bg-slate-900/60 p-4">
                    <p class="text-black dark:text-white">Extra Fields Details Here...</p>
                </div>

                <div id="program-categories" class="mt-8 mb-2 flex justify-between items-center">
                    <p class="font-bold text-black dark:text-white text-md">Categories</p>
                    
                    @livewire('modal.program-item-category', ['programCode' => $bss_event['programCode'], 'programCategories' => $bss_event->categories])

                </div>
                <div class="w-full bg-white dark:bg-slate-900/60 p-4">
                    @foreach ($bss_event->categories as $category)
                        <p class="bg-meta-5/80 hover:bg-meta-5/90 shadow-md duration-300 border border-meta-5/80 hover:scale-105 text-white justify-between items-center dark:bg-meta-3 dark:border-white/70 inline-flex py-1 px-3 text-sm rounded-full mr-2">
                            {{ $category->name }}
                        </p>
                    @endforeach
                </div>
                {{-- @dump($bss_event) --}}

                <div class="gap-2 mt-8 flex-col xl:flex-row lg:flex-row md:flex-row xl:flex lg:flex md:flex hidden">
                    <a href="{{ route('event-profile.public', substr($bss_event['programCode'], 0, -1)) }}" target="_blank" class="shadow hover:-translate-y-0.5 dark:bg-slate-700 bg-blue-500 hover:bg-blue-700 dark:hover:bg-blue-700 duration-300 text-white py-3 px-4 rounded">
                        Go to Landing Page
                    </a>
                    <a href="{{ route('admin.event-profile', substr($bss_event['programCode'], 0, -1)) }}" class="shadow hover:-translate-y-0.5 dark:bg-slate-700 bg-indigo-700 hover:bg-indigo-600 dark:hover:bg-indigo-600 duration-300 text-white py-3 px-4 rounded">
                        Check Participants
                    </a>
                    <a href="{{ route('admin.event-profile', substr($bss_event['programCode'], 0, -1)) }}" class="shadow hover:-translate-y-0.5 dark:bg-slate-700 bg-orange-700 hover:bg-orange-600 dark:hover:bg-orange-600 duration-300 text-white py-3 px-4 rounded">
                        Promos & Packages
                    </a>
                </div>

            </div>
            <div class="w-full xl:w-1/4">
                <div class="xl:block lg:block md:block hidden">
                    @php
                        $thumbUrl = $bss_event['thumb'];
                        if (!str_starts_with($thumbUrl, 'https://www.biblesociety.sg')) {
                            $thumbUrl = 'https://www.biblesociety.sg' . $thumbUrl;
                        }
                    @endphp
                    <img src="{{ $thumbUrl }}" alt="{{ strip_tags($bss_event['title']) }}" class="mb-5 w-full xl:h-60 lg:h-35 md:h-35 object-cover border-white border-[7px] shadow-md">
                </div>
                
                <p class="font-bold italic text-black dark:text-white text-sm mb-1">Registration Fee:</p>
                <div class="bg-white dark:bg-slate-900/60 border border-slate-400 text-black dark:text-white p-4 rounded-lg shadow-sm mb-8">
                    <p class="text-xl font-bold leading-relaxed text-black dark:text-white">{{ $bss_event['price'] > 0 ? 'SGD ' . number_format($bss_event['price'], 2) : 'Free' }}</p>
                </div>

                <p class="font-bold italic text-black dark:text-white text-sm mb-1">Total Registered:</p>
                <div class="bg-white dark:bg-slate-900/60 border border-slate-400 text-black dark:text-white p-4 rounded-lg shadow-sm mb-8">
                    <p class="text-xl font-bold leading-relaxed text-black dark:text-white">{{ $bss_event['registrants_count'] }}</p>
                </div>

                <p class="font-bold italic text-black dark:text-white text-sm mb-1">Maximum Participants:</p>
                <div class="bg-white dark:bg-slate-900/60 border border-slate-400 text-black dark:text-white p-4 rounded-lg shadow-sm mb-8">
                    <p class="text-xl font-bold leading-relaxed text-black dark:text-white">{{ $bss_event['limit'] > 0 ? $bss_event['limit']. ' seats' : 'No Limit' }}</p>
                </div>

                @if ($bss_event['activeUntil'])
                    <p class="font-bold italic text-black dark:text-white text-sm mb-1">Registration Deadline:</p>
                    <div class="bg-white dark:bg-slate-900/60 border border-slate-400 text-black dark:text-white p-4 rounded-lg shadow-sm mb-4">
                        <p class="text-sm leading-relaxed text-black dark:text-white">{{ \Carbon\Carbon::parse($bss_event['activeUntil'])->format('F j, Y') }}</p>
                    </div>
                @endif
                <p class="font-bold italic text-black dark:text-white text-sm mb-1">Event Schedule:</p>
                <div class="bg-white dark:bg-slate-900/60 border border-slate-400 text-black dark:text-white p-4 rounded-lg shadow-sm mb-4">
                    <p class="text-sm leading-relaxed text-black dark:text-white">{{ \Carbon\Carbon::parse($bss_event['startDate'] . ' ' . $bss_event['startTime'])->format('F j, Y, g:i A') }}</p>
                    <p class="text-sm leading-relaxed text-black dark:text-white">{{ \Carbon\Carbon::parse($bss_event['endDate'] . ' ' . $bss_event['endTime'])->format('F j, Y, g:i A') }}</p>
                    @if ($bss_event['customDate'])
                        <p class="text-sm leading-relaxed text-black dark:text-white mt-4 border-t pt-3 border-slate-400">
                            <span class="font-thin">Details:</span><br />
                            {!! $bss_event['customDate'] !!}
                        </p>
                    @endif
                </div>
                <p class="font-bold italic text-black dark:text-white text-sm mb-1">Evenue:</p>
                <div class="bg-white dark:bg-slate-900/60 border border-slate-400 text-black dark:text-white p-4 rounded-lg shadow-sm mb-8">
                    <p class="text-sm leading-relaxed text-black dark:text-white"><span class="font-bold">Location:</span> &nbsp;{!! $bss_event['venue'] !!}</p>
                    <div class="opacity-60 w-full mt-4 h-48 bg-zinc-400 dark:bg-zinc-100 text-white/50 dark:text-black/50 flex flex-col items-center justify-center border border-slate-700">
                        Map Location Here
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="gap-2 flex-col xl:hidden lg:hidden md:hidden flex">
                <a href="{{ route('admin.event-profile', substr($bss_event['programCode'], 0, -1)) }}" class="shadow hover:-translate-y-0.5 dark:bg-slate-700 bg-blue-500 hover:bg-blue-700 duration-300 text-white py-3 px-4 rounded">
                    Go to Landing Page
                </a>
                <a href="{{ route('admin.event-profile', substr($bss_event['programCode'], 0, -1)) }}" class="shadow hover:-translate-y-0.5 dark:bg-slate-700 bg-indigo-700 hover:bg-indigo-600 duration-300 text-white py-3 px-4 rounded">
                    Check Participants
                </a>
                <a href="{{ route('admin.event-profile', substr($bss_event['programCode'], 0, -1)) }}" class="shadow hover:-translate-y-0.5 dark:bg-slate-700 bg-orange-700 hover:bg-orange-600 duration-300 text-white py-3 px-4 rounded">
                    Promos & Packages
                </a>
            </div>
        </div>
        
    </div>




    {{-- @livewire('admin.programme.events.profile', ['programCode' => $programCode]) --}}
</x-app-layout>
