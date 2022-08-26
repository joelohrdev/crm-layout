<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10">
                <h1 class="text-4xl font-bold text-tkd-blue-900">{{ $client->name }}</h1>
                <a
                    href="{{ route('client.edit', $client) }}"
                    class="text-gray-400 text-sm underline"
                >
                    Edit
                </a>
            </div>
            <livewire:client-show :client="$client"/>
        </div>
    </div>
</x-app-layout>
