@section('title', 'Settings | SOL Online Registration')
<x-app-layout>
    <h4 class="text-2xl font-bold text-black dark:text-white mb-8">Settings</h4>
    <div class="flex lg:flex-row md:flex-row sm:flex-col flex-col gap-4">
        <div class="xl:w-3/4 w-full">
            <div>
                <div class="my-2">
                    <h3 class="font-bold text-slate-700 dark:text-slate-200 text-2xl">Manage Roles & Permissions</h3>
                    <p class="font-thin text-slate-600 dark:text-slate-200 text-md">
                        Manage the overall user roles and permissions througout the system
                    </p>
                </div>
                <div class="flex xl:flex-row flex-col gap-4">
                    <div class="w-full rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                        <p class="font-semibold text-slate-700 dark:text-slate-200 text-md border-b dark:border-slate-400 border-slate-400 px-4 py-5">User Roles</p>
                        <ul class="">
                            @foreach ( $allRoles as $key => $role)
                                <li class="flex justify-between capitalize p-4 dark:border-slate-600 border-slate-400 hover:bg-slate-300/30 dark:hover:bg-slate-300/20 border-b">
                                    <span>{{$role}}</span>
                                    <div class="flex gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 hover:-translate-y-0.5 cursor-pointer duration-300 hover:stroke-sky-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 hover:-translate-y-0.5 cursor-pointer duration-300 hover:stroke-red-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mt-12">
                <div class="my-2">
                    <h3 class="font-bold text-slate-700 dark:text-slate-200 text-2xl">More Settings Here...</h3>
                </div>
                <div class="p-4 rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    ...<br />
                    ...<br />
                    ...<br />
                    ...<br />
                    ...<br />
                </div>
            </div>
        </div>
        <div class="xl:w-1/4 w-full">
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <p class="p-4 border-b border-slate-300 dark:border-slate-500 font-semibold text-slate-700 dark:text-slate-300 uppercase">
                    Import BSS Programmes
                </p>
                <div class="p-4 flex flex-col gap-4">
                    <p class="text-slate-500 dark:text-slate-300 text-sm">This settings sesction will import & sync the events or courses from external sources.</p>
                    @livewire('admin.programme.events.bss-import')
                </div>
            </div>
            <div class="mt-8 rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <p class="p-4 font-semibold text-slate-700 dark:text-slate-200 text-md border-b dark:border-slate-400 border-slate-400 px-4 py-5">System Permissions</p>
                <ul class="h-96 overflow-y-auto">
                    @foreach ( $allPermissions as $key => $permission)
                        <li class="flex justify-between capitalize p-4 dark:border-slate-600 border-slate-400 hover:bg-slate-300/30 dark:hover:bg-slate-300/20 border-b">
                            <span>{{$permission}}</span>
                            <div class="flex gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 hover:-translate-y-0.5 cursor-pointer duration-300 hover:stroke-sky-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 hover:-translate-y-0.5 cursor-pointer duration-300 hover:stroke-red-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
