<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-tkd-blue-900 mb-10">Edit {{ $contact->first_name }} {{ $contact->last_name }}</h1>
            <livewire:contact-edit :contact="$contact"/>
        </div>
    </div>
</x-app-layout>
