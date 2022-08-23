<x-app-layout>
    <div class="py-12">
        <div class="w-full sm:px-6 lg:px-8">
            <div>
                <div class="mb-10">
                    <a href="{{ route('client.create') }}" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-tkd-blue-600 hover:bg-tkd-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-tkd-blue-500">Add Client</a>
                </div>
                <x-client-grid/>
            </div>
        </div>
    </div>
</x-app-layout>
