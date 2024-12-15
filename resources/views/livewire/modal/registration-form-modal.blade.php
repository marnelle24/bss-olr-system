<div>
    <!-- Modal -->
    <div 
        x-data="{ open: @entangle('showModal') }" 
        x-show="open" 
        x-transition:enter="transition ease-in-out duration-300" 
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100" 
        x-transition:leave="transition ease-in-out duration-300" 
        x-transition:leave-start="opacity-100" 
        x-transition:leave-end="opacity-0" 
        class="fixed inset-0 z-[99999] flex items-start justify-center"
        style="display: none;"
    >
        <!-- Modal background -->
        <div class="w-full h-full fixed inset-0 bg-black opacity-70"></div>

        <!-- Modal content -->
        <div class="bg-white xl:w-1/2 w-full h-auto overflow-y-auto rounded-none shadow-lg z-10 my-10 xl:mx-0 mx-3">
            <div class="flex justify-between items-center p-6 bg-gradient-to-l from-teal-600 via-teal-500 to-teal-600 bg-size-200 bg-pos-0">
                <p class="text-xl text-white uppercase mb-2">{{ $programItem ? 'Registration for ' . $programItem['title'] : 'Registration Here' }}</p>
                <button wire:click="closeModal" class="text-slate-100 hover:text-white hover:-translate-y-1 duration-300 drop-shadow text-2xl">
                    &#10005;
                </button>
            </div>
            <div class="px-8 pb-8 pt-4 overflow-y-auto max-h-[calc(100vh-10rem)]">

                {{-- Stepper --}}
                <div class="w-full py-10">
                    <div class="flex justify-between xl:px-10 px-0">
                        {{-- Step 1 --}}
                        <div wire:click.prevent="changeStep(1)" class="flex flex-col items-center relative">
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

                {{-- Form --}}
                <form wire:submit="submit" class="space-y-6">
                    <div class="space-y-6">
                        <div class="relative overflow-hidden">
                            <div class="transition-transform duration-500 ease-in-out" style="transform: translateX(-{{ ($step - 1) * 100 }}%)">
                                <div class="flex">
                                    {{-- Step 1: Registration --}}
                                    <div class="w-full flex-shrink-0 px-10">
                                        <div class="mb-8">
                                            <h1 class="lg:text-left text-center lg:text-2xl text-3xl text-slate-500 font-bold mb-1">
                                                Registration Details
                                            </h1>
                                            <p class="text-slate-500 lg:text-left text-center">
                                                Please fill in the following details to complete your registration.
                                            </p>
                                        </div>
                                        <div class="flex lg:flex-row flex-col gap-5 lg:w-1/2 w-full">
                                            @if(!in_array('nric', $hiddenFields))
                                                <div class="lg:w-1/2 w-full">
                                                    <livewire:guest.form.input-field-manager 
                                                        :label="'NRIC #'" 
                                                        :name="'form.nric'" 
                                                        :type="'text'" 
                                                        :placeholder="'Last 4-digit'" 
                                                        :maxlength="4" 
                                                        :required="in_array('nric', $requiredFields)"
                                                        :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none'" 
                                                    />
                                                    @error('form.nric')
                                                        <em class="text-danger text-xs">{{ $message }}</em>
                                                    @enderror
                                                </div>
                                            @endif
                                            
                                            @if(!in_array('title', $hiddenFields))
                                                <div class="lg:w-1/2 w-full">
                                                    <livewire:guest.form.select-field-manager 
                                                        :label="'Title'" 
                                                        :name="'form.title'" 
                                                        :required="in_array('title', $requiredFields)"
                                                        :options="[
                                                            'Mr' => 'Mr',
                                                            'Ms' => 'Ms',
                                                            'Mrs' => 'Mrs'
                                                        ]" 
                                                        :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none'" 
                                                    />
                                                    @error('form.title')
                                                        <em class="text-danger text-xs">{{ $message }}</em>
                                                    @enderror
                                                </div>
                                            @endif
                                        </div>

                                        <div class="mt-4 flex lg:flex-row flex-col gap-5">
                                            @if(!in_array('firstName', $hiddenFields))
                                                <div class="w-full lg:w-1/2">
                                                    <livewire:guest.form.input-field-manager 
                                                        :label="'First Name'" 
                                                        :name="'form.firstName'" 
                                                        :type="'text'" 
                                                        :required="in_array('firstName', $requiredFields)"
                                                        :placeholder="'First Name'" 
                                                        :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none'" 
                                                    />
                                                    @error('form.firstName')
                                                        <em class="text-danger text-xs">{{ $message }}</em>
                                                    @enderror
                                                </div>
                                            @endif
                                        
                                            @if(!in_array('lastName', $hiddenFields))
                                                <div class="w-full lg:w-1/2">
                                                    <livewire:guest.form.input-field-manager 
                                                        :label="'Last Name'" 
                                                        :name="'form.lastName'" 
                                                        :type="'text'" 
                                                        :required="in_array('lastName', $requiredFields)"
                                                        :placeholder="'Last Name'" 
                                                        :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none'" 
                                                    />
                                                    @error('form.lastName')
                                                        <em class="text-danger text-xs">{{ $message }}</em>
                                                    @enderror
                                                </div>
                                            @endif
                                        </div>

                                        <div class="mt-4 flex lg:flex-row flex-col gap-5">
                                            @if(!in_array('email', $hiddenFields))
                                                <div class="w-full lg:w-1/2">
                                                    <livewire:guest.form.input-field-manager 
                                                        :isInternational="$isInternational"
                                                        :label="'Email Address'" 
                                                        :name="'form.email'" 
                                                        :type="'email'" 
                                                        :placeholder="'Email Address'" 
                                                        :required="in_array('email', $requiredFields)"
                                                        :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none'" 
                                                    />
                                                    @error('form.email')
                                                        <em class="text-danger text-xs">{{ $message }}</em>
                                                    @enderror
                                                </div>
                                            @endif
                                        
                                            @if(!in_array('contactNumber', $hiddenFields))
                                                <div class="w-full lg:w-1/2">
                                                    <livewire:guest.form.contact-number-manager 
                                                        :isInternational="$isInternational"
                                                        :label="$contacNumberLabel" 
                                                        :name="'form.contactNumber'" 
                                                        :type="'tel'" 
                                                        :required="in_array('contactNumber', $requiredFields)"
                                                        :placeholder="'Contact Number'" 
                                                        :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none'" 
                                                    />
                                                    @error('form.contactNumber')
                                                        <em class="text-danger text-xs">{{ $message }}</em>
                                                    @enderror
                                                </div>
                                            @endif
                                        </div>

                                        <div class="space-y-4">
                                            @if(!in_array('address', $hiddenFields))
                                                <p class="font-semibold border-b-2 border-slate-400/20 text-lg mt-2 mb-4">Address</p>
                                                <div class="flex lg:flex-row flex-col gap-2">
                                                    <div class="w-full">
                                                        <livewire:guest.form.input-field-manager 
                                                            :label="'Bldg. / Block # / Street Name'" 
                                                            :name="'form.address'" 
                                                            :type="'text'" 
                                                            :placeholder="'Bldg # / Block No / Street Name'" 
                                                            :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none'" 
                                                        />
                                                        @error('form.address')
                                                            <em class="text-danger text-xs">{{ $message }}</em>
                                                        @enderror
                                                    </div>
                                                    <div class="w-full lg:w-1/3">
                                                        <livewire:guest.form.input-field-manager 
                                                            :label="'City'" 
                                                            :name="'form.city'" 
                                                            :type="'text'" 
                                                            :placeholder="'City'" 
                                                            :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none'" 
                                                        />
                                                        @error('form.city')
                                                            <em class="text-danger text-xs">{{ $message }}</em>
                                                        @enderror
                                                    </div>
                                                    <div class="w-full lg:w-1/4">
                                                        <livewire:guest.form.input-field-manager 
                                                            :label="'Postal Code'" 
                                                            :name="'form.postalCode'" 
                                                            :type="'text'" 
                                                            :placeholder="'Postal'" 
                                                            :maxlength="6"
                                                            :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none'" 
                                                        />
                                                        @error('form.postalCode')
                                                            <em class="text-danger text-xs">{{ $message }}</em>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                    </div>

                                    {{-- Step 2: Additional Info --}}
                                    <div class="w-full flex-shrink-0 px-10">
                                        <div class="mb-4">
                                            <h1 class="lg:text-left text-center lg:text-2xl text-3xl text-slate-500 font-bold mb-2">
                                                Additional Information
                                            </h1>
                                            <p class="text-slate-500 lg:text-left text-center">
                                                Please provide additional information.
                                            </p>
                                        </div>
                                        <div class="space-y-6">
                                            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-8">
                                                @foreach($extraFields as $field)
                                                    @switch($field->type)
                                                        @case('text')
                                                            <livewire:guest.form.input-field-manager
                                                                :inputKey="$field->key" 
                                                                :label="$field->label" 
                                                                :type="$field->type" 
                                                                :maxlength="isset($field->maxlength) ? $field->maxlength : null"
                                                                :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none'"
                                                                :placeholder="$field->placeholder" 
                                                                :required="isset($field->required) && $field->required ? $field->required : false"
                                                            />
                                                        @break
                                                        @case('radio')
                                                            <livewire:guest.form.radio-field-manager
                                                                :inputKey="$field->key" 
                                                                :label="$field->label" 
                                                                :type="$field->type" 
                                                                :options="$field->options" 
                                                                :required="isset($field->required) && $field->required ? $field->required : false"
                                                            />
                                                        @break
                                                        @case('checkbox')
                                                            <livewire:guest.form.checkbox-manager
                                                                :inputKey="$field->key" 
                                                                :label="$field->label" 
                                                                :type="$field->type" 
                                                                :options="$field->options" 
                                                                :required="isset($field->required) && $field->required ? $field->required : false"
                                                            />
                                                        @break
                                                        @case('textarea')
                                                            <livewire:guest.form.text-area-field-manager
                                                                :inputKey="$field->key" 
                                                                :label="$field->label" 
                                                                :placeholder="$field->placeholder" 
                                                                :required="isset($field->required) && $field->required ? $field->required : false"
                                                                :rows="isset($field->rows) ? $field->rows : 3"
                                                            />
                                                        @break
                                                        
                                                        @case('select')
                                                            <livewire:guest.form.select-field-manager
                                                                :inputKey="$field->key" 
                                                                :label="$field->label" 
                                                                :options="$field->options" 
                                                                :required="isset($field->required) && $field->required ? $field->required : false"
                                                            />
                                                        @break
                                                    @endswitch
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Step 3: Promo Code --}}
                                    <div class="w-full flex-shrink-0 px-10">
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
                                        </div>
                                    </div>

                                    {{-- Step 4: Review --}}
                                    <div class="w-full flex-shrink-0 px-10">4</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <br />
                    <div class="flex justify-between">
                        <p wire:click="closeModal" class="text-teal-700 cursor-pointer hover:text-teal-600 duration-300 hover:-translate-y-0.5">Cancel</p>
                        <div class="flex justify-end">
                            {{-- <button type="submit" class="bg-teal-600 hover:bg-teal-700 duration-300 hover:-translate-y-0.5 text-white py-2.5 px-3.5 rounded-none flex gap-1 items-center justify-center"> --}}
                            <button wire:click="changeStep({{ $step + 1 }})" type="button" class="bg-teal-600 hover:bg-teal-700 duration-300 hover:-translate-y-0.5 text-white py-2.5 px-3.5 rounded-none flex gap-1 items-center justify-center">
                                Next
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
