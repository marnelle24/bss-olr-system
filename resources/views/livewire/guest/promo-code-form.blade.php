<div>
    <div class="mb-4">
        <h1 class="lg:text-left text-center lg:text-2xl text-3xl text-slate-500 font-bold mb-2">
            Promo and Discount Code
        </h1>
        <p class="text-slate-500 lg:text-left text-center">
            Apply promo code (if applicable) and registration checkout details.
        </p>
    </div>
    <div class="space-y-6">
        <div class="flex xl:flex-row flex-col gap-2 my-2">
            <input 
                {{-- wire:change="validatePromoCode"  --}}
                {{-- wire:model="promoCode"  --}}
                type="text" 
                placeholder="Enter Promo Code" 
                class="placeholder:text-slate-400/80 placeholder:font-semibold uppercase w-full rounded-none border border-slate-400/60 bg-white p-4 text-xl focus:ring-0" 
            />
            <button class="bg-teal-600 duration-300 hover:-translate-y-0.5 hover:bg-gradient-to-l hover:from-teal-600 hover:via-teal-500 hover:to-teal-600 hover:bg-size-200 hover:bg-pos-100 text-white px-4 py-2 rounded-none text-lg">
                Apply
            </button>
        </div>
        
        <div class="flex flex-col gap-2">
            <p class="text-xl text-slate-600 font-bold p-3 bg-slate-200">Checkout & Payment Details</p>

            {{-- @dump($programItem) --}}
            {{-- <div class="flex lg:flex-row flex-col">
                <div class="lg:w-1/3 w-full">
                    <img src="{{ $eventDetails->thumb }}" alt="test" class="w-full xl:h-[200px] h-[200px] object-cover object-center" />
                    <p class="text-lg py-3">
                        {!! $eventDetails->title !!}
                    </p>
                </div>

                <div class="lg:w-2/3 w-full">
                    <table class="w-full">
                        <tbody>
                            <tr>
                                <td class="text-xl py-2 lg:px-4 px-0">Total Amount</td>
                                <td class="text-right text-xl lg:px-4 px-0 py-2">{{ 'SG$'.number_format($eventDetails['price'], 2) }}</td>
                            </tr>
                            <tr>
                                <td class="text-xl py-2 lg:px-4 px-0">Discount</td>
                                <td class="text-right text-xl lg:px-4 px-0 py-2">
                                    {{ 'SG$'.number_format($discount, 2) }}
                                </td>
                            </tr>
                        </tbody>
                        <tfoot class="border-t border-slate-500">
                            <tr>
                                <td class="text-xl lg:px-4 px-0 pb-1 pt-4 font-bold">Net Amount</td>
                                <td class="text-right text-xl lg:px-4 px-0 pb-1 pt-4 font-bold">{{ 'SG$'.number_format( ($eventDetails['price'] - $discount), 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div> --}}
        </div>
    </div>
</div>
