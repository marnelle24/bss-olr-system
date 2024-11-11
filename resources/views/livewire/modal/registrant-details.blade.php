<div>
    <svg wire:click="openModal" class="cursor-pointer hover:-translate-y-0.5 hover:stroke-warning duration-300 fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z" fill="" />
        <path d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z" fill="" />
    </svg>

    <!-- Modal -->
    <div 
        x-data="{ open: @entangle('showModal') }" 
        x-show="open" 
        x-transition:enter="transform transition ease-in-out duration-300" 
        x-transition:enter-start="translate-x-full" 
        x-transition:enter-end="translate-x-0" 
        x-transition:leave="transform transition ease-in-out duration-300" 
        x-transition:leave-start="translate-x-0" 
        x-transition:leave-end="translate-x-full" 
        class="fixed right-0 top-0 z-[99999] flex items-center justify-center"
        style="display: none;"
    >
        <!-- Modal background -->
        <div class="fixed inset-0 bg-black opacity-50"></div>

        <!-- Modal content -->
        <div class="bg-white h-screen overflow-y-auto rounded-none shadow-lg z-10">
            <div class="flex justify-between items-center p-6 border-b">
                <div>
                    <p class="text-xs tracking-widest font-thin text-slate-400 uppercase mb-2">Registration Code</p>
                    <p class="text-center font-thin text-lg dark:text-neutral-100 text-neutral-100 rounded-sm py-1 px-3 drop-shadow shadow bg-meta-3 dark:bg-meta-8 border border-neutral-500">
                        {{ $registrant?->regCode }}
                    </p>
                </div>
                {{-- <h3 class="text-lg font-semibold">View Details</h3> --}}
                <button wire:click="closeModal" class="text-slate-600 hover:text-slate-800">
                    &#10005;
                </button>
            </div>
            <div class="mt-4 p-6">
                <!-- Modal content dynamically populated -->
                <p class="text-md tracking-widest font-thin text-slate-600 uppercase mb-2">
                    Registration Details
                </p>
                <table class="table-auto w-full">
                    <tbody>
                        <tr>
                            <td class="border border-slate-400 text-slate-700 dark:text-slate-500 px-4 py-2 text-sm tracking-wide font-thin uppercase">
                                Date Registered
                            </td>
                            <td class="border border-slate-400 text-slate-700 dark:text-slate-500 px-4 py-2 text-sm tracking-wide font-thin uppercase">
                                {{ \Carbon\Carbon::parse($registrant?->created_at)->format('F j, Y') }}
                            </td>
                        </tr>
                        @if ($registrant?->nric)
                            <tr>
                                <td class="border border-slate-400 text-slate-700 dark:text-slate-500 px-4 py-2 text-sm tracking-wide font-thin uppercase">
                                    NRIC
                                </td>
                                <td class="border border-slate-400 text-slate-700 dark:text-slate-500 px-4 py-2 text-sm tracking-wide font-thin uppercase">
                                    {{ $registrant?->nric }}
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td class="border border-slate-400 text-slate-700 dark:text-slate-500 px-4 py-2 text-sm tracking-wide font-thin uppercase">
                                Full Name
                            </td>
                            <td class="border border-slate-400 text-slate-700 dark:text-slate-500 px-4 py-2 text-sm tracking-wide font-thin uppercase">
                                {{ $registrant?->title }} {{ $registrant?->firstName }} {{ $registrant?->lastName }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-slate-400 text-slate-700 dark:text-slate-500 px-4 py-2 text-sm tracking-wide font-thin uppercase">
                                Contact Number
                            </td>
                            <td class="border border-slate-400 text-slate-700 dark:text-slate-500 px-4 py-2 text-sm tracking-wide font-thin uppercase">
                                {{ $registrant?->contactNumber }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-slate-400 text-slate-700 dark:text-slate-500 px-4 py-2 text-sm tracking-wide font-thin uppercase">
                                Email Address
                            </td>
                            <td class="border border-slate-400 text-slate-700 dark:text-slate-500 px-4 py-2 text-sm tracking-wide font-thin uppercase">
                                {{ $registrant?->email }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-slate-400 text-slate-700 dark:text-slate-500 px-4 py-2 text-sm tracking-wide font-thin uppercase">
                                Address
                            </td>
                            <td class="border border-slate-400 text-slate-700 dark:text-slate-500 px-4 py-2 text-sm tracking-wide font-thin uppercase">
                                {{ $registrant?->address }} {{ $registrant?->city }} {{ $registrant?->postalCode }}
                            </td>
                        </tr>
                        
                        @if($registrant?->extraFields)
                            @php
                                $xf = json_decode($registrant?->extraFields)
                            @endphp
                            @foreach ($xf as $key => $value )
                                <tr>
                                    <td class="border border-slate-400 text-slate-700 dark:text-slate-500 px-4 py-2 text-sm tracking-wide font-thin uppercase">
                                        {{$key}}
                                    </td>
                                    <td class="border border-slate-400 text-slate-700 dark:text-slate-500 px-4 py-2 text-sm tracking-wide font-thin uppercase">
                                        {{ $value }}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <br />
                @dump(Collect($registrant)->toArray())
            </div>
        </div>
    </div>
</div>
