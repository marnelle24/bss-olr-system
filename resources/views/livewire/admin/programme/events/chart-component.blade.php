<div class="flex flex-col gap-5 mb-8">
    <div class="w-full">
        <p class="text-xl font-bold text-slate-800 dark:text-white capitalize mb-2">
            Analytics & Reports
        </p>
        <div class="flex xl:flex-row flex-col gap-4">
            <div class="w-full h-[400px] flex justify-center items-center rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-slate-100">
                <div class="w-full h-[360px]">
                    <livewire:livewire-line-chart :line-chart-model="$registrantLineChart" />
                </div>
                
                {{-- <p class="text-center opacity-30 text-xl">Graph & Chart of the event performance here</p> --}}
            </div>
            <div class="w-full xl:w-1/3 h-[400px] flex justify-center items-center rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-slate-100">
                <div class="w-full h-[360px]">
                    <livewire:livewire-pie-chart :pie-chart-model="$paymentTypeReportPieChart" />
                </div>
            </div>
        </div>
    </div>
</div>
