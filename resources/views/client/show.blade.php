<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-tkd-blue-900 mb-10">{{ $client->name }}</h1>
            <livewire:client-show :client="$client"/>
        </div>
    </div>
</x-app-layout>
