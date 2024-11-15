<div>
    {{-- <h4 class="text-2xl font-bold text-black dark:text-white mb-8 capitalize">About the Event</h4> --}}
    @dd($bss_event)
    <div class="flex flex-col xl:flex-row lg:flex-row md:flex-row gap-1 xl:gap-4 lg:gap-4 md:gap-4 items-start lg:items-center">
        <h1 class="text-4xl drop-shadow-[0_1px_2px_rgba(0,0,0,0.3)] font-bold text-slate-800 dark:text-white capitalize mb-2">
            {{ strip_tags($bss_event->title) }}
            
        </h1>
        @if (isset($bss_event['wp_post_id']))
            <p class="shadow text-sm font-weight-lighter uppercase text-green-400 dark:text-green-600 drop-shadow-none dark:bg-green-200 bg-green-700/60 px-2 py-1 rounded-lg border dark:border-green-600 border-green-400">Imported</p>
        @endif
    </div>
    
    <p class="text-xs text-black dark:text-white/70 italic mb-8">Last Updated: {{ \Carbon\Carbon::parse($bss_event['last_update'])->format('F j, Y') }}</p>
    
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
            <div class="bg-white/40 dark:bg-slate-900/60 border border-slate-400 text-black dark:text-white p-4 rounded-lg shadow-sm mb-8">
                <p class="font-bold italic text-black dark:text-white text-sm mb-2">Description:</p>
                <p class="text-sm leading-relaxed text-black dark:text-white">
                    {{ strip_tags($bss_event['description']) }}
                </p>
            </div>
            <table class="w-full bg-white/40 dark:bg-slate-900/60">
                <tbody>
                    <tr>
                        <td class="border border-slate-400 text-black dark:text-white px-4 py-5 font-semibold">Program Code</td>
                        <td class="border border-slate-400 text-black dark:text-white px-4 py-5">{{ strip_tags($bss_event['programCode']) }}</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 text-black dark:text-white px-4 py-5 font-semibold">Person In-charge</td>
                        <td class="border border-slate-400 text-black dark:text-white px-4 py-5">{{ strip_tags($bss_event['chequeHandler']) }}</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 text-black dark:text-white px-4 py-5 font-semibold">Contact Email Address</td>
                        <td class="border border-slate-400 text-black dark:text-white px-4 py-5">{{ strip_tags($bss_event['email']) }}</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 text-black dark:text-white px-4 py-5 font-semibold">Cheque Payment Code</td>
                        <td class="border border-slate-400 text-black dark:text-white px-4 py-5">{{ $bss_event['chequeCode'] ? strip_tags($bss_event['chequeCode']) : 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 text-black dark:text-white px-4 py-5 font-semibold">Total Registered</td>
                        <td class="border border-slate-400 text-black dark:text-white px-4 py-5">{{ $bss_event['lastId']. ' seat(s)' }}</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 text-black dark:text-white px-4 py-5 font-semibold">No of seats limit</td>
                        <td class="border border-slate-400 text-black dark:text-white px-4 py-5">{{ $bss_event['limit'] == -1 ? 'Unlimited' : $bss_event['limit'] }}</td>
                    </tr>
                    
                </tbody>
            </table>

            <div class="gap-2 mt-8 flex-col xl:flex-row lg:flex-row md:flex-row xl:flex lg:flex md:flex hidden">
                @hasrole('administrator')
                    <a href="https://www.biblesociety.sg/wp-admin/admin.php?page=BSS%2FBSS.php" target="_blank" class="shadow hover:-translate-y-0.5 flex items-center gap-2 bg-green-700 hover:bg-green-600 duration-300 text-white py-3 px-4 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                        Edit in BSS Plugin
                    </a>
                @endhasrole
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
            <div class="bg-white/40 dark:bg-slate-900/60 border border-slate-400 text-black dark:text-white p-4 rounded-lg shadow-sm mb-8">
                <p class="text-xl font-bold leading-relaxed text-black dark:text-white">{{ $bss_event['price'] > 0 ? 'SGD ' . number_format($bss_event['price'], 2) : 'Free' }}</p>
            </div>

            <p class="font-bold italic text-black dark:text-white text-sm mb-1">Event Schedule:</p>
            <div class="bg-white/40 dark:bg-slate-900/60 border border-slate-400 text-black dark:text-white p-4 rounded-lg shadow-sm mb-4">
                <p class="text-sm leading-relaxed text-black dark:text-white">{{ \Carbon\Carbon::parse($bss_event['startDate'] . ' ' . $bss_event['startTime'])->format('F j, Y, g:i A') }}</p>
                <p class="text-sm leading-relaxed text-black dark:text-white">{{ \Carbon\Carbon::parse($bss_event['endDate'] . ' ' . $bss_event['endTime'])->format('F j, Y, g:i A') }}</p>
                <p class="text-sm leading-relaxed text-black dark:text-white mt-4 border-t pt-3 border-slate-400">
                    <span class="font-thin">Details:</span><br />
                    {!! $bss_event['customDate'] !!}
                </p>
            </div>
            <p class="font-bold italic text-black dark:text-white text-sm mb-1">Evenue:</p>
            <div class="bg-white/40 dark:bg-slate-900/60 border border-slate-400 text-black dark:text-white p-4 rounded-lg shadow-sm mb-8">
                <p class="text-sm leading-relaxed text-black dark:text-white">{!! $bss_event['venue'] !!}</p>
            </div>
        </div>

        <div class="gap-2 flex-col xl:hidden lg:hidden md:hidden flex">
            @hasrole('administrator')
                <a href="https://www.biblesociety.sg/wp-admin/admin.php?page=BSS%2FBSS.php" target="_blank" class="shadow hover:-translate-y-0.5 flex items-center gap-2 bg-green-700 hover:bg-green-800 duration-300 text-white py-3 px-4 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>
                    Edit in BSS Plugin
                </a>
            @endhasrole
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
