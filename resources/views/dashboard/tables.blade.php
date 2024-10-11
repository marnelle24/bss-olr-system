<div class="w-full rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
    <div class="flex flex-col">
        <div class="grid grid-cols-3 rounded-sm bg-gray-2 dark:bg-meta-4 sm:grid-cols-5">
            <div class="p-2.5 xl:p-5">
                <h5 class="text-sm font-medium uppercase xsm:text-base">Program</h5>
            </div>
            <div class="p-2.5 text-start xl:p-5">
                <h5 class="text-sm font-medium uppercase xsm:text-base">Partner</h5>
            </div>
            <div class="p-2.5 text-start xl:p-5">
                <h5 class="text-sm font-medium uppercase xsm:text-base">Type</h5>
            </div>
            <div class="p-2.5 text-center xl:p-5">
                <h5 class="text-sm font-medium uppercase xsm:text-base">Total Registrants</h5>
            </div>
            <div class="hidden p-2.5 text-center sm:block xl:p-5">
                <h5 class="text-sm font-medium uppercase xsm:text-base">Total Ticket Sales</h5>
            </div>
        </div>
        @foreach ([1,2,3,4,5] as $programme)
            <div class="grid grid-cols-3 border-b border-stroke dark:border-strokedark sm:grid-cols-5">
                <div class="flex items-center gap-3 p-2.5 xl:p-5">
                    <div class="flex-shrink-0">
                        <img src="/images/user/user-01.png" alt="Brand" class="w-8" />
                    </div>
                    <p class="hidden font-medium text-black dark:text-white sm:block">D{{$programme}} Family 2024</p>
                </div>
                <div class="flex items-center justify-start p-2.5 xl:p-5">
                    <p class="font-medium text-black dark:text-white">D6 Foundation</p>
                </div>
                <div class="flex items-center justify-start p-2.5 xl:p-5">
                    <p class="font-medium text-black dark:text-white">Events</p>
                </div>
                <div class="flex items-center justify-center p-2.5 xl:p-5">
                    <p class="font-medium text-black dark:text-white">{{$programme}},000</p>
                </div>
                <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                    <p class="font-medium text-meta-3">${{$programme}}0,050</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
