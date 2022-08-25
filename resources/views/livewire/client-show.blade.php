<div class="space-y-20">
    <div class="flex justify-between border-b border-gray-200 pb-10 text-sm">
        <div>
            {{ $client->address }}<br />
            {{ $client->city }}@if($client->city && $client->state),@endif {{ $client->state }} {{ $client->postal_code }}
        </div>
        <div class="text-right">
            {{ $client->phone_number }}<br />
            {{ $client->email_address }}
        </div>
    </div>
    <div class="grid grid-cols-1 gap-16 lg:grid-flow-col-dense lg:grid-cols-3">
       <div class="lg:col-span-1 bg-gray-50 p-5">
           <div class="space-y-10">
               <div>
                   <h2 class="text-xl font-semibold text-tkd-blue-800">Servers</h2>
                   <ul class="divide-y divide-gray-200">
                       @foreach($client->servers as $server)
                           <li class="py-4">
                               <a target="_blank" href="http://{{ $server->ip_address }}:2086">
                                   {{ $server->name }}
                               </a>
                           </li>
                       @endforeach
                   </ul>
               </div>
               <div>
                   <h2 class="text-xl font-semibold text-tkd-blue-800">Domains</h2>
                   @foreach($client->domains as $domain)
                       <a target="_blank" href="{{ $domain->domain }}">{{ $domain->domain }}</a>
                   @endforeach
               </div>
           </div>
       </div>
        <div class="lg:col-span-2 bg-gray-50 p-5">
            <h2 class="text-xl font-semibold text-tkd-blue-800 mb-5">Contacts</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach($client->contacts as $contact)
                    <div class="bg-gray-100 p-5">
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
