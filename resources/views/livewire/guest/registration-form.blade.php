<div class="flex flex-col">
    <div>
        <div>
            <h1 class="lg:text-left text-center lg:text-2xl text-3xl text-slate-500 font-bold mb-6">Step 1: Complete Registration</h1>
            <form wire:submit="submit" class="space-y-6">
                <div class="space-y-6">
                    <div class="flex lg:flex-row flex-col gap-6">
                        @if(!in_array('nirc', $this->hiddenFields))
                            <div class="lg:w-1/2 w-full">
                                <label class="mb-2.5 block font-medium text-black">NIRC # </label>
                                <input wire:model.blur="form.nirc" type="text" placeholder="Last 4-digit" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                                @error('form.nirc')
                                    <em class="text-danger text-xs">{{ $message }}</em>
                                @enderror
                            </div>
                        @endif
                        
                        @if(!in_array('title', $this->hiddenFields))
                            <div class="lg:w-1/2 w-full">
                                <label class="mb-2.5 block font-medium text-black">Title</label>
                                <select wire:model.blur="form.title" id="title" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default">
                                    <option value="Mr" selected>Mr</option>
                                    <option value="Ms">Ms</option>
                                    <option value="Mrs">Mrs</option>
                                </select>
                                @error('form.title')
                                    <em class="text-danger text-xs">{{ $message }}</em>
                                @enderror
                            </div>
                        @endif
                    </div>
                    <div class="flex lg:flex-row flex-col gap-6">
                        @if(!in_array('firstName', $this->hiddenFields))
                            <div class="w-full lg:w-1/2">
                                <label class="mb-2.5 block font-medium text-black">First Name</label>
                                <input wire:model.blur="form.firstName" type="text" placeholder="First Name" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                                @error('form.firstName')
                                    <em class="text-danger text-xs">{{ $message }}</em>
                                @enderror
                            </div>
                        @endif
                
                        @if(!in_array('lastName', $this->hiddenFields))
                            <div class="w-full lg:w-1/2">
                                <label class="mb-2.5 block font-medium text-black">Last Name</label>
                                <input wire:model.blur="form.lastName" type="text" placeholder="Last Name" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                                @error('form.lastName')
                                    <em class="text-danger text-xs">{{ $message }}</em>
                                @enderror
                            </div>
                        @endif
                    </div>
                
                    <div class="flex lg:flex-row flex-col gap-6">
                        @if(!in_array('email', $this->hiddenFields))
                            <div class="w-full lg:w-1/2">
                                <label class="mb-2.5 block font-medium text-black">Email Address</label>
                            <input wire:model.blur="form.email" type="text" placeholder="Email Address" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                            @error('form.email')
                                <em class="text-danger text-xs">{{ $message }}</em>
                                @enderror
                            </div>
                        @endif
                
                        @if(!in_array('contactNumber', $this->hiddenFields))
                            <div class="w-full lg:w-1/2">
                                {!! $this->renderContactNumberField() !!}
                                @error('form.contactNumber')
                                    <em class="text-danger text-xs">{{ $message }}</em>
                                @enderror
                            </div>
                        @endif
                    </div>
                
                    <div class="pt-4">
                        @if(!in_array('address', $this->hiddenFields))
                            <p class="font-semibold border-b-2 border-slate-400/20 text-lg mt-2 mb-4">Address</p>
                            <div class="flex lg:flex-row flex-col gap-6">
                                <div class="w-full">
                                    <label class="mb-2.5 block font-medium text-black">Bldg. / Block # / Street Name</label>
                                    <input wire:model.blur="form.address" type="text" placeholder="Bldg # / Block No / Street Name" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                                    @error('form.address')
                                        <em class="text-danger text-xs">{{ $message }}</em>
                                    @enderror
                                </div>
                                <div class="w-full lg:w-1/3">
                                    <label class="mb-2.5 block font-medium text-black">City</label>
                                    <input wire:model.blur="form.city" type="text" placeholder="City" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                                    @error('form.city')
                                        <em class="text-danger text-xs">{{ $message }}</em>
                                    @enderror
                                </div>
                                <div class="w-full lg:w-1/4">
                                    <label class="mb-2.5 block font-medium text-black">Postal Code</label>
                                    <input wire:model.blur="form.postalCode" type="text" placeholder="Postal Code" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                                    @error('form.postalCode')
                                        <em class="text-danger text-xs">{{ $message }}</em>
                                    @enderror
                                </div>
                            </div>
                        @endif
                    </div>
                
                    {{-- Extra Fields -> If any --}}
                    @if(!empty($formSettings['extraInfo']))
                        <div class="pt-3">
                            <p class="font-semibold border-b-2 border-slate-400/20 text-lg mt-4 mb-4">Additional Information</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($formSettings['extraInfo'] as $key => $field)
                                    <div>
                                        @if($field['type'] === 'text')
                                            {!! $this->inputField($key, $field) !!}
                                            @error('form.postalCode')
                                                <em class="text-danger text-xs">{{ $message }}</em>
                                            @enderror
                                        @elseif($field['type'] === 'select')
                                            {!! $this->selectOptionField($key, $field) !!}
                                            @error('form.postalCode')
                                                <em class="text-danger text-xs">{{ $message }}</em>
                                            @enderror
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            
                <br />
                <br />
                <div class="w-full border-t-2 border-dashed border-slate-400/60 pt-8 mb-4">
                    <h1 class="lg:text-left text-center lg:text-2xl text-3xl text-slate-500 font-bold">Step 2: Confirm Registration & Checkout</h1>
                </div>
                <div class="flex lg:flex-row flex-col gap-4">
                    <div class="lg:w-2/3 w-full border border-meta-4/60 rounded-xl p-4">
                        <div class="flex flex-wrap gap-2">
                            <p class="text-md text-slate-600 italic">Apply Promo</p>
                            <input wire:change="validatePromoCode" wire:model="promoCode" type="text" placeholder="Enter Promo Code" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                        </div>
                        <div class="flex flex-col gap-2 my-5">
                            <p class="font-bold text-lg text-slate-500">Registration Summary</p>
                            <table>
                                <tr>
                                    <td class="border border-zinc-400 p-1">Name</td>
                                    <td class="border border-zinc-400 p-1">{{ $form->firstName }} {{ $form->lastName }}</td>
                                </tr>
                                <tr>
                                    <td class="border border-zinc-400 p-1">Email Address</td>
                                    <td class="border border-zinc-400 p-1">{{ $form->email }}</td>
                                </tr>
                                <tr>
                                    <td class="border border-zinc-400 p-1">Contact Number</td>
                                    <td class="border border-zinc-400 p-1">{{ $form->countryCode ? $form->countryCode . '-' : '' }} {{ $form->contactNumber }}</td>
                                </tr>
                                <tr>
                                    <td class="border border-zinc-400 p-1">Address</td>
                                    <td class="border border-zinc-400 p-1">{{ $form->address ? $form->address : '' }} {{ $form->city ? $form->city : '' }} {{ $form->postalCode ? $form->postalCode : '' }}</td>
                                </tr>
                                @if (count($this->extraFieldsValues) > 0)
                                    @foreach ( $this->extraFieldsValues as $field => $value)
                                        <tr>
                                            <td class="border border-zinc-400 p-1">{{ $field }}</td>
                                            <td class="border border-zinc-400 p-1">{{ $value }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                    <div class="lg:w-1/3 w-full">
                        <img src="{{ $eventDetails['thumb'] }}" alt="test" class="w-full xl:h-[200px] h-[200px] object-cover object-center" />
                        <p class="text-lg py-3">{!! $eventDetails['title'] !!}</p>
                        <p class="text-2xl text-slate-600 font-bold mt-8">Checkout</p>

                        <table class="w-full mt-10">
                            <tbody>
                                <tr>
                                    <td class="text-xl p-1">Total Amount</td>
                                    <td class="text-right text-xl p-1">{{ 'SG$'.number_format($eventDetails['price'], 2) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-xl p-1">Discount</td>
                                    <td class="text-right text-xl p-1">
                                        {{ 'SG$'.number_format($discount, 2) }}
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot class="border-t border-slate-500">
                                <tr>
                                    <td class="text-xl px-1 pb-1 pt-5 font-bold">Net Amount</td>
                                    <td class="text-right text-xl px-1 pb-1 pt-5 font-bold">{{ 'SG$'.number_format( ($eventDetails['price'] - $discount), 2) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="mt-4 flex flex-col gap-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="privacy_policy" class="form-checkbox h-5 w-5 text-slate-600" required />
                        <span class="ml-2 text-sm text-gray-700">I accept the <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a></span>
                    </label>
                    <label class="inline-flex items-start">
                        <input type="checkbox" name="privacy_policy" class="form-checkbox h-5 w-5 text-slate-600" required />
                        <span class="ml-2 text-sm text-gray-700">
                            By providing your contact details, you consent to our collection, use and disclosure of your personal data as described in our privacy policy on our website. We do strive to limit the amount of personal data we collect to that which is sufficient to support the intended purpose of the collection
                        </span>
                    </label>
                </div>
                <br />
                <div class="flex gap-4 justify-center mt-5">
                    <button type="reset" class="whitespace-nowrap text-center text-zinc-100 drop-shadow bg-gradient-to-l from-zinc-600 via-zinc-500 to-zinc-600 bg-size-200 bg-pos-0 hover:bg-pos-100 border-meta-3 duration-500 shadow-md hover:-translate-y-0.5 hover:bg-slate-600 hover:border-slate-600 hover:text-zinc-200 items-center px-6 py-4 font-semibold text-lg uppercase tracking-widest transition-all">
                        Reset
                    </button>
                    <button type="submit" class="whitespace-nowrap text-center text-zinc-100 drop-shadow bg-gradient-to-l from-meta-5 via-meta-3/70 to-meta-3 bg-size-200 bg-pos-0 hover:bg-pos-100 border-meta-3 duration-500 shadow-md hover:-translate-y-0.5 hover:bg-slate-600 hover:border-slate-600 hover:text-zinc-200 items-center px-6 py-4 font-semibold text-lg uppercase tracking-widest transition-all">
                        Proceed To Checkout
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    
</script>

