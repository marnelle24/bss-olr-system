<div>
    <button 
        wire:click="openModal" 
        class="shadow hover:-translate-y-0.5 dark:bg-slate-700 bg-orange-700 hover:bg-orange-600 dark:hover:bg-orange-600 duration-300 text-white py-3 px-4 rounded">
      Promo Codes
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
        class="fixed right-0 top-0 z-[99999] flex items-center justify-center"
        style="display: none;"
    >
        <!-- Modal background -->
        <div class="fixed inset-0 bg-black opacity-50"></div>

        <!-- Modal content -->
        <div class="bg-white h-screen overflow-y-auto rounded-none shadow-lg z-10">
            <div class="flex justify-between items-center p-6 border-b bg-meta-4">
                <p class="text-slate-100 mr-10 uppercase text-lg">Manage Promo Codes</p>
                <button wire:click="closeModal" class="text-slate-500 hover:-translate-y-1 duration-300 drop-shadow text-2xl">
                    &#10005;
                </button>
            </div>
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <p class="text-lg font-bold text-slate-700">Promo Codes</p>
                    {{-- Add Promo Code Modal --}}
                    <livewire:modal.add-update-promocode-modal :programCode="$programCode" :buttonLabel="'Add'" />
                </div>
                @if(count($promoCodes) > 0)
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="p-3 text-left text-xs font-bold text-slate-900 uppercase tracking-wider">
                                    Code
                                </th>
                                <th scope="col" class="p-3 text-left text-xs font-bold text-slate-900 uppercase tracking-wider">
                                    Duration
                                </th>
                                <th scope="col" class="p-3 text-left text-xs font-bold text-slate-900 uppercase tracking-wider">
                                    Price
                                </th>
                                <th scope="col" class="p-3 text-left text-xs font-bold text-slate-900 uppercase tracking-wider">
                                    Uses
                                </th>
                                <th scope="col" class="p-3 text-left text-xs font-bold text-slate-900 uppercase tracking-wider">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($promoCodes as $key => $promo)
                            <tr class="hover:bg-slate-50 duration-300">
                                <td class="px-3 py-2">
                                    <div class="text-md text-slate-500 w-[80px] uppercase font-bold">{{ $promo->promocode }}</div>
                                    <p>
                                        <em wire:click="editPromocode({{ $promo }})" class="text-xs text-blue-500 drop-shadow hover:text-blue-600 cursor-pointer hover:underline">Edit</em>
                                        <span class="text-xs">|</span> 
                                        <em wire:click="deletePromocode({{ $promo->id }})" wire:confirm="Are you sure you want to delete this promotion?" class="text-xs text-red-500 drop-shadow hover:text-red-600 cursor-pointer hover:underline">Delete</em>
                                    </p>
                                </td>
                                <td class="px-3 py-2">
                                    <div class="text-sm text-slate-500">
                                        <p class="mb-1 font-bold text-slate-500">
                                            {{ \Carbon\Carbon::parse($promo->startDate)->diffForHumans(\Carbon\Carbon::parse($promo->endDate), true) }}
                                        </p>
                                        <p class="italic text-xs">
                                            ({{ \Carbon\Carbon::parse($promo->startDate)->format('M j') .'-'. \Carbon\Carbon::parse($promo->endDate)->format('M j, Y') }})
                                        </p>
                                    </div>
                                </td>
                                <td class="px-3 py-2">
                                    <div class="text-sm text-slate-500">{{ 'SGD '.number_format($promo->price, 2) }}</div>
                                </td>
                                <td class="px-3 py-2">
                                    <div class="text-sm text-slate-500">{{ $promo->usedCount.'/'.$promo->maxUses }}</div>
                                </td>
                                <td class="px-3 py-2">
                                    <div class="tex2-sm text-slate-500">
                                        <livewire:toggle-boolean-checkbox 
                                            :model="$promo"
                                            field="isActive"
                                            :value="$promo->isActive"
                                            :key="$key" 
                                        />
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-md italic text-slate-400">No Promo Codes found</p>
                @endif
            </div>
        </div>
    </div>

</div>
