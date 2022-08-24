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
           <div class="space-y-10">
               <div>
                   <h2 class="text-xl font-semibold text-tkd-blue-800">Servers</h2>
                   @foreach($client->servers as $server)
                       <div>
                           <a class="flex space-x-5" target="_blank" href="http://{{ $server->ip_address }}:2086">
                               {{ $server->name }}
                               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400">
                                   <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                               </svg>
                           </a>
                       </div>
                   @endforeach
               </div>
               <div>
                   <h2 class="text-xl font-semibold text-tkd-blue-800">Domains</h2>
                   @foreach($client->domains as $domain)
                       <a target="_blank" href="{{ $domain->domain }}">{{ $domain->domain }}</a>
                   @endforeach
               </div>
           </div>
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
