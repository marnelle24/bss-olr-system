@section('title', 'Event Programme | SOL Online Registration')
<x-app-layout>
    <h4 class="text-2xl font-bold text-black dark:text-white mb-8 capitalize">Event Management</h4>

    <div>
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-5 lg:grid-cols-5 gap-6">
            @foreach ( [1,2,3,4,5,6,7,8,9,10] as $event)
                <div class="relative bg-white hover:bg-slate-100 p-8 rounded-sm shadow-sm hover:-translate-y-0.5 duration-500">
                    Event {{$event}}
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
