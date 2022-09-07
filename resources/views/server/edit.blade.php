<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-tkd-blue-900 mb-10">Edit {{ $server->name }}</h1>
            <livewire:server-edit :server="$server"/>
        </div>
    </div>
</x-app-layout>
