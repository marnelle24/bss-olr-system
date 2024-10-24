<form wire:submit="submit" class="space-y-6">
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
    <div class="flex gap-4 justify-center">
        <button type="submit" 
            class="lg:w-1/2 
            w-full
            flex 
            justify-center 
            text-zinc-300 
            drop-shadow
            bg-gradient-to-l 
            from-zinc-600 
            via-zinc-500 
            to-zinc-600 
            bg-size-200 
            bg-pos-0 
            hover:bg-pos-100
            border-meta-3
            duration-500 
            shadow-md
            hover:-translate-y-0.5 
            hover:bg-slate-600 
            hover:border-slate-600 
            hover:text-white 
            items-center 
            px-6 
            py-4 
            font-semibold 
            text-lg 
            uppercase 
            tracking-widest 
            transition-all"
        >
            Register Now
        </button>
    </div>
</form>