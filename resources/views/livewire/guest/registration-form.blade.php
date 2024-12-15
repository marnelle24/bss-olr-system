<div class="flex flex-col">
    <div class="w-full flex-shrink-0">
        <div class="mb-8">
            <h1 class="lg:text-left text-center lg:text-2xl text-3xl text-slate-500 font-bold mb-1">
                Registration Details
            </h1>
            <p class="text-slate-500 lg:text-left text-center">
                Please fill in the following details to complete your registration.
            </p>
        </div>
        <form wire:submit="submit" class="space-y-6">
            <div class="flex lg:flex-row flex-col gap-2">
                <div class="flex lg:flex-row flex-col gap-2 lg:w-1/2 w-full">
                    @if(!in_array('nric', $hiddenFields))
                        <div class="lg:w-1/2 w-full">
                            <label class="mb-2.5 block font-medium text-black">NRIC # </label>
                                <input wire:model.blur="form.nric" type="text" placeholder="Last 4-digit" maxlength="4" class="w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                                @error('form.nric')
                                    <em class="text-danger text-xs">{{ $message }}</em>
                                @enderror
                        </div>
                    @endif
                    
                    @if(!in_array('title', $hiddenFields))
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
                @if(!in_array('firstName', $hiddenFields))
                    <div class="w-full lg:w-1/2">
                        <label class="mb-2.5 block font-medium text-black">First Name</label>
                        <input wire:model.blur="form.firstName" type="text" placeholder="First Name" class="w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                        @error('form.firstName')
                            <em class="text-danger text-xs">{{ $message }}</em>
                        @enderror
                    </div>
                @endif
            
                @if(!in_array('lastName', $hiddenFields))
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
                @if(!in_array('email', $hiddenFields))
                    <div class="w-full lg:w-1/2">
                        <label class="mb-2.5 block font-medium text-black">Email Address</label>
                        <input wire:model.blur="form.email" type="text" placeholder="Email Address" class="w-full rounded-none border border-dark bg-white py-2 pl-2 pr-10 focus:border-default focus:ring-0 focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-default" />
                        @error('form.email')
                            <em class="text-danger text-xs">{{ $message }}</em>
                        @enderror
                    </div>
                @endif
            </div>
            <div>
                @if(!in_array('address', $hiddenFields))
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
            @dump($form->all())
            <br />
            <div class="flex justify-end">
                <button type="submit" class="bg-teal-600 hover:bg-teal-700 duration-300 hover:-translate-y-0.5 text-white py-2.5 px-3.5 rounded-none flex gap-1 items-center justify-center">
                    Next
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>