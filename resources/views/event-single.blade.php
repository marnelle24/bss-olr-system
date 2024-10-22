<x-guest-layout>
    <div class="lg:mt-5 mt-0 max-w-6xl mx-auto lg:px-0 px-4 lg:py-10 py-3">
        <div class="rounded-xl flex lg:flex-row flex-col shadow">
            <img src="{{ $bss_event['thumb'] }}" alt="{{ strip_tags($bss_event['title']) }}" class="lg:rounded-tl-xl rounded-tl-none lg:rounded-bl-xl rounded-bl-none w-full xl:h-[350px] h-[300px] object-cover object-center">
            <div class="lg:rounded-tr-xl rounded-tr-none lg:rounded-br-xl rounded-br-none p-4 w-full lg:w-1/2 flex justify-start flex-col gap-2 bg-gradient-to-r from-zinc-100 to-zinc-200">
                <h1 class="text-4xl font-bold">{{ strip_tags($bss_event['title']) }}</h1>
                <p class="mt-4 text-sm leading-relaxed text-black ">
                    {{ Str::words(strip_tags($bss_event['description']), 25, '...') }}
                </p>

                <div>
                    <div class="flex items-center justify-between mt-2">
                        <a href="#" class="px-6 py-2 bg-orange-2 text-white text-lg font-bold rounded-xl shadow hover:bg-orange-600 hover:shadow-lg transition duration-300 ease-in-out">
                            Register Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-12 flex lg:flex-row flex-col lg:gap-0 gap-8 max-w-6xl mx-auto">
            <h3 class="text-2xl font-nunito font-extrabold my-4">About Event</h3>
        </div>
        <div class="flex lg:flex-row flex-col lg:gap-0 gap-10 lg:space-x-10 space-x-0 max-w-6xl mx-auto">
            <div class="w-full lg:w-2/3">
                <div class="text-md text-gray-500">
                    {!! $bss_event['description'] !!}
                </div>
            </div>
            <div class="w-full flex flex-col gap-6 lg:w-1/3">
                <div class="flex items-start gap-1 space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 stroke-zinc-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                    <div>
                        @if ($bss_event['customDate'])
                            <p class="lg:text-md text-xl leading-relaxed text-black">
                                {!! $bss_event['customDate'] !!}
                            </p>
                        @else
                            <p class="lg:text-md text-xl leading-relaxed text-black">{{ \Carbon\Carbon::parse($bss_event['startDate'] . ' ' . $bss_event['startTime'])->format('F j, Y, g:i A') }}</p>
                            <p class="lg:text-md text-xl leading-relaxed text-black">{{ \Carbon\Carbon::parse($bss_event['endDate'] . ' ' . $bss_event['endTime'])->format('F j, Y, g:i A') }}</p>
                        @endif
                    </div>
                </div>
                <div class="flex flex-wrap items-start gap-1">
                    <div class="flex space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="lg:w-14 lg:h-14 w-16 h-16 stroke-zinc-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
    
                        <div>
                            <p class="lg:text-md text-xl text-black">
                                {!! $bss_event['venue'] !!}
                            </p>
                        </div>
                    </div>
                    <div class="mt-4 w-full">
                        <div class="opacity-60 w-full h-48 bg-zinc-700 text-white/50 flex flex-col items-center justify-center border border-slate-700">
                            Map Location Here
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-6">
                    <div>
                        <p class="font-thin text-sm text-neutral-600 drop-shadow mb-1">Organized by:</p>
                        <div class="flex">
                            <p class="font-extrabold shadow-md font-nunito text-sm text-white bg-meta-3/80 border border-meta-3 rounded-full px-2 py-1">D6 Family Foundation</p>
                        </div>
                    </div>
                    <div>
                        <p class="font-thin text-sm text-neutral-600 drop-shadow mb-1">Event In-charge</p>
                        <div class="flex">
                            <p class="font-extrabold shadow-md font-nunito text-sm text-white bg-meta-5/80 border border-meta-5 rounded-full px-2 py-1">{{ $bss_event['chequeHandler'] }}</p>
                        </div>
                    </div>
                    <div>
                        <p class="font-thin text-sm text-neutral-700 drop-shadow mb-3">Share Event</p>
                        <div class="flex space-x-5">
                            <a href="#" class="text-gray-600 hover:text-blue-600 hover:-translate-y-0.5 duration-300" aria-label="Facebook">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-pink-600 hover:-translate-y-0.5 duration-300" aria-label="Instagram">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-zinc-700 hover:-translate-y-0.5 duration-300" aria-label="TikTok">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="border-t-2 border-slate-400/20 pt-8 bg-zinc-300/40 pb-20">
        <div class="max-w-6xl mx-auto lg:px-0 px-4">
            <div class="mb-14">

                <h3 class="text-2xl font-nunito font-extrabold my-4">Speakers</h3>
                <div class="flex lg:flex-row flex-col gap-4">
                    <div class="lg:w-1/2 w-full">
                        @php
                            $speakers = [3];
                        @endphp
        
                        <div class="flex flex-wrap gap-6 justify-center xl:mx-0 mx-auto">
                            @foreach ($speakers as $speaker)
                                <div class="p-4 flex lg:flex-row flex-col lg:justify-start items-center justify-center gap-5">
                                    <img src="https://picsum.photos/id/23{{$speaker}}/300/300" alt="Speaker" class="rounded-full w-48 h-48 lg:w-32 lg:h-32 object-cover">
                                    <div class="flex flex-col gap-2 lg:items-start text-center lg:text-left">
                                        <h4 class="font-bold text-2xl font-nunito">Sarah Johnson {{$speaker}}</h4>
                                        <p class="font-semibold italic">Family Counselor</p>
                                        <p class="text-gray-600 text-md">
                                            Sarah is a renowned family counselor with over 15 years of experience helping families strengthen their bonds and overcome challenges.
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="lg:w-1/2 w-full bg-red-500 p-10">
                    </div>
                </div>
            </div>
            
            <div class="mb-8" id="">
                <h3 class="text-2xl font-nunito font-extrabold my-4">Register Now</h3>
            </div>

            <div class="border border-slate-400/20 bg-white lg:p-12 p-6 rounded-lg shadow-lg">
                <form action="" method="POST" class="space-y-6">
                    <div class="flex lg:flex-row flex-col gap-6">
                        <div class="flex lg:flex-row flex-col gap-6 w-full">
                            <div class="lg:w-1/4 w-full">
                                <label class="mb-2.5 block font-medium text-black">Title</label>
                                <select name="title" id="title" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default">
                                    <option value="Mr">Mr</option>
                                    <option value="Ms">Ms</option>
                                    <option value="Mrs">Mrs</option>
                                </select>
                            </div>
                            <div class="flex lg:flex-row flex-col gap-6 lg:w-3/4 w-full">
                                <div class="w-full lg:w-1/2">
                                    <label class="mb-2.5 block font-medium text-black">First Name</label>
                                    <input name="firstname" :value="old('firstname')" required autofocus autocomplete="firstname" type="text" placeholder="First Name" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                                </div>
                                <div class="w-full lg:w-1/2">
                                    <label class="mb-2.5 block font-medium text-black">Last Name</label>
                                    <input name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" type="text" placeholder="Last Name" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="flex lg:flex-row flex-col gap-6">
                        <div class="w-full lg:w-1/2">
                            <label class="mb-2.5 block font-medium text-black">Email Address</label>
                            <input name="email" :value="old('email')" required autofocus autocomplete="email" type="text" placeholder="Email Address" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label class="mb-2.5 block font-medium text-black">Contact Number</label>
                            <input name="contactNumber" :value="old('contactNumber')" required autofocus autocomplete="contactNumber" type="text" placeholder="Contact Number" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                        </div>
                    </div>
    
                    <div class="mt-4">
                        <p class="font-semibold border-b-2 border-slate-400/20 text-lg mt-2 mb-4">Address</p>
                        <div class="flex lg:flex-row flex-col gap-6">
                            <div class="w-full">
                                <label class="mb-2.5 block font-medium text-black">Bldg. / Block # / Street Name</label>
                                <input name="address" :value="old('address')" required autofocus autocomplete="address" type="text" placeholder="Bldg # / Block No / Street Name" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                            </div>
                            <div class="w-full lg:w-1/3">
                                <label class="mb-2.5 block font-medium text-black">City</label>
                                <input name="city" :value="old('city')" required autofocus autocomplete="city" type="text" placeholder="City" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                            </div>
                            <div class="w-full lg:w-1/4">
                                <label class="mb-2.5 block font-medium text-black">Postal Code</label>
                                <input name="postalcode" :value="old('postalcode')" required autofocus autocomplete="postalcode" type="text" placeholder="Postal Code" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="flex gap-4">
                        <button type="submit" class="hover:bg-slate-600 duration-300 hover:-translate-y-0.5 shadow border border-none hover:border-dark inline-flex items-center px-6 py-4 bg-slate-700 rounded-none font-semibold text-sm text-white hover:text-dark uppercase tracking-widest disabled:opacity-25 transition">Register Now</button>
                        <button type="reset" class="duration-300 hover:-translate-y-0.5 shadow inline-flex items-center px-6 py-4 border border-dark bg-transparent rounded-none font-semibold text-sm text-dark uppercase tracking-widest hover:text-slate-600 hover:bg-slate-100 transition">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- @if (!empty($bss_event))
        <pre>{{ json_encode($bss_event, JSON_PRETTY_PRINT) }}</pre>
    @else
        <p>No event data available.</p>
    @endif --}}
    {{-- footer section --}}
    <div class="bg-slate-800 p-8">
        <div class="mt-5 max-w-6xl mx-auto lg:px-0 px-4">
            test
        </div>
    </div>
</x-guest-layout>