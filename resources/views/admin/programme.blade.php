@section('title', 'Category | SOL Online Registration')
<x-app-layout>
    <h4 class="text-2xl font-bold text-black dark:text-white mb-8">Programme Management</h4>
    <div class="flex lg:flex-row md:flex-row sm:flex-col flex-col gap-4">
        <div class="lg:w-3/4 md:w-3/4 sm:w-full w-full">
            @livewire('Admin.Programme.show')
        </div>
        <div class="lg:w-1/4 md:w-1/4 sm:w-full w-full">
            @livewire('Admin.Programme.form')
        </div>
    </div>
</x-app-layout>
