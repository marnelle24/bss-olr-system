<div class="flex flex-col">
    <div x-data="onLoadFunction()" id="registration-form">
        <div x-show="showLoader" class="h-[500px] flex flex-col justify-center items-center">
            <p class="text-3xl text-slate-400 italic text-center">Loading....</p>
        </div>
        <div x-show="!showLoader">
            <form wire:submit="submit" class="space-y-6" x-ref="regform">
            {{-- STEP 1 --}}
                <div x-show="pageDisplay == 1"
                    x-transition:enter="transition duration-500"
                    x-transition:enter-start="transform opacity-0"
                    x-transition:enter-end="transform opacity-0"
                    x-transition:leave="transition duration-500"
                    x-transition:leave-start="transform"
                    x-transition:leave-end="transform opacity-0"
                >
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
                                        <option value="Mr">Mr</option>
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
                    </div>
                </div>
            
                {{-- step 2 --}}
                <div class="flex flex-col h-[500px]"
                    x-show="pageDisplay == 2"
                    x-transition:enter="transition duration-500"
                    x-transition:enter-start="transform opacity-0"
                    x-transition:enter-end="transform opacity-0"
                    x-transition:leave="transition duration-500"
                    x-transition:leave-start="transform"
                    x-transition:leave-end="transform opacity-0"
                >
                    <div class="flex gap-4">
                        <div class="w-2/3 border border-meta-4/60 rounded-xl p-4">
                            <div class="flex flex-wrap gap-2">
                                <p class="text-md text-slate-600 italic">Apply Promo</p>
                                <input type="text" placeholder="Promo Code" class="w-full rounded-none border border-dark bg-white py-4 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                            </div>
                            <div class="flex flex-col gap-2 my-5">
                                <p class="font-bold text-md text-slate-500">Summary</p>
                                <table>
                                    <tr>
                                        <td class="border border-zinc-400 p-1">Name</td>
                                        <td class="border border-zinc-400 p-1">Marnelle Apat</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-zinc-400 p-1">Email Address</td>
                                        <td class="border border-zinc-400 p-1">marnelle24@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-zinc-400 p-1">Contact Number</td>
                                        <td class="border border-zinc-400 p-1">0934274733</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-zinc-400 p-1">Address</td>
                                        <td class="border border-zinc-400 p-1">Cebu City</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-zinc-400 p-1">Ministry</td>
                                        <td class="border border-zinc-400 p-1">test</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-zinc-400 p-1">Nationality</td>
                                        <td class="border border-zinc-400 p-1">test</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-zinc-400 p-1">Age</td>
                                        <td class="border border-zinc-400 p-1">21 years old</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="w-1/3">
                            <img src="https://www.biblesociety.sg/wp-content/uploads/2024/08/TN-D6-2025-updated.jpg" alt="test" class="w-full xl:h-[200px] h-[200px] object-cover object-center" />
                            <p class="text-2xl text-slate-600 font-bold mt-8">Checkout</p>

                            <table class="w-full mt-10">
                                <tbody>
                                    <tr>
                                        <td class="text-xl p-1">Total Amount</td>
                                        <td class="text-right text-xl p-1">SG$100.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-xl p-1">Discount</td>
                                        <td class="text-right text-xl p-1">-SG$50.00</td>
                                    </tr>
                                </tbody>
                                <tfoot class="border-t border-slate-500">
                                    <tr>
                                        <td class="text-xl px-1 pb-1 pt-5 font-bold">Net Amount</td>
                                        <td class="text-right text-xl px-1 pb-1 pt-5 font-bold">SG$150.00</td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="flex gap-4 justify-between mt-5">
                    <div>
                        <div class="flex gap-1">
                            <button @click.prevent="previous" :disabled="pageDisplay===1" type="button" class="disabled:opacity-0 text-meta-4/60 hover:-translate-y-1 duration-300 drop-shadow flex items-center uppercase font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 stroke-meta-4/60">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                                Back
                            </button>
                        </div>
                    </div>

                    <button x-show="pageDisplay == 1" @click.prevent="next" class="lg:w-1/2 w-full flex justify-center text-zinc-100 drop-shadow bg-gradient-to-l from-meta-5 via-meta-4/70 to-meta-3 bg-size-200 bg-pos-0 hover:bg-pos-100 border-meta-3 duration-500 shadow-md hover:-translate-y-0.5 hover:bg-slate-600 hover:border-slate-600 hover:text-zinc-200 items-center px-6 py-4 font-semibold text-lg uppercase tracking-widest transition-all">
                        Proceed To Checkout
                    </button>
                    <button x-show="pageDisplay == 2" type="submit" class="lg:w-1/2 w-full flex justify-center text-zinc-100 drop-shadow bg-gradient-to-l from-zinc-600 via-zinc-500 to-zinc-600 bg-size-200 bg-pos-0 hover:bg-pos-100 border-meta-3 duration-500 shadow-md hover:-translate-y-0.5 hover:bg-slate-600 hover:border-slate-600 hover:text-zinc-200 items-center px-6 py-4 font-semibold text-lg uppercase tracking-widest transition-all">
                        Pay Now
                    </button>
                </div>
            </form>
        </div>


    </div>
</div>

<script>
    function onLoadFunction() {
        return {
            pageDisplay: 2,
            total: 2,
            showLoader: false,
            next() {
                if(this.pageDisplay < this.total) 
                {
                    this.showLoader = true

                    setTimeout(() => {
                        this.showLoader = false
                    }, 1500);
                        
                    this.pageDisplay++;
                }

                $refs.regform.scrollIntoView()
            },
            previous() {
                if(this.pageDisplay > 1) 
                {
                    this.showLoader = true
                    
                    setTimeout(() => {
                        this.pageDisplay--;
                    }, 1000);
                    
                    this.showLoader = false
                }

                $refs.regform.scrollIntoView()
            },
        }

    }
</script>

