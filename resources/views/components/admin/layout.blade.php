<x-layout>
    <div class="md:flex block">
        <x-sidebar />
        <main class="flex-grow">{{ $slot }}</main>
    </div>
</x-layout>