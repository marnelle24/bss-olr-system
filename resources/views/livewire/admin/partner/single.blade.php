<div>
    <form wire:submit="submit">
        <div class="flex gap-4">
            <div class="w-3/4">
                <div class="rounded-none bg-white shadow-sm">
                    <div class="px-7 py-4 border-b border-stroke dark:border-slate-400 bg-white dark:bg-slate-700">
                        <h3 class="font-bold text-lg uppercase text-black dark:text-white">
                            Partner Information
                        </h3>
                    </div>

                    <div class="p-8 bg-white dark:bg-slate-700">
                        <div class="flex gap-5 lg:flex-row">
                            <div class="w-full sm:w-1/2">
                                <label class="mb-1 block text-sm font-medium text-black dark:text-white" for="fullName">Name</label>
                                <div class="relative">
                                    <input
                                        class="w-full rounded-none border border-zinc-300 dark:border-zinc-200 bg-white py-3 pr-4.5 font-medium text-black dark:bg-zinc-50 dark:text-meta-4 focus:ring-0 focus:border-zinc-400"
                                        type="text" wire:model="partner.name" placeholder="Name" />
                                    @error('partner.name')
                                        <em class="text-danger text-xs">{{ $message }}</em>
                                    @enderror
                                </div>
                            </div>

                            <div class="w-full sm:w-1/2">
                                <label class="mb-1 block text-sm font-medium text-black dark:text-white" for="phoneNumber">Slug</label>
                                <div class="flex items-center relative">
                                    <span class="text-[25px] text-zinc-500 absolute left-2 opacity-70">/</span>
                                    <input
                                        class="w-full rounded-none border border-zinc-300 dark:border-zinc-200 bg-white px-4.5 py-3 font-thin text-neutral-500 dark:text-neutral-500 dark:bg-zinc-50  focus:ring-0 focus:border-zinc-400"
                                        type="text" wire:model="partner.slug" />
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <label class="mb-1 block text-sm font-medium text-black dark:text-white" for="Username">BIO</label>
                            <textarea wire:model="partner.bio" class="w-full rounded-none border border-zinc-300 dark:border-zinc-200 bg-white py-3 pr-4.5 font-medium text-black dark:bg-zinc-50 dark:text-meta-4 focus:ring-0 focus:border-zinc-400"
                                rows="6" placeholder="Write your bio here"></textarea>
                        </div>

                        <div class="mt-5 flex items-center gap-4">
                            <div class="xl:w-1/2 w-full relative">
                                <svg class="h-5 w-5 stroke-slate-600 absolute top-4 left-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier"> 
                                        <path d="M12,2a8,8,0,0,0-8,8v1.9A2.92,2.92,0,0,0,3,14a2.88,2.88,0,0,0,1.94,2.61C6.24,19.72,8.85,22,12,22h3V20H12c-2.26,0-4.31-1.7-5.34-4.39l-.21-.55L5.86,15A1,1,0,0,1,5,14a1,1,0,0,1,.5-.86l.5-.29V11a1,1,0,0,1,1-1H17a1,1,0,0,1,1,1v5H13.91a1.5,1.5,0,1,0-1.52,2H20a2,2,0,0,0,2-2V14a2,2,0,0,0-2-2V10A8,8,0,0,0,12,2Z"></path> 
                                    </g>
                                </svg>
                                <input 
                                    class="pl-8 w-full rounded-none border border-zinc-300 dark:border-zinc-200 bg-white py-3 font-medium text-black dark:bg-zinc-50 dark:text-meta-4 focus:ring-0 focus:border-zinc-400"
                                    type="text" wire:model="partner.contactPerson" placeholder="Person In-charge" 
                                />
                                @error('partner.contactPerson')
                                    <em class="text-danger text-xs">{{ $message }}</em>
                                @enderror
                            </div>
                            <div class="xl:w-1/2 w-full relative">
                                <svg class="h-5 w-5 stroke-boxdark absolute top-4 left-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M22,3H2A1,1,0,0,0,1,4V20a1,1,0,0,0,1,1H22a1,1,0,0,0,1-1V4A1,1,0,0,0,22,3ZM21,19H3V9.477l8.628,3.452a1.01,1.01,0,0,0,.744,0L21,9.477ZM21,7.323l-9,3.6-9-3.6V5H21Z"></path>
                                    </g>
                                </svg>
                                <input
                                    class="pl-8 w-full rounded-none border border-zinc-300 dark:border-zinc-200 bg-white py-3 font-medium text-black dark:bg-zinc-50 dark:text-meta-4 focus:ring-0 focus:border-zinc-400"
                                    type="email" wire:model="partner.contactEmail" placeholder="Official Email"/>
                                @error('partner.contactEmail')
                                    <em class="text-danger text-xs">{{ $message }}</em>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-5 flex items-center gap-4">
                            <div class="xl:w-1/2 w-full relative">
                                <svg class="h-5 w-5 stroke-boxdark absolute top-4 left-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M1.277,8.858C2.606,14.138,9.863,21.4,15.142,22.723a8.938,8.938,0,0,0,2.18.274,8.54,8.54,0,0,0,4.006-1,3.11,3.11,0,0,0,.764-4.951h0L20.006,14.96a3.111,3.111,0,0,0-3.444-.651,4.859,4.859,0,0,0-1.471.987c-.178.177-.506.205-.977.077A9.981,9.981,0,0,1,8.626,9.886c-.126-.471-.1-.8.078-.977a4.864,4.864,0,0,0,.988-1.473,3.112,3.112,0,0,0-.651-3.442L6.955,1.909A3.065,3.065,0,0,0,4.3,1.035,3.1,3.1,0,0,0,2,2.672,8.58,8.58,0,0,0,1.277,8.858ZM3.773,3.6A1.115,1.115,0,0,1,4.6,3.013,1.044,1.044,0,0,1,4.767,3a1.088,1.088,0,0,1,.774.323L7.626,5.408a1.1,1.1,0,0,1,.239,1.213A2.9,2.9,0,0,1,7.29,7.5,2.817,2.817,0,0,0,6.7,10.4c.722,2.7,4.205,6.179,6.9,6.9a2.821,2.821,0,0,0,2.907-.6,2.906,2.906,0,0,1,.874-.576,1.1,1.1,0,0,1,1.214.239l2.085,2.085a1.089,1.089,0,0,1,.31.942,1.114,1.114,0,0,1-.591.826,6.517,6.517,0,0,1-4.766.556C11.089,19.641,4.36,12.912,3.216,8.37A6.53,6.53,0,0,1,3.773,3.6Z"></path>
                                    </g>
                                </svg>
                                <input class="pl-8 w-full rounded-none border border-zinc-300 dark:border-zinc-200 bg-white py-3 font-medium text-black dark:bg-zinc-50 dark:text-meta-4 focus:ring-0 focus:border-zinc-400"
                                    type="text" wire:model="partner.contactNumber" placeholder="+65-343-343" />
                                @error('partner.contactNumber')
                                    <em class="text-danger text-xs">{{ $message }}</em>
                                @enderror
                            </div>
                            <div class="xl:w-1/2 w-full relative">
                                <svg class="h-5 w-5 stroke-boxdark absolute top-4 left-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width=""></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier"> 
                                        <path d="M16.4437 2.00021C14.9719 1.98733 13.5552 2.55719 12.4986 3.58488L12.4883 3.59504L11.6962 4.38801C11.3059 4.77876 11.3063 5.41192 11.697 5.80222C12.0878 6.19252 12.721 6.19216 13.1113 5.80141L13.8979 5.01386C14.5777 4.35511 15.4855 3.99191 16.4262 4.00014C17.3692 4.00839 18.2727 4.38923 18.9416 5.06286C19.6108 5.73671 19.9916 6.64971 19.9998 7.6056C20.008 8.55874 19.6452 9.47581 18.9912 10.1607L16.2346 12.9367C15.8688 13.3052 15.429 13.5897 14.9453 13.7714C14.4616 13.9531 13.945 14.0279 13.4304 13.9907C12.9159 13.9536 12.4149 13.8055 11.9616 13.5561C11.5083 13.3067 11.1129 12.9617 10.8027 12.5441C10.4734 12.1007 9.847 12.0083 9.40364 12.3376C8.96029 12.6669 8.86785 13.2933 9.19718 13.7367C9.67803 14.384 10.2919 14.9202 10.9975 15.3084C11.7032 15.6966 12.4838 15.9277 13.2866 15.9856C14.0893 16.0435 14.8949 15.9268 15.6486 15.6437C16.4022 15.3606 17.0861 14.9177 17.654 14.3457L20.4168 11.5635L20.429 11.551C21.4491 10.4874 22.0125 9.0642 21.9997 7.58834C21.987 6.11247 21.3992 4.69931 20.3607 3.65359C19.3221 2.60764 17.9155 2.01309 16.4437 2.00021Z" fill="#000000"></path> 
                                        <path d="M10.7134 8.01444C9.91064 7.95655 9.10506 8.0732 8.35137 8.35632C7.59775 8.63941 6.91382 9.08232 6.34597 9.65431L3.5831 12.4365L3.57097 12.449C2.5508 13.5126 1.98748 14.9358 2.00021 16.4117C2.01295 17.8875 2.60076 19.3007 3.6392 20.3464C4.67787 21.3924 6.08439 21.9869 7.55623 21.9998C9.02807 22.0127 10.4447 21.4428 11.5014 20.4151L11.5137 20.4029L12.3012 19.6099C12.6903 19.218 12.6881 18.5849 12.2962 18.1957C11.9043 17.8066 11.2712 17.8088 10.882 18.2007L10.1011 18.9871C9.42133 19.6452 8.51402 20.0081 7.57373 19.9999C6.63074 19.9916 5.72728 19.6108 5.05834 18.9371C4.38918 18.2633 4.00839 17.3503 4.00014 16.3944C3.99191 15.4412 4.35479 14.5242 5.00874 13.8393L7.76537 11.0633C8.13118 10.6948 8.57097 10.4103 9.05467 10.2286C9.53836 10.0469 10.0549 9.97215 10.5695 10.0093C11.0841 10.0464 11.585 10.1945 12.0383 10.4439C12.4917 10.6933 12.887 11.0383 13.1972 11.4559C13.5266 11.8993 14.1529 11.9917 14.5963 11.6624C15.0397 11.3331 15.1321 10.7067 14.8028 10.2633C14.3219 9.61599 13.708 9.07982 13.0024 8.69161C12.2968 8.30338 11.5161 8.07233 10.7134 8.01444Z" fill="#000000"></path> 
                                    </g>
                                </svg>
                                <input class="pl-8 w-full rounded-none border border-zinc-300 dark:border-zinc-200 bg-white py-3 font-medium text-black dark:bg-zinc-50 dark:text-meta-4 focus:ring-0 focus:border-zinc-400"
                                    type="text" wire:model="partner.websiteUrl" placeholder="https://test.org.sg"/>
                                @error('partner.websiteUrl')
                                    <em class="text-danger text-xs">{{ $message }}</em>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end gap-4 mt-8">
                            @if ( !isset($partner->id) )
                                <button 
                                    wire:click="resetForm" 
                                    type="reset"
                                    class="
                                        flex 
                                        justify-center 
                                        rounded-none 
                                        border 
                                        px-6 
                                        py-2 
                                        font-medium 
                                        text-black 
                                        border-zinc-400 
                                        hover:bg-zinc-300 
                                        bg-zinc-100 
                                        hover:-translate-y-0.5 
                                        dark:text-slate-100
                                        dark:bg-transparent
                                        dark:hover:bg-zinc-500 
                                        duration-300 
                                        shadow-md"
                                >
                                    Reset
                                </button>
                            @else
                                <a href="{{ route('admin.partner.new') }}" 
                                    class="flex justify-center rounded-none bg-slate-900 px-8 py-2 font-medium text-gray hover:bg-slate-800 hover:-translate-y-0.5 transform duration-500 shadow-md">
                                    Create New
                                </a>
                            @endif
                            <button 
                                type="submit"
                                wire:loading.attr="disabled" 
                                class="flex 
                                    justify-center 
                                    rounded-none 
                                    px-8 
                                    py-2 
                                    bg-slate-400 
                                    hover:bg-slate-600 
                                    border-slate-400 
                                    text-slate-800 
                                    hover:text-slate-200
                                    font-medium 
                                    hover:-translate-y-0.5 
                                    border 
                                    dark:bg-slate-800 
                                    dark:hover:bg-slate-700 
                                    dark:border-slate-400
                                    dark:text-slate-300 
                                    duration-300 
                                    shadow-md"
                            >
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/4 flex flex-col gap-4">
                <div class="rounded-none bg-white shadow-sm">
                    <div class="px-7 py-4 border-b border-stroke dark:border-slate-400 bg-white dark:bg-slate-700">
                        <h3 class="font-medium text-black dark:text-white">
                            Additional Settings
                        </h3>
                    </div>
                    <div class="p-8 flex flex-col gap-4 bg-white dark:bg-slate-700">
                        <div class="flex items-center gap-4">
                            <input type="checkbox" id="toggle1" wire:model="partner.pstatus" {{$partner->pstatus ? 'checked' : ''}} />
                            <label for="toggle1" class="flex cursor-pointer select-none items-center text-black dark:text-white">Enable</label>
                        </div>

                        <div class="flex items-center gap-4">
                            <input type="checkbox" id="toggle2" wire:model="partner.publishabled" {{$partner->publishabled ? 'checked' : ''}} />
                            <label for="toggle2" class="flex cursor-pointer select-none items-center text-black dark:text-white">Publishable</label>
                        </div>

                        <div class="flex items-center gap-4">
                            <input type="checkbox" id="toggle3" wire:model="partner.searcheable" {{$partner->searcheable ? 'checked' : ''}} />
                            <label for="toggle3" class="flex cursor-pointer select-none items-center text-black dark:text-white">Searcheable</label>
                        </div>

                    </div>
                </div>
                <div class="rounded-none bg-white shadow-sm">
                    <div class="px-7 py-4 border-b border-stroke dark:border-slate-400 bg-white dark:bg-slate-700">
                        <h3 class="font-medium text-black dark:text-white">
                            Status:
                        </h3>
                    </div>
                    <div class="p-8 flex flex-col gap-4 border-b border-stroke dark:border-slate-400 bg-white dark:bg-slate-700">
                        @foreach ( $partner->_isApproved as $key => $approve_status )
                            <div wire:key="{{$key}}" class="flex items-center">
                                <input id="default-radio-{{$key}}" type="radio" wire:model="partner.isApproved" value="{{ $approve_status }}" class="w-4 h-4-none text-blue-600 zinc-300te-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus-none:ring-2 dark:bgzinc-300-700 dark:border-gray-600">
                                <label for="default-radio-{{$key}}" class="ms-2 text-sm font-medium text-black dark:text-white capitalize">{{ $approve_status }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                 <div class="rounded-none bg-white shadow-sm">
                    <div class="px-7 py-4 border-b border-stroke dark:border-slate-400 bg-white dark:bg-slate-700">
                        <h3 class="font-medium text-black dark:text-white">Requested By:</h3>
                    </div>
                    <div class="p-8 flex flex-col gap-4 bg-white dark:bg-slate-700">
                        <p class="text-black dark:text-white">{{ $partner->requestedBy ? $partner->requestedBy : auth()->user()->firstname .' '. auth()->user()->lastname }}</p>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- {{ dump($partnerSlug) }} --}}
    {{-- {{ dump($partner) }} --}}
</div>