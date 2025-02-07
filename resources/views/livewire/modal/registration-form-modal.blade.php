<div>
    <!-- Modal -->
    <div 
        x-data="{ 
            open: @entangle('showModal'),
            scrollToTop() {
                $el.querySelector('.bg-white').scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
        }" 
        x-show="open" 
        x-transition:enter="transition ease-in-out duration-300" 
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100" 
        x-transition:leave="transition ease-in-out duration-300" 
        x-transition:leave-start="opacity-100" 
        x-transition:leave-end="opacity-0" 
        class="fixed inset-0 z-[99999] flex items-start justify-center"
        style="display: none;"
        @validation-error.window="scrollToTop()"
    >
        <!-- Modal background -->
        <div class="w-full h-full fixed inset-0 bg-black opacity-70"></div>

        <!-- Modal content -->
        <div class="bg-white xl:w-1/2 w-full h-auto rounded-none shadow-lg z-10 my-10 xl:mx-0 mx-3 max-h-[90vh] overflow-y-auto scroll-smooth">
            <div class="flex justify-between items-center p-6 bg-gradient-to-l from-teal-600 via-teal-500 to-teal-600 bg-size-200 bg-pos-0">
                <p class="text-xl text-white uppercase mb-2">{{ $programItem ? 'Registration for ' . $programItem['title'] : 'Registration Here' }}</p>
                <button wire:click="closeModal" class="text-slate-100 hover:text-white hover:-translate-y-1 duration-300 drop-shadow text-2xl">
                    &#10005;
                </button>
            </div>
            <form class="space-y-6">
                <div class="px-8 pt-10">
                    @if ($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-red-700">
                                        Please correct the following errors:
                                    </p>
                                    <ul class="mt-2 text-xs text-red-700 list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="flex flex-col gap-8">
                        {{-- Step 1: Registration --}}
                        <div id="registration-form" class="w-full">
                            <div class="mb-4 bg-slate-100/70 p-4">
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
                                            :inputKey="'nric'"
                                            :type="'text'" 
                                            :placeholder="'Last 4-digit'" 
                                            :maxlength="4" 
                                            :required="in_array('nric', $requiredFields)"
                                            :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none'" 
                                            :key="'nric'"
                                        />
                                        @error('form.fields.nric')
                                            <em class="text-danger text-xs">{{ $message }}</em>
                                        @enderror
                                    </div>
                                @endif
                                
                                @if(!in_array('title', $hiddenFields))
                                    <div class="lg:w-1/2 w-full">
                                        <livewire:guest.form.select-field-manager 
                                            :key="'title'"
                                            :inputKey="'title'"
                                            :label="'Title'" 
                                            :required="in_array('title', $requiredFields)"
                                            :options="[
                                                'Mr' => 'Mr',
                                                'Ms' => 'Ms',
                                                'Mrs' => 'Mrs'
                                            ]" 
                                            :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none'" 
                                        />
                                        @error('form.fields.title')
                                            <em class="text-danger text-xs">{{ $message }}</em>
                                        @enderror
                                    </div>
                                @endif
                            </div>

                            <div class="mt-4 flex lg:flex-row flex-col gap-5">
                                @if(!in_array('firstName', $hiddenFields))
                                    <div class="w-full lg:w-1/2">
                                        <livewire:guest.form.input-field-manager 
                                            :key="'firstName'"
                                            :inputKey="'firstName'"
                                            :label="'First Name'" 
                                            :type="'text'" 
                                            :required="in_array('firstName', $requiredFields)"
                                            :placeholder="'First Name'" 
                                            :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none'" 
                                        />
                                        @error('form.fields.firstName')
                                            <em class="text-danger text-xs">{{ $message }}</em>
                                        @enderror
                                    </div>
                                @endif
                            
                                @if(!in_array('lastName', $hiddenFields))
                                    <div class="w-full lg:w-1/2">
                                        <livewire:guest.form.input-field-manager 
                                            :key="'lastName'"
                                            :inputKey="'lastName'"
                                            :label="'Last Name'" 
                                            :type="'text'" 
                                            :required="in_array('lastName', $requiredFields)"
                                            :placeholder="'Last Name'" 
                                            :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none'" 
                                        />
                                        @error('form.fields.lastName')
                                            <em class="text-danger text-xs">{{ $message }}</em>
                                        @enderror
                                    </div>
                                @endif
                            </div>

                            <div class="mt-4 flex lg:flex-row flex-col gap-5">
                                @if(!in_array('email', $hiddenFields))
                                    <div class="w-full lg:w-1/2">
                                        <livewire:guest.form.input-field-manager 
                                            :key="'email'"
                                            :inputKey="'email'"
                                            wire:model.live="form.fields.email"
                                            :isInternational="$isInternational"
                                            :label="'Email Address'" 
                                            :type="'email'" 
                                            :placeholder="'Email Address'" 
                                            :required="in_array('email', $requiredFields)"
                                            :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none'" 
                                        />
                                        @error('form.fields.email')
                                            <em class="text-danger text-xs">{{ $message }}</em>
                                        @enderror
                                    </div>
                                @endif
                            
                                @if(!in_array('contactNumber', $hiddenFields))
                                    <div class="w-full lg:w-1/2">
                                        <livewire:guest.form.contact-number-manager 
                                            :key="'contactNumber'"
                                            :inputKey="'contactNumber'"
                                            :isInternational="$isInternational"
                                            :label="$contacNumberLabel" 
                                            :type="'tel'" 
                                            :required="in_array('contactNumber', $requiredFields)"
                                            :placeholder="'Contact Number'" 
                                            :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none'" 
                                        />
                                        @error('form.fields.contactNumber')
                                            <em class="text-danger text-xs">{{ $message }}</em>
                                        @enderror
                                    </div>
                                @endif
                            </div>

                            <div class="space-y-4 mt-8">
                                @if(!in_array('address', $hiddenFields))
                                    <p class="font-semibold text-lg mt-2 mb-4">Address</p>
                                    <div class="flex lg:flex-row flex-col gap-2">
                                        <div class="w-full">
                                            <livewire:guest.form.input-field-manager
                                                :key="'address'"
                                                :inputKey="'address'"
                                                :label="'Bldg. / Block # / Street Name'" 
                                                :type="'text'" 
                                                :placeholder="'Bldg # / Block No / Street Name'" 
                                                :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none'" 
                                            />
                                            @error('form.fields.address')
                                                <em class="text-danger text-xs">{{ $message }}</em>
                                            @enderror
                                        </div>
                                        <div class="w-full lg:w-1/3">
                                            <livewire:guest.form.input-field-manager
                                                :key="'city'"
                                                :inputKey="'city'"
                                                :label="'City'" 
                                                :type="'text'" 
                                                :placeholder="'City'" 
                                                :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none'" 
                                            />
                                            @error('form.fields.city')
                                                <em class="text-danger text-xs">{{ $message }}</em>
                                            @enderror
                                        </div>
                                        <div class="w-full lg:w-1/4">
                                            <livewire:guest.form.input-field-manager 
                                                :key="'postalCode'"
                                                :inputKey="'postalCode'"
                                                :label="'Postal Code'" 
                                                :type="'text'" 
                                                :placeholder="'Postal'" 
                                                :maxlength="6"
                                                :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none'" 
                                            />
                                            @error('form.fields.postalCode')
                                                <em class="text-danger text-xs">{{ $message }}</em>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Step 2: Additional Info --}}
                        @if(!$extraFields)
                            <div id="additional-info-form" class="w-full">
                                <div class="mb-4 py-4 bg-slate-100/70 p-4">
                                    <h1 class="lg:text-left text-center lg:text-xl text-2xl text-slate-500 font-bold">
                                        Additional Information
                                    </h1>
                                    <p class="text-slate-500 lg:text-left text-center">
                                        Please provide additional information.
                                    </p>
                                </div>
                                <div class="space-y-6">
                                    @foreach($extraFields as $field)
                                        <div class="pt-2">
                                            @switch($field->type)
                                                @case(in_array($field->type, ['text', 'date', 'number']))
                                                    <livewire:guest.form.input-field-manager
                                                        :key="$field->key"
                                                        :inputKey="$field->key" 
                                                        :label="$field->label" 
                                                        :type="$field->type" 
                                                        :maxlength="isset($field->maxlength) ? $field->maxlength : null"
                                                        :class="'w-full rounded-none border border-dark bg-white py-2 pl-2 focus:border-default focus:ring-0 focus-visible:shadow-none'"
                                                        :placeholder="isset($field->placeholder) ? $field->placeholder : null" 
                                                        :required="isset($field->required) && $field->required ? $field->required : false"
                                                    />
                                                    @error('form.fields.'.$field->key)
                                                        <em class="text-danger text-xs">{{ $message }}</em>
                                                    @enderror
                                                @break
                                                @case('radio')
                                                    <livewire:guest.form.radio-field-manager
                                                        :key="$field->key"
                                                        :inputKey="$field->key" 
                                                        :label="$field->label" 
                                                        :type="$field->type" 
                                                        :options="$field->options" 
                                                        :required="isset($field->required) && $field->required ? $field->required : false"
                                                    />
                                                @break
                                                @case('checkbox')
                                                    <livewire:guest.form.checkbox-manager
                                                        :key="$field->key"
                                                        :inputKey="$field->key" 
                                                        :label="$field->label" 
                                                        :type="$field->type" 
                                                        :options="$field->options" 
                                                        :required="isset($field->required) && $field->required ? $field->required : false"
                                                    />
                                                @break
                                                @case('textarea')
                                                    <livewire:guest.form.text-area-field-manager
                                                        :key="$field->key"
                                                        :inputKey="$field->key" 
                                                        :label="$field->label" 
                                                        :placeholder="$field->placeholder" 
                                                        :required="isset($field->required) && $field->required ? $field->required : false"
                                                        :rows="isset($field->rows) ? $field->rows : 3"
                                                    />
                                                @break
                                                @case('select')
                                                    <livewire:guest.form.select-field-manager
                                                        :key="$field->key"
                                                        :inputKey="$field->key" 
                                                        :label="$field->label" 
                                                        :options="$field->options" 
                                                        :required="isset($field->required) && $field->required ? $field->required : false"
                                                    />
                                                @break
                                            @endswitch
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        {{-- Step 3: Promo Code --}}
                        <div id="promo-code-form" class="w-full">
                            <div class="mb-1 bg-slate-100/70 p-4">
                                <h1 class="lg:text-left text-center lg:text-xl text-2xl text-slate-500 font-bold">
                                    Promo and Discount Code
                                </h1>
                                <p class="text-slate-500 lg:text-left text-center">
                                    Apply promo code (if applicable) and registration checkout details.
                                </p>
                            </div>
                            <div class="space-y-6">
                                <div class="flex flex-col gap-2 my-2">
                                    <div class="flex w-full">
                                        <input 
                                            {{ $form->promoCodeDetails ? 'disabled' : '' }}
                                            wire:model="form.promoCode" 
                                            type="text" 
                                            placeholder="Enter Promo Code" 
                                            class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:border-slate-400 disabled:text-slate-500 placeholder:text-slate-400/80 uppercase w-full rounded-none border border-slate-400/60 bg-white p-4 text-xl focus:ring-0" 
                                        />
                                        <button 
                                            :disabled="{{ $form->promoCode ? 'disabled' : '' }}"
                                            wire:click="validatePromoCode" 
                                            type="button" 
                                            class="disabled:bg-zinc-300/60 disabled:hover:bg-gradient-none disabled:hover:from-zinc-200 disabled:hover:via-zinc-300 disabled:hover:to-zinc-300 disabled:text-zinc-400 disabled:border-slate-400 whitespace-nowrap disabled:cursor-not-allowed bg-teal-600 duration-300 border ring-0 outline-none border-slate-400/60 hover:bg-gradient-to-l hover:from-teal-600 hover:via-teal-500 hover:to-teal-600 hover:bg-size-200 hover:bg-pos-100 text-white px-4 py-2 rounded-none text-lg">
                                            {{ $form->promoCodeDetails ? 'Promo Code Applied' : 'Apply' }}
                                        </button>
                                    </div>
                                    @error('form.promoCode')
                                        <em class="text-danger text-sm">{{ $message }}</em>
                                    @enderror
                                    @if(session('form.promoCode') || $this->form->promoCodeDetails)
                                        <em class="text-success text-sm">{{ session('form.promoCode') }}</em>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Step 4: Review --}}
                        <div id="review-form" class="w-full">
                            <div class="space-y-6">
                                <div class="mt-4 flex flex-col gap-2">
                                    <label class="inline-flex items-center">
                                        <input checked type="checkbox" name="privacy_policy" class="form-checkbox h-5 w-5 text-slate-600 focus:ring-0" required />
                                        <span class="ml-2 text-sm text-gray-700">I accept the <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a></span>
                                    </label>
                                    <label class="inline-flex items-start">
                                        <input checked type="checkbox" name="privacy_policy" class="form-checkbox h-5 w-5 text-slate-600 focus:ring-0" required />
                                        <span class="ml-2 text-sm text-gray-700">
                                            By providing your contact details, you consent to our collection, use and disclosure of your personal data as described in our privacy policy on our website. We do strive to limit the amount of personal data we collect to that which is sufficient to support the intended purpose of the collection
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <br />
                    <div class="flex lg:flex-row flex-col gap-4 justify-center px-2">
                        <button wire:click="submit" type="button" class="lg:whitespace-nowrap whitespace-normal text-center text-zinc-100 drop-shadow bg-gradient-to-l from-teal-500 via-meta-3/70 to-meta-3 bg-size-200 bg-pos-0 hover:bg-pos-100 border-meta-3 duration-500 shadow-md hover:-translate-y-0.5 hover:bg-slate-600 hover:border-slate-600 hover:text-zinc-200 items-center px-6 py-4 font-semibold text-lg uppercase tracking-widest transition-all">
                            Submit Registration
                            {{-- {{  > 0 ? 'Register & Proceed to Payment' : 'Submit Registration' }} --}}
                        </button>
                    </div>
                    <br />
                    <br />
                </div>
            </form>
        </div>
    </div>


    {{-- confirmation and review registration modal --}}
    @if($this->form->finalRegistrationData)
        <div 
            x-data="{ 
                open: @entangle('showConfirmationModal'),
            }" 
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
            <div class="w-full h-full fixed inset-0 bg-black opacity-70"></div>
            <div class="bg-white xl:w-[40%] w-full h-auto rounded-none shadow-lg z-10 my-16 xl:mx-0 mx-3 max-h-[90vh] overflow-y-auto scroll-smooth">
                <div class="flex justify-between items-center xl:p-6 p-3 bg-gradient-to-l from-teal-600 via-teal-500 to-teal-600 bg-size-200 bg-pos-0">
                    <p class="xl:text-xl text-lg text-white uppercase mb-2">Review & Confirm Registration</p>
                    <button wire:click="closeConfirmationModal" class="text-slate-100 hover:text-white hover:-translate-y-1 duration-300 drop-shadow xl:text-2xl text-xl">
                        &#10005;
                    </button>
                </div>

                <div class="xl:p-8 p-4">
                    <div class="mb-8 bg-slate-100/70 p-4">
                        <h1 class="lg:text-left text-center text-xl text-slate-500 font-bold">
                            Review Registration Details
                        </h1>
                        <p class="text-slate-500 lg:text-left text-center">
                            Please review the following details to complete your registration.
                        </p>
                    </div>

                    <div class="mt-6">
                        @php
                            // Testing
                            // $dummyData = json_decode($dummyData, JSON_PRETTY_PRINT);
                            // $registrationFields = $dummyData['registrationFields'];
                            // $programItem = $dummyData['programItem'];
                            // $promoDetails = $dummyData['promoDetails'];
                            // $extraFieldValues = json_decode($dummyData['extraFieldValues'], true);
                            // End of testing
                            
                            $registrationFields = $form->finalRegistrationData['registrationFields'];
                            $programItem = $form->finalRegistrationData['programItem'];
                            $promoDetails = $form->finalRegistrationData['promoDetails'];
                            $extraFieldValues = json_decode($form->finalRegistrationData['extraFieldValues'], true);
                        @endphp
                        <table class="table-auto w-full">
                            <tr class="border border-slate-400">
                                <td class="p-3 text-left py-1 w-1/4 font-semibold">NRIC #</td>
                                <td class="p-3 text-left py-1">: {{ $registrationFields['nric'] }}</td>
                            </tr>
                            <tr class="border border-slate-400">
                                <td class="p-3 text-left py-1 font-semibold">Name</td>
                                <td class="p-3 text-left py-1">
                                    : {{ $registrationFields['title'] }} {{ $registrationFields['firstName'] }} {{ $registrationFields['lastName'] }}
                                </td>
                            </tr>
                            <tr class="border border-slate-400">
                                <td class="p-3 text-left py-1 font-semibold">Email Address</td>
                                <td class="p-3 text-left py-1">
                                    : {{ $registrationFields['email'] }}
                                </td>
                            </tr>
                            <tr class="border border-slate-400">
                                <td class="p-3 text-left py-1 font-semibold">Contact Number</td>
                                <td class="p-3 text-left py-1">
                                    : {{ $registrationFields['contactNumber'] }}
                                </td>
                            </tr>
                            <tr class="border border-slate-400">
                                <td class="p-3 text-left py-1 font-semibold">Address</td>
                                <td class="p-3 text-left py-1">
                                    : {{ $registrationFields['address'] }} {{ $registrationFields['city'] }} {{ $registrationFields['postalCode'] }}
                                </td>
                            </tr>
                            @foreach($extraFields as $field)
                                <tr class="border border-slate-400">
                                    <td class="p-3 text-left py-1 flex items-start font-semibold">{{ $field->label }}</td>
                                    <td class="p-3 text-left py-1 capitalize">
                                        @php
                                            $getxtraFieldValue = collect($extraFieldValues)->map(function($item) use ($field) {
                                                if(key($item) === $field->key) 
                                                {
                                                    $item['type'] = $field->type;
                                                    return $item;
                                                }
                                                return null;
                                            })->filter()->first();
                                            if($getxtraFieldValue) 
                                            {
                                                if($getxtraFieldValue['type'] === 'checkbox') 
                                                {
                                                    echo '<ul>';
                                                    foreach($getxtraFieldValue[$field->key] as $value)
                                                    {
                                                        echo '<li>: '.$value.'</li>';
                                                    }
                                                    echo '</ul>';
                                                }
                                                else if($getxtraFieldValue['type'] === 'date')
                                                {
                                                    echo ': ' . Carbon\Carbon::parse($getxtraFieldValue[$field->key])->format('M d, Y');
                                                }
                                                else
                                                {
                                                    echo ': ' . $getxtraFieldValue[$field->key];
                                                }
                                            }
                                            else
                                            {
                                                echo ': N/A';
                                            }
                                        @endphp
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <br />

                    <div class="my-4 bg-slate-100/70 p-4">
                        <h1 class="lg:text-left text-center lg:text-2xl text-3xl text-slate-500 font-bold mb-1">
                            Payment & Checkout Details
                        </h1>
                        <p class="text-slate-500 lg:text-left text-center">
                            Double check the payment, discounts and checkout details. 
                            Please disregard for free sessions.
                        </p>
                    </div>

                    <div class="mt-6">
                        <table class="table-auto w-full">
                            <tr class="border border-slate-400">
                                <td class="p-3 border-r border-slate-400 text-left flex gap-1 items-start flex-col">
                                    <h1 class="text-3xl font-semibold leading-tight">{{ $programItem['title'] }}</h1>
                                    <p class="text-sm">
                                        {{ Carbon\Carbon::parse($programItem['startDate'])->format('M d, Y') }}
                                        {{ Carbon\Carbon::parse($programItem['startTime'])->format('h:i A') }} - {{ Carbon\Carbon::parse($programItem['endTime'])->format('h:i A') }}
                                    </p>
                                    <p class="text-sm">
                                        {!! $programItem['venue'] !!}
                                    </p>
                                </td>
                                <td class="p-3 border-t border-r border-slate-400 w-1/3 text-center align-bottom font-light">
                                    <p class="text-lg uppercase ">
                                        @if($promotion)
                                            <s>{{ '$SG ' . number_format($programItem['price'], 2) }}</s>
                                        @else
                                            {{ $programItem['price'] > 0 ? '$SG ' . number_format($programItem['price'], 2) : 'Free' }}
                                        @endif
                                    </p>
                                    @if($promotion)
                                        <div class="mt-3 flex flex-col justify-center">
                                            <p class="text-lg uppercase">
                                                {{ '$SG ' . number_format($promotion['price'], 2) }}
                                            </p>
                                            <div class="flex justify-center">
                                                <p class="text-xs bg-yellow-300/70 border border-yellow-500/70 text-yellow-600 px-2.5 py-0.5 rounded-full">
                                                    {{ $promotion['title'] }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif

                                </td>
                            </tr>
                            @if($promoDetails)
                            <tr class="border border-slate-400">
                                <td class="p-3 border-r border-slate-400 text-left flex gap-1 items-start flex-col">
                                    Promo Code Applied
                                    <br />
                                    <span class="flex items-center gap-2 text-sm bg-green-300/70 border border-green-600/70 text-green-600 px-2 py-1 rounded-none font-semibold">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                        </svg>
                                        {{ $promoDetails['promocode'] ?? ''  }}
                                    </span>
                                </td>
                                <td class="text-lg p-3 font-thin border-r border-slate-400 w-1/3 text-center text-red-600 italic align-bottom uppercase">
                                    @if($promoDetails)
                                        {{ $promoDetails['price'] > 0 ? '-$SG ' . number_format($promoDetails['price'], 2) : '$SG 0.00' }}
                                    @else
                                        {{ $programItem['price'] > 0 ? '-$SG ' . number_format($programItem['price'], 2) : '$SG 0.00' }}
                                    @endif
                                </td>
                            </tr>
                            @endif
                            <tr class="border border-slate-400 bg-slate-100">
                                <td class="text-xl p-3 text-slate-500 border-r border-slate-400 text-left flex gap-1 items-start flex-col">
                                    Net Total
                                </td>
                                <td class="text-lg p-3 border-r border-slate-400 w-1/3 text-center align-bottom uppercase">
                                    {{ '$SG ' . number_format($this->computeNetTotal() > 0 ? $this->computeNetTotal() : 0, 2) }}
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="flex lg:flex-row flex-col justify-center mt-8 gap-4">
                        <button wire:click="closeConfirmationModal" type="button" class="font-bold leading-relaxed truncate lg:whitespace-nowrap whitespace-normal text-center drop-shadow shadow hover:bg-slate-600 hover:-translate-y-0.5 duration-300 bg-slate-500 text-slate-100 px-6 py-4 rounded-full text-md uppercase transition-all">
                            Change Details
                        </button>
                        <button wire:click="confirmAndProceedToPayment" type="button" class="font-bold leading-relaxed truncate lg:whitespace-nowrap whitespace-normal text-center drop-shadow shadow hover:bg-teal-700 hover:-translate-y-0.5 duration-300 bg-teal-600 text-white px-6 py-4 rounded-full text-md uppercase transition-all">
                            {{ $programItem['price'] > 0 ? 'Proceed to Payment' : 'Submit Registration' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
