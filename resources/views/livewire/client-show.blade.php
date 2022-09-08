<div class="space-y-20">
    <div class="flex justify-between border-b border-gray-200 pb-10 text-sm">
        <div>
            {{ $client->address }}<br />
            {{ $client->city }}@if($client->city && $client->state),@endif {{ $client->state }} {{ $client->postal_code }}
        </div>
        <div class="text-right">
            {{ preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1-$2-$3', $client->phone_number)  }}
            <br />
            {{ $client->email_address }}
        </div>
    </div>
    <div class="grid grid-cols-1 gap-16 lg:grid-flow-col-dense lg:grid-cols-3">
       <div class="lg:col-span-1">
           <div class="space-y-5">
               @if($servers->count() > 0)
                   <div class="bg-white p-5 rounded-lg shadow">
                       <h2 class="text-xl font-semibold text-tkd-blue-800">Servers</h2>
                       <ul class="divide-y divide-gray-200">
                           @foreach($servers as $server)
                               <li class="py-4">
                                   <a class="w-full text-sm flex justify-between items-end" target="_blank" href="https://{{ $server->ip_address }}:2086">
                                       {{ $server->name }} <span class="text-gray-400">{{ $server->ip_address }}</span>
                                   </a>
                               </li>
                           @endforeach
                       </ul>
                   </div>
               @endif
               @if($domains->count() > 0)
                   <div class="bg-white p-5 rounded-lg shadow">
                       <h2 class="text-xl font-semibold text-tkd-blue-800">Domains</h2>
                       @foreach($domains as $domain)
                           <a class="text-sm" target="_blank" href="{{ $domain->url }}">{{ $domain->name }}</a>
                       @endforeach
                   </div>
               @endif
           </div>
       </div>
        <div class="lg:col-span-2">
            <h2 class="text-xl font-semibold text-tkd-blue-800 mb-5">Contacts</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach($client->contacts as $contact)
                    <div class="bg-white hover:bg-gray-50 transition shadow rounded-lg p-5 text-sm">
                        {{ $contact->first_name }} {{ $contact->last_name }}<br />
                        <span class="text-sm text-gray-400">{{ $contact->position }}</span><br /><br />
                        {{ preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1-$2-$3',$contact->phone_number) }} @if($contact->extension)ext:{{ $contact->extension }}@endif<br />
                        <a class="hover:underline transition" href="mailto:{{ $contact->email_address }}">{{ $contact->email_address }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
