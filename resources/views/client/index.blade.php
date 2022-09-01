<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="mb-10 flex justify-between">
                    <h1 class="text-4xl font-bold text-tkd-blue-900">Clients</h1>
                    <a href="{{ route('client.create') }}" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-slate-600 hover:bg-slate-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500">Add Client</a>
                </div>
                <livewire:clients-index/>
            </div>
        </div>
    </div>
</x-app-layout>
