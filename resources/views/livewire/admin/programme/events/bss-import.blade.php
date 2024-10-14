<div>
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-5 lg:grid-cols-5 gap-6">
        @foreach ( $bss_events as $event)
            <div class="relative bg-white hover:bg-slate-100 p-8 rounded-sm shadow-sm hover:-translate-y-0.5 duration-500">
                {{ __($event['title']) }}
            </div>
        @endforeach
    </div>
</div>