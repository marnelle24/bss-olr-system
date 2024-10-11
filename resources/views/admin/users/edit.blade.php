@section('title', 'Update User | SOL Online Registration')
<x-app-layout>
    @livewire('Admin.User.Edit', ['user_id' => $user_id])
</x-app-layout>
