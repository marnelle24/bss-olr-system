<div>
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-6">
        @if ($bss_events)
            @foreach ( $bss_events as $event)
                <a href="{{ route('admin.event-profile', $event->programCode) }}" class="relative cursor-pointer bg-white dark:bg-slate-700 dark:hover:bg-slate-800 hover:bg-slate-200 rounded-sm shadow hover:-translate-y-0.5 duration-500">
                    <img src="{{ $event->thumb }}" alt="{{ strip_tags($event->title) }}" class="w-full h-56 object-cover">
                    <h1 class="text-lg font-bold text-slate-700 dark:text-white capitalize p-5 drop-shadow">
                        {{ strip_tags($event->title) }}
                    </h1>
                    <p class="text-sm text-slate-500 dark:text-slate-300 capitalize px-5 h-20 overflow-hidden overflow-ellipsis">
                        {{ Str::limit(strip_tags($event->description), 100) }}
                    </p>

                    <div class="flex flex-col gap-1 px-5 mt-2 mb-4">
                        <div class="flex items-baseline">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block mr-1 align-text-bottom text-slate-500 dark:text-slate-300">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                </svg>
                            </div>
                            <p class="text-sm text-slate-500 dark:text-slate-300">
                                @if (empty($event['customDate']))
                                    {{ \Carbon\Carbon::parse($event->startDate)->format('j M Y') }} 
                                    @if($event->startDate !== $event->endDate)
                                        - {{ \Carbon\Carbon::parse($event->endDate)->format('j M Y') }}
                                    @endif
                                @else
                                    {{strip_tags($event->customDate)}}
                                @endif
                            </p>
                        </div>
                        <div class="flex items-baseline">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block mr-1 align-text-bottom text-slate-500 dark:text-slate-300">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                            </div>
                            <p class="text-sm text-slate-500 dark:text-slate-300">
                                {{ strip_tags($event->venue) }}
                            </p>
                        </div>
                        <div class="flex items-baseline">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block mr-1 align-text-bottom text-slate-500 dark:text-slate-300">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <p class="text-sm text-slate-500 dark:text-slate-300">
                                {{ $event->contactEmail }}
                            </p>
                        </div>
                        <div class="flex items-baseline">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block mr-1 align-text-bottom text-slate-500 dark:text-slate-300">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                            </div>
                            <p class="text-sm text-slate-500 dark:text-slate-300">
                                {{ $event->limit }} / {{ $event->limit < 0 ? 'unlimited' : $event->limit }}
                            </p>
                        </div>
                        <div class="flex items-baseline">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block mr-1 align-text-bottom text-slate-500 dark:text-slate-300">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="text-sm text-slate-500 dark:text-slate-300 uppercase font-bold">
                                    {{ $event->price <= 0 ? 'Free' : 'SGD '. number_format($event->price, 2) }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
                <p class="text-left text-xl text-slate-500/70">No Record found</p>
        @endif
    </div>
    <div class="mt-4">
        {{ $bss_events->links('vendor.livewire.custom-pagination') }}
    </div>
    {{-- @dump($bss_events[12]) --}}
</div>