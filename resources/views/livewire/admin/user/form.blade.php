<div>
    <form wire:submit="submit">
        <div class="flex gap-4">
            <div class="w-3/4">
                <div class="rounded-none bg-white shadow-sm">
                    {{-- @dump($user_id ?? '') --}}
                    <div class="px-7 py-4 border-b border-stroke dark:border-slate-400 bg-white dark:bg-slate-700">
                        <h3 class="font-bold text-lg uppercase text-black dark:text-white">
                            {{ isset($user_id) ? 'Update User' : 'Create New User' }}
                        </h3>
                    </div>

                    <div class="p-8 flex flex-col gap-6 bg-white dark:bg-slate-700">
                        <div class="flex gap-5 lg:flex-row">
                            <div class="w-full sm:w-1/2">
                                <label class="mb-1 block text-sm font-medium text-black dark:text-white" for="fname">First Name</label>
                                <div class="relative">
                                    <input
                                        class="w-full rounded-none border border-zinc-300 dark:border-zinc-200 bg-white py-3 pr-4.5 font-medium text-black dark:bg-zinc-50 dark:text-meta-4 focus:ring-0 focus:border-zinc-400"
                                        type="text" wire:model="form.userform.firstname" placeholder="First Name" />
                                    @error('form.userform.firstname')
                                        <em class="text-danger text-xs">{{ $message }}</em>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full sm:w-1/2">
                                <label class="mb-1 block text-sm font-medium text-black dark:text-white" for="lname">Last Name</label>
                                <div class="relative">
                                    <input
                                        class="w-full rounded-none border border-zinc-300 dark:border-zinc-200 bg-white py-3 pr-4.5 font-medium text-black dark:bg-zinc-50 dark:text-meta-4 focus:ring-0 focus:border-zinc-400"
                                        type="text" wire:model="form.userform.lastname" placeholder="Last Name" />
                                    @error('form.userform.lastname')
                                        <em class="text-danger text-xs">{{ $message }}</em>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-5 lg:flex-row">
                            <div class="w-full">
                                <label class="mb-1 block text-sm font-medium text-black dark:text-white" for="lname">Email Address</label>
                                <div class="relative">
                                    <input
                                        class="w-full rounded-none border border-zinc-300 dark:border-zinc-200 bg-white py-3 pr-4.5 font-medium text-black dark:bg-zinc-50 dark:text-meta-4 focus:ring-0 focus:border-zinc-400"
                                        type="email" wire:model="form.userform.email" placeholder="Email Address" />
                                    @error('form.userform.email')
                                        <em class="text-danger text-xs">{{ $message }}</em>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded-sm bg-white shadow-sm mt-10 dark:bg-slate-700">
                    <div class="p-8">
                        <div class="flex flex-col gap-6">
                            <div class="flex gap-5 lg:flex-row">
                                <div class="w-full sm:w-1/2">
                                    <div>
                                        <label class="mb-1 block text-sm font-medium text-black dark:text-white" for="fname">Password</label>
                                        <div class="relative">
                                            <input
                                                class="w-full rounded-none border border-zinc-300 dark:border-zinc-200 bg-white py-3 pr-4.5 font-medium text-black dark:bg-zinc-50 dark:text-meta-4 focus:ring-0 focus:border-zinc-400"
                                                type="password" wire:model="form.userform.password" placeholder="Password" />
                                            @error('form.userform.password')
                                                <em class="text-danger text-xs">{{ $message }}</em>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <label class="mb-1 block text-sm font-medium text-black dark:text-white" for="lname">Confirm Password</label>
                                        <div class="relative">
                                            <input
                                                class="w-full rounded-none border border-zinc-300 dark:border-zinc-200 bg-white py-3 pr-4.5 font-medium text-black dark:bg-zinc-50 dark:text-meta-4 focus:ring-0 focus:border-zinc-400"
                                                type="password" wire:model="form.userform.password_confirmation" placeholder="Confirm Password" />
                                            @error('form.userform.password_confirmation')
                                                <em class="text-danger text-xs">{{ $message }}</em>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="w-full sm:w-1/2">
                                    <div class="mt-5">
                                        <div class="flex gap-2 items-center">
                                            <input 
                                                id="is_active"
                                                type="checkbox" 
                                                class="border border-zinc-300 dark:border-zinc-200 font-medium text-black dark:text-meta-4 focus:ring-0 focus:border-zinc-400"
                                                wire:model="form.userform.is_active" 
                                            />
                                            <label class="block text-sm font-medium text-black dark:text-white" for="is_active">Activate</label>
                                        </div>
                                        @error('form.userform.is_active')
                                            <em class="text-danger text-xs">{{ $message }}</em>
                                        @enderror
    
                                        <div class="flex gap-2 items-center mt-5">
                                            <input 
                                                id="is_admin"
                                                type="checkbox" 
                                                class="border border-zinc-300 dark:border-zinc-200 font-medium text-black dark:text-meta-4 focus:ring-0 focus:border-zinc-400"
                                                wire:model="form.userform.is_admin"
                                            />
                                            <label class="block text-sm font-medium text-black dark:text-white" for="is_admin">Set as User Admin</label>
                                        </div>
                                        @error('form.userform.is_admin')
                                            <em class="text-danger text-xs">{{ $message }}</em>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded-sm bg-white dark:bg-slate-700 shadow-sm mt-10">
                    <div class="flex justify-end gap-4 p-4">
                        <a href="{{ route('admin.users.lists') }}" 
                        class="flex justify-center rounded-none border border-zinc-400 bg-zinc-200 hover:bg-zinc-300 hover:-translate-y-0.5 shadow-sm duration-300 px-6 py-2 font-medium text-black" type="reset">
                            Cancel
                        </a>
                        <button wire:loading.attr="disabled" class="flex justify-center rounded-none bg-sky-600 px-8 py-2 font-medium text-gray hover:bg-sky-500 hover:-translate-y-0.5 duration-300">
                            Save
                        </button>
                    </div>
                </div>
            </div>
            <div class="w-1/4 flex flex-col gap-4">
                <div class="rounded-none bg-white shadow-sm">
                    <div class="px-7 py-4 border-b border-stroke dark:border-slate-400 bg-white dark:bg-slate-700">
                        <h3 class="font-medium text-black dark:text-white">
                            Assign User to Partner
                        </h3>
                    </div>
                    <div class="p-8 flex flex-col gap-4 bg-white dark:bg-slate-700">
                        @livewire('Admin.Partner.select-partner', ['userPartners' => $form->userform['selectedPartners']])
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>