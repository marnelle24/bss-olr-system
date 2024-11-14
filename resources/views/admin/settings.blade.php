@section('title', 'Settings | SOL Online Registration')
<x-app-layout>
    <h4 class="text-2xl font-bold text-black dark:text-white mb-8">Settings</h4>
    <div class="flex lg:flex-row md:flex-row sm:flex-col flex-col gap-4">
        <div class="xl:w-3/4 w-full">
            <div class="p-4 rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                More Settings Here...
            </div>
        </div>
        <div class="xl:w-1/4 w-full">
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <p class="p-4 border-b border-slate-300 dark:border-slate-500 font-semibold text-slate-700 dark:text-slate-300 uppercase">
                    Import BSS Programmes
                </p>
                <div class="p-4 flex flex-col gap-4">
                    <p class="text-slate-500 text-sm">This settings sesction will import & sync the events or courses from external sources.</p>
                    @livewire('admin.programme.events.bss-import')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
