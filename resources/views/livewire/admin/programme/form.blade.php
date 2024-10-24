<div>
    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
        <div class="border-b border-stroke px-5 py-4 dark:border-strokedark">
            <h3 class="font-medium text-black dark:text-white">
                Create New Programme
            </h3>
        </div>
        <div class="p-5">
            <form wire:submit="save">
                <div class="flex gap-5 flex-col">
                    <div class="w-full">
                        <label class="mb-1 block text-sm font-medium text-black dark:text-white">Name</label>
                        <div class="relative">
                            <input
                                class="w-full rounded-none border border-stroke bg-gray py-3 pr-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-2 dark:text-meta-4 dark:focus:border-primary"
                                type="text" wire:model="form.name" placeholder="Name" />
                            @error('name')
                                <em class="text-danger text-xs">{{ $message }}</em>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full">
                        <label class="mb-1 block text-sm font-medium text-black dark:text-white">Slug</label>
                        <div class="relative">
                            <input
                                class="w-full rounded-none border border-stroke bg-gray py-3 pr-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-2 dark:text-meta-4 dark:focus:border-primary"
                                type="text" wire:model="form.slug" placeholder="Customize Slug" />
                            @error('slug')
                                <em class="text-danger text-xs">{{ $message }}</em>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" id="toggle1" wire:model="form.status" {{ ($form['status']) ? 'checked' : '' }} />
                        <label for="toggle1" class="flex cursor-pointer select-none items-center">Activate</label>
                    </div>

                    <div class="flex justify-end gap-4">
                        <button class="flex justify-center dark:bg-slate-400 dark:text-slate-900 rounded-none border border-stroke px-6 py-2 font-medium text-black hover:shadow-1 dark:border-strokedark" type="reset">
                            Cancel
                        </button>
                        <button class="flex justify-center rounded-none bg-black dark:bg-slate-100 dark:text-slate-900 px-6 py-2 font-medium text-gray hover:bg-opacity-80" type="submit">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
