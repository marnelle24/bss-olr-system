<div>
    {{-- The whole world belongs to you. --}}
    
    <div class="mb-4">
        <h1 class="lg:text-left text-center lg:text-2xl text-3xl text-slate-500 font-bold mb-2">
            Review Registration & Proceed to Payment
        </h1>
        <p class="text-slate-500 lg:text-left text-center">Please review and submit your registration details.</p>
    </div>
    <div class="space-y-6">
        {{-- @dump($programItem) --}}
        {{-- <table class="w-full">
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
        </table> --}}
        {{-- <br /> --}}
        <div class="mt-4 flex flex-col gap-2">
            <label class="inline-flex items-center">
                <input type="checkbox" name="privacy_policy" class="form-checkbox h-5 w-5 text-slate-600 focus:ring-0" required />
                <span class="ml-2 text-sm text-gray-700">I accept the <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a></span>
            </label>
            <label class="inline-flex items-start">
                <input type="checkbox" name="privacy_policy" class="form-checkbox h-5 w-5 text-slate-600 focus:ring-0" required />
                <span class="ml-2 text-sm text-gray-700">
                    By providing your contact details, you consent to our collection, use and disclosure of your personal data as described in our privacy policy on our website. We do strive to limit the amount of personal data we collect to that which is sufficient to support the intended purpose of the collection
                </span>
            </label>
        </div>
        <br />
        <br />

        {{-- @if($errors->count() > 0)
            <p class="text-center text-xs italic text-red-600">{{'Oops! something\'s missing. Kindly review the registration form.'}}</p>
        @endif --}}
        <div class="flex lg:flex-row flex-col gap-4 justify-center px-2">
            <button type="submit" class="lg:whitespace-nowrap whitespace-normal text-center text-zinc-100 drop-shadow bg-gradient-to-l from-meta-5 via-meta-3/70 to-meta-3 bg-size-200 bg-pos-0 hover:bg-pos-100 border-meta-3 duration-500 shadow-md hover:-translate-y-0.5 hover:bg-slate-600 hover:border-slate-600 hover:text-zinc-200 items-center px-6 py-4 font-semibold text-lg uppercase tracking-widest transition-all">
                Confirm & Proceed to Payment
            </button>
        </div>
    </div>
</div>

