<div class="space-y-10">
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
{{--    @if($wooMonth)--}}
{{--        <div>--}}
{{--            <dl class="grid grid-cols-1 divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow md:grid-cols-3 md:divide-y-0 md:divide-x">--}}
{{--                <div class="px-4 py-5 sm:p-6">--}}
{{--                    <dt class="text-base font-normal text-gray-900">Sales this Month</dt>--}}
{{--                    <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">--}}
{{--                        <div class="flex items-baseline text-2xl font-semibold text-tkd-blue-700">--}}
{{--                            ${{ number_format($wooMonth[0]['total_sales'], 2, '.', ',') }}--}}
{{--                        </div>--}}
{{--                    </dd>--}}
{{--                </div>--}}

{{--                <div class="px-4 py-5 sm:p-6">--}}
{{--                    <dt class="text-base font-normal text-gray-900">Year to Date</dt>--}}
{{--                    <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">--}}
{{--                        <div class="flex items-baseline text-2xl font-semibold text-tkd-blue-700">--}}
{{--                            ${{ number_format($wooYear[0]['total_sales'], 2, '.', ',') }}--}}
{{--                        </div>--}}
{{--                    </dd>--}}
{{--                </div>--}}

{{--                <div class="px-4 py-5 sm:p-6">--}}
{{--                    <dt class="text-base font-normal text-gray-900">YTD Orders Placed</dt>--}}
{{--                    <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">--}}
{{--                        <div class="flex items-baseline text-2xl font-semibold text-tkd-blue-700">--}}
{{--                            {{ $wooYear[0]['total_orders'] }}--}}
{{--                        </div>--}}
{{--                    </dd>--}}
{{--                </div>--}}
{{--            </dl>--}}
{{--        </div>--}}
{{--    @endif--}}

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
