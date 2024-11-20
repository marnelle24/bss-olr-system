<div>
    <button 
        wire:click="openModal" 
        class="w-full bg-meta-8 dark:bg-meta-8/70 hover:bg-meta-8/90 dark:hover:bg-meta-8 hover:-translate-y-0.5 text-white dark:border border-slate-400 dark:border-meta-8/60 drop-shadow px-4 py-1 text-xs font-bold rounded-md shadow hover:shadow-sm transition-all duration-300">
      Update Category
    </button>

    <!-- Modal -->
    <div 
        x-data="{ open: @entangle('showModal') }" 
        x-show="open" 
        x-transition:enter="transform transition ease-in-out duration-300" 
        x-transition:enter-start="translate-x-full" 
        x-transition:enter-end="translate-x-0" 
        x-transition:leave="transform transition ease-in-out duration-300" 
        x-transition:leave-start="translate-x-0" 
        x-transition:leave-end="translate-x-full" 
        class="fixed right-0 top-0 z-[99999] flex items-center justify-center"
        style="display: none;"
    >
        <!-- Modal background -->
        <div class="fixed inset-0 bg-black opacity-50"></div>

        <!-- Modal content -->
        <div class="bg-white h-screen overflow-y-auto rounded-none shadow-lg z-10">
            <div class="flex justify-between items-center p-6 border-b">
                <p class="text-slate-700 mr-10 uppercase text-lg">Add/Update Category</p>
                <button wire:click="closeModal" class="text-slate-500 hover:-translate-y-1 duration-300 drop-shadow text-2xl">
                    &#10005;
                </button>
            </div>
            <div class="p-6">
                @if ($allCategories)
                    <label for="category" class="text-xs text-slate-500">Category</label>
                    <select 
                        wire:model.live="selectedCategory" 
                        wire:change="updateSelectedCategory($event.target.value)"
                        id="category" 
                        class="w-full capitalize py-2 text-lg">
                        @foreach($allCategories as $key => $category)
                            <option 
                                wire:key="{{ $key }}" 
                                {{ in_array($category->id, Collect($programCategories)->pluck('id')->toArray()) ? 'disabled' : '' }}
                                value="{{$category->id}}"
                            >
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                @endif

                <br />
                <br />
                <label for="category" class="text-xs mt-8 text-slate-700">Program Categories</label>
                <div class="w-full flex flex-col gap-2 bg-zinc-100 p-4 min-h-[200px]">
                    <div class="grid grid-cols-3 gap-2">
                        @foreach($programCategories as $key => $category)
                            <p wire:key="{{ $key }}" 
                                class="capitalize inline-flex justify-between shadow items-center rounded-full bg-meta-3 transform duration-300 hover:scale-105 px-3 py-2 text-sm font-thin text-white">
                                <span>{{ $category['name'] }}</span>
                                <svg wire:click="removeCategory({{$category['id']}})" class="w-4 h-4 cursor-pointer hover:text-orange-800 ml-2 hover:font-fold transform duration-300 hover:scale-105" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </p>
                        @endforeach
                    </div>
                </div>
                <button wire:click="storeUpdatedCategories" class="bg-slate-600 hover:bg-slate-700 duration-300 hover:-translate-y-1 text-white px-4 py-2 mt-4">Save Changes</button>
            </div>
        </div>
    </div>
</div>