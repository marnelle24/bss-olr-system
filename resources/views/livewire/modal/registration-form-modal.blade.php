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

                <div class="space-y-6">
                    <div class="relative overflow-hidden">
                        <div class="transition-transform duration-500 ease-in-out" style="transform: translateX(-{{ ($step - 1) * 100 }}%)">
                            <div class="flex">
                                {{-- Step 1: Registration --}}
                                <div class="w-full flex-shrink-0">

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

                                <div class="w-full flex-shrink-0">2</div>
                                <div class="w-full flex-shrink-0">3</div>
                                <div class="w-full flex-shrink-0">4</div>
                            </div>
                        </div>
                    </div>
                </div>

                <br />
                <br />
                <br />
                <br />
                <br />
                {{-- Forms Component --}}
                <div class="space-y-6">
                    <div class="relative overflow-hidden">
                        <div class="transition-transform duration-500 ease-in-out" style="transform: translateX(-{{ ($step - 1) * 100 }}%)">
                            <div class="flex">
                                {{-- Step 1: Registration --}}
                                <div class="w-full flex-shrink-0">
                                    @if(isset($loadedComponents[1]))
                                        <livewire:guest.registration-form 
                                            :programItem="json_encode($programItem)" 
                                            key="registration-form-modal{{rand(1, 100)}}" 
                                        />
                                    @endif
                                </div>
                                
                                {{-- Step 2: Additional Information --}}
                                <div class="w-full flex-shrink-0">
                                    @if(isset($loadedComponents[2]))
                                        <livewire:guest.additional-fields-form 
                                            :programItem="json_encode($programItem)" 
                                            key="additional-fields-form-modal{{rand(1, 100)}}" 
                                        />
                                    @endif
                                </div>

                                {{-- Step 3: Promo Code --}}
                                <div class="w-full flex-shrink-0">
                                    @if(isset($loadedComponents[3]))
                                        <livewire:guest.promo-code-form 
                                            :programItem="json_encode($programItem)" 
                                            key="promo-code-form-modal{{rand(1, 100)}}" 
                                        />
                                    @endif
                                </div>

                                {{-- Step 4: Review --}}
                                <div class="w-full flex-shrink-0">
                                    @if(isset($loadedComponents[4]))
                                        <livewire:guest.review-details-checkout 
                                            :programItem="json_encode($programItem)" 
                                            key="review-details-checkout-modal{{rand(1, 100)}}" 
                                        />
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>










                <br />
                <p wire:click="closeModal" class="text-teal-700 cursor-pointer hover:text-teal-600 duration-300 hover:-translate-y-0.5">Cancel</p>
            </div>
        </div>
    </div>
</div>
