<x-guest-layout>
    <div class="relative min-h-screen bg-gradient-to-b from-zinc-50 via-25% via-teal-100 to-teal-500">
        <div class="max-w-6xl mx-auto px-4 py-16">
            <x-programme.featured-carousel :programmes="$featuredEvents" />
            <br />
            <livewire:events-list wire:key="eventsList" />
        </div>

        <x-footer-public />
        
    </div>
</x-guest-layout>