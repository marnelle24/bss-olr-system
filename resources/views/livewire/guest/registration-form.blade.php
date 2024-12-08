<div class="flex flex-col">
    {{-- Stepper Component --}}
    <div class="w-full py-10">
        <div class="flex justify-between xl:px-10 px-0">
            {{-- Step 1 --}}
            <div wire:click="changeStep(1)" class="flex flex-col items-center relative">
                <div class="w-10 h-10 cursor-pointer hover:-translate-y-0.5 duration-300 shadow rounded-full flex items-center justify-center bg-{{ $step >= 1 ? 'teal-600' : 'slate-300' }} text-white font-bold">
                    1
                </div>
                <div class="text-xs font-semibold mt-2 {{ $step >= 1 ? 'text-teal-600' : 'text-slate-500' }}">Registration</div>
                {{-- Connector Line --}}
                <div class="absolute w-full h-1 top-5 z-0 -right-[80%]">
                    <div class="h-full {{ $step > 1 ? 'bg-teal-600' : 'bg-slate-300' }} transition-all duration-500 2xl:w-[350px] xl:w-[220px] w-[65px]"></div>
                </div>
            </div>

            {{-- Step 2 --}}
            <div wire:click="changeStep(2)" class="flex flex-col items-center relative">
                <div class="w-10 h-10 cursor-pointer hover:-translate-y-0.5 duration-300 shadow rounded-full flex items-center justify-center bg-{{ $step >= 2 ? 'teal-600' : 'slate-300' }} text-white font-bold">
                    2
                </div>
                <div class="text-xs xl:w-full w-3/4 text-center font-semibold mt-2 {{ $step >= 2 ? 'text-teal-600' : 'text-slate-500' }}">Additional Info</div>
                {{-- Connector Line --}}
                <div class="absolute w-full h-1 top-5 z-0 -right-[75%]">
                    <div class="h-full {{ $step > 2 ? 'bg-teal-600' : 'bg-slate-300' }} transition-all duration-500 2xl:w-[350px] xl:w-[190px] w-[65px]"></div>
                </div>
            </div>

            {{-- Step 3 --}}
            <div wire:click="changeStep(3)" class="flex justify-center flex-col items-center relative">
                <div class="w-10 h-10 cursor-pointer hover:-translate-y-0.5 duration-300 shadow rounded-full flex items-center justify-center bg-{{ $step >= 3 ? 'teal-600' : 'slate-300' }} text-white font-bold">
                    3
                </div>
                <div class="text-xs xl:w-full w-3/4 text-center font-semibold mt-2 {{ $step >= 3 ? 'text-teal-600' : 'text-slate-500' }}">Promo Code</div>
                {{-- Connector Line --}}
                <div class="absolute w-full h-1 top-5 z-0 -right-[80%]">
                    <div class="h-full {{ $step > 3 ? 'bg-teal-600' : 'bg-slate-300' }} transition-all duration-500 2xl:w-[170px] w-[46px]"></div>
                </div>
            </div>

            {{-- Step 4 --}}
            <div wire:click="changeStep(4)" class="flex flex-col items-center">
                <div class="w-10 h-10 cursor-pointer hover:-translate-y-0.5 duration-300 shadow rounded-full flex items-center justify-center bg-{{ $step >= 4 ? 'teal-600' : 'slate-300' }} text-white font-bold">
                    4
                </div>
                <div class="text-xs font-semibold mt-2 {{ $step >= 4 ? 'text-teal-600' : 'text-slate-500' }}">Review</div>
            </div>
        </div>
    </div>

    {{-- Existing Form Content --}}
    <form wire:submit.prevent="submit" class="space-y-6">
        <div class="relative overflow-hidden">
            <div class="transition-transform duration-500 ease-in-out" style="transform: translateX(-{{ ($step - 1) * 100 }}%)">
                <div class="flex">

                        {{-- Step 1: Registration Details --}}
                        <div class="w-full flex-shrink-0">
                            <div class="mb-2">
                                <h1 class="lg:text-left text-center lg:text-2xl text-3xl text-slate-500 font-bold mb-1">
                                    Registration Details
                                </h1>
                                <p class="text-slate-500 lg:text-left text-center">
                                    Please fill in the following details to complete your registration.
                                </p>
                            </div>
                            <div class="space-y-6">
                                <div class="flex lg:flex-row flex-col gap-2">
                                    <div class="flex lg:flex-row flex-col gap-2 lg:w-1/2 w-full">
                                        @if(!in_array('nric', $this->hiddenFields))
                                            <div class="lg:w-1/2 w-full">
                                                <label class="mb-2.5 block font-medium text-black">NRIC # </label>
                                                <input wire:model.blur="form.nric" type="text" placeholder="Last 4-digit" maxlength="4" class="w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                                                @error('form.nric')
                                                    <em class="text-danger text-xs">{{ $message }}</em>
                                                @enderror
                                            </div>
                                        @endif
                                        
                                        @if(!in_array('title', $this->hiddenFields))
                                            <div class="lg:w-1/2 w-full">
                                                <label class="mb-2.5 block font-medium text-black">Title</label>
                                                <select wire:model.blur="form.title" id="title" class="w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default">
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
                                </div>
                                <div class="flex lg:flex-row flex-col gap-2">
                                    @if(!in_array('firstName', $this->hiddenFields))
                                        <div class="w-full lg:w-1/2">
                                            <label class="mb-2.5 block font-medium text-black">First Name</label>
                                            <input wire:model.blur="form.firstName" type="text" placeholder="First Name" class="w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                                            @error('form.firstName')
                                                <em class="text-danger text-xs">{{ $message }}</em>
                                            @enderror
                                        </div>
                                    @endif
                            
                                    @if(!in_array('lastName', $this->hiddenFields))
                                        <div class="w-full lg:w-1/2">
                                            <label class="mb-2.5 block font-medium text-black">Last Name</label>
                                            <input wire:model.blur="form.lastName" type="text" placeholder="Last Name" class="w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                                            @error('form.lastName')
                                                <em class="text-danger text-xs">{{ $message }}</em>
                                            @enderror
                                        </div>
                                    @endif
                                </div>                     
                                <div class="flex lg:flex-row flex-col gap-2">
                                    @if(!in_array('email', $this->hiddenFields))
                                        <div class="w-full lg:w-1/2">
                                            <label class="mb-2.5 block font-medium text-black">Email Address</label>
                                        <input wire:model.blur="form.email" type="text" placeholder="Email Address" class="w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
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
                                <div class="pt-2">
                                    @if(!in_array('address', $this->hiddenFields))
                                        <p class="font-semibold border-b-2 border-slate-400/20 text-lg mt-2 mb-4">Address</p>
                                        <div class="flex lg:flex-row flex-col gap-2">
                                            <div class="w-full">
                                                <label class="mb-2.5 block font-medium text-black">Bldg. / Block # / Street Name</label>
                                                <input wire:model.blur="form.address" type="text" placeholder="Bldg # / Block No / Street Name" class="w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                                                @error('form.address')
                                                    <em class="text-danger text-xs">{{ $message }}</em>
                                                @enderror
                                            </div>
                                            <div class="w-full lg:w-1/3">
                                                <label class="mb-2.5 block font-medium text-black">City</label>
                                                <input wire:model.blur="form.city" type="text" placeholder="City" class="w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                                                @error('form.city')
                                                    <em class="text-danger text-xs">{{ $message }}</em>
                                                @enderror
                                            </div>
                                            <div class="w-full lg:w-1/4">
                                                <label class="mb-2.5 block font-medium text-black">Postal Code</label>
                                                <input wire:model.blur="form.postalCode" type="text" placeholder="Postal" class="w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                                                @error('form.postalCode')
                                                    <em class="text-danger text-xs">{{ $message }}</em>
                                                @enderror
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            
                            </div>
                        </div>
                        
                        {{-- Step 2: Additional Information --}}
                        @if(!empty($extraFields) || count($extraFields) > 0)
                            <div class="w-full flex-shrink-0">
                                <livewire:guest.additional-fields-form :extraFields="$extraFields" />
                            </div>
                        @endif

                        {{-- Step 3: Promo Code --}}
                        <div class="w-full flex-shrink-0">
                            <livewire:guest.promo-code-form :programCode="$eventDetails['programCode']" />
                        </div>

                        {{-- Step 4: Review & Submit --}}
                        <div class="w-full flex-shrink-0">
                            <livewire:guest.review-details-checkout 
                                :registrationForm="[]" 
                                :promoCodeForm="[]" 
                                :additionalFieldsForm="[]" 
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    
</div>