<div>
    <button 
        wire:click="openModal" 
        class="shadow hover:-translate-y-0.5 dark:bg-slate-700 bg-meta-6 hover:bg-meta-6 dark:hover:bg-meta-6 duration-300 text-white py-3 px-4 rounded">
      Price Promotions
    </button>

    <div 
        x-data="{ open: @entangle('showModal') }" 
        x-show="open" 
        x-transition:enter="transform transition ease-in-out duration-300" 
        x-transition:enter-start="translate-x-full" 
        x-transition:enter-end="translate-x-0" 
        x-transition:leave="transform transition ease-in-out duration-300" 
        x-transition:leave-start="translate-x-0" 
        x-transition:leave-end="translate-x-full" 
        class="fixed right-0 top-0 z-[999] flex items-center justify-center"
        style="display: none;"
    >
        <!-- Modal background -->
        <div class="fixed inset-0 bg-black opacity-50"></div>

        <!-- Modal content -->
        <div class="bg-white h-screen overflow-y-auto rounded-none shadow-lg z-10">
            <div class="flex justify-between items-center p-6 border-b">
                <p class="text-slate-700 mr-10 uppercase text-lg">Manage Promotions</p>
                <button wire:click="closeModal" class="text-slate-500 hover:-translate-y-1 duration-300 drop-shadow text-2xl">
                    &#10005;
                </button>
            </div>
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <p class="text-lg font-bold text-slate-700">Promotions</p>
                    {{-- Add Promotion Modal --}}
                    <livewire:modal.add-update-promotion-modal :programCode="$programCode" />
                </div>
                @if(count($promotions) > 0)
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="p-3 text-left text-xs font-bold text-slate-900 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="p-3 text-left text-xs font-bold text-slate-900 uppercase tracking-wider">
                                    Description
                                </th>
                                <th scope="col" class="p-3 text-left text-xs font-bold text-slate-900 uppercase tracking-wider">
                                    Duration
                                </th>
                                <th scope="col" class="p-3 text-left text-xs font-bold text-slate-900 uppercase tracking-wider">
                                    Price
                                </th>
                                <th scope="col" class="p-3 text-left text-xs font-bold text-slate-900 uppercase tracking-wider">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($promotions as $key => $promotion)
                            <tr class="hover:bg-slate-50 duration-300">
                                <td class="px-3 py-2">
                                    <div class="text-sm text-slate-500 w-[80px] uppercase">{{ $promotion->title }}</div>
                                    <p>
                                        <em wire:click="editPromotion({{ $promotion }})" class="text-xs text-blue-500 drop-shadow hover:text-blue-600 cursor-pointer hover:underline">Edit</em>
                                        <span class="text-xs">|</span> 
                                        <em wire:click="deletePromotion({{ $promotion->id }})" wire:confirm="Are you sure you want to delete this promotion?" class="text-xs text-red-500 drop-shadow hover:text-red-600 cursor-pointer hover:underline">Delete</em>
                                    </p>
                                </td>
                                <td class="px-3 py-2">
                                    <div class="text-sm text-slate-500 w-[200px] truncate">{{ $promotion->description }}</div>
                                </td>
                                <td class="px-3 py-2">
                                    <div class="text-sm text-slate-500">
                                        <p class="mb-1 font-bold text-slate-500">
                                            {{ \Carbon\Carbon::parse($promotion->startDate)->diffForHumans(\Carbon\Carbon::parse($promotion->endDate), true) }}
                                        </p>
                                        <p class="italic text-xs">
                                            ({{ \Carbon\Carbon::parse($promotion->startDate)->format('M j') .'-'. \Carbon\Carbon::parse($promotion->endDate)->format('M j, Y') }})
                                        </p>
                                    </div>
                                </td>
                                <td class="px-3 py-2">
                                    <div class="text-sm text-slate-500">{{ 'SGD '.number_format($promotion->price, 2) }}</div>
                                </td>
                                <td class="px-3 py-2">
                                    <div class="tex2-sm text-slate-500">
                                        <livewire:toggle-boolean-checkbox 
                                            :model="$promotion"
                                            field="isActive"
                                            :value="$promotion->isActive"
                                            :key="$key" 
                                        />
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-md italic text-slate-400">No promotions found</p>
                @endif
            </div>
        </div>
    </div>
</div>
