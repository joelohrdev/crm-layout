<div class="space-y-20">
    <div class="flex justify-between border-b border-gray-200 pb-10 text-sm">
        <div>
            {{ $client->address }}<br />
            {{ $client->city }}, {{ $client->state }} {{ $client->postal_code }}
        </div>
        <div class="text-right">
            {{ $client->phone_number }}<br />
            {{ $client->email_address }}
        </div>
    </div>
    <div class="grid grid-cols-1 gap-6 sm:px-6 lg:grid-flow-col-dense lg:grid-cols-3">
       <div class="lg:col-span-1">
           @foreach($client->servers as $server)
               {{ $server->name }}
           @endforeach
       </div>
        <div class="lg:col-span-2">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach($client->contacts as $contact)
                    <div>
                        {{ $contact->first_name }} {{ $contact->last_name }}<br />
                        {{ $contact->position }}<br />
                        {{ $contact->phone_number }} ext:{{ $contact->extension }}<br />
                        {{ $contact->email_address }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
