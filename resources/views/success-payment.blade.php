<x-guest-layout>
    <div class="lg:mt-5 max-w-2xl mx-auto lg:px-0 px-4 pb-16">
        <p class="py-4">
            Thank you for participating to this event.
            Kindly check the registration and payment summary below.
            Also, a copy of this receipt is also sent to your email.
        </p>
        <div class="border border-slate-400/20 bg-white p-6 shadow-lg">
            <table class="w-full">
                <tr>
                    <td class="text-xl border border-zinc-400 p-3 uppercase text-center font-bold font-nunito" colspan="2">
                        Registration Summary
                    </td>
                </tr>
                <tr>
                    <td class="border border-zinc-400 py-1 px-2 font-bold font-nunito">Registration Date</td>
                    <td class="border border-zinc-400 py-1 px-2 font-bold font-nunito">
                        {{ \Carbon\Carbon::parse($registrant->created_at)->format('F j, Y') }}
                    </td>
                </tr>
                <tr>
                    <td class="border border-zinc-400 py-1 px-2 font-bold font-nunito">Registration Code</td>
                    <td class="border border-zinc-400 py-1 px-2 font-bold font-nunito">{{ $registrant->regCode }}</td>
                </tr>
                <tr>
                    <td class="border border-zinc-400 py-1 px-2">Name</td>
                    <td class="border border-zinc-400 py-1 px-2">{{ $registrant->title.' '.$registrant->firstName .' '.$registrant->lastName}}</td>
                </tr>
                <tr>
                    <td class="border border-zinc-400 py-1 px-2">Email Address</td>
                    <td class="border border-zinc-400 py-1 px-2">{{$registrant->email}}</td>
                </tr>
                <tr>
                    <td class="border border-zinc-400 py-1 px-2">Contact Number</td>
                    <td class="border border-zinc-400 py-1 px-2">{{$registrant->contactNumber}}</td>
                </tr>
                <tr>
                    <td class="border border-zinc-400 py-1 px-2">Address</td>
                    <td class="border border-zinc-400 py-1 px-2 capitalize">
                        {{ $registrant->address ? $registrant->address.', ' : '' }}
                        {{ $registrant->city }}
                        {{ $registrant->postalCode }}
                    </td>
                </tr>
                @php
                    $xf = json_decode($registrant->extraFields)
                @endphp
                @if (!empty($registrant->extraFields))
                    @foreach ($xf as $key => $value)
                        <tr>
                            <td class="border border-zinc-400 py-1 px-2 capitalize">{{$key}}</td>
                            <td class="border border-zinc-400 py-1 px-2 capitalize">{{$value}}</td>
                        </tr>
                    @endforeach
                @endif
                <tr>
                    <td class="border border-zinc-400 py-1 px-2 font-bold font-nunito">Status</td>
                    <td class="border border-zinc-400 py-1 px-2 font-bold font-nunito uppercase text-green-600">{{ $registrant->regStatus }}</td>
                </tr>
                <tr>
                    <td class="text-xl border border-zinc-400 p-3 uppercase text-center font-bold font-nunito" colspan="2">
                        Payment Details
                    </td>
                </tr>
                <tr>
                    <td class="border border-zinc-400 py-1 px-2 capitalize">Payment Reference No.</td>
                    <td class="border border-zinc-400 py-1 px-2 capitalize">{{ $paymentDetails['payments'][0]['id'] }}</td>
                </tr>
                <tr>
                    <td class="border border-zinc-400 py-1 px-2 capitalize">Amount</td>
                    <td class="border border-zinc-400 py-1 px-2 uppercase">{{ $paymentDetails['payments'][0]['currency'] .' '. $paymentDetails['payments'][0]['amount'] }}</td>
                </tr>
                <tr>
                    <td class="border border-zinc-400 py-1 px-2 capitalize">Mode of Payment</td>
                    <td class="border border-zinc-400 py-1 px-2 capitalize">{{ $paymentDetails['payments'][0]['payment_type']==='paynow_online' ? 'PAYNOW' : 'CREDIT CARD' }}</td>
                </tr>
                <tr>
                    <td class="border border-zinc-400 py-1 px-2 capitalize">Payment Status</td>
                    <td class="border border-zinc-400 py-1 px-2 uppercase font-bold font-nunito text-green-500">{{ $paymentDetails['payments'][0]['status'] }}</td>
                </tr>
                <tr>
                    <td class="border border-zinc-400 p-6" colspan="2">
                        <div class="flex lg:flex-row flex-col gap-2">
                            <img src="{{$eventDetails['thumb']}}" width="150"/>
                            <p class="text-lg font-bold font-nunito">{{strip_tags($eventDetails['title'])}}</p>
                        </div>
                    </td>
                </tr>
            </table>

            <!-- Buttons -->
            <div class="flex justify-between items-center mt-8 no-print">
                <button onclick="window.print()" class="flex text-sm items-center bg-blue-500 text-white px-4 py-2 rounded-none hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9V2h12v7M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2m-10 0h10a2 2 0 012 2v2H4v-2a2 2 0 012-2z"/>
                    </svg>
                    Print
                </button>

                <a href="{{route('home')}}" class="bg-slate-500 text-white px-4 py-2 text-sm rounded-none hover:bg-slate-600 duration-300">Go To Main Page</a>
            </div>

        </div>
    </div>
    <div class="bg-slate-800 p-8">
        <div class="mt-5 max-w-6xl mx-auto lg:px-0 px-4">
            <p class="text-white font-nunito text-sm text-center">
                &copy; {{ date('Y') }} Streams Of Life. All rights reserved.
            </p>
        </div>
    </div>
</x-guest-layout>