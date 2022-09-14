<div>
    <div class="overflow-hidden bg-white sm:rounded-lg sm:shadow">

        <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Available Servers</h3>
        </div>

        <ul role="list" class="divide-y divide-gray-200">

            @foreach($servers as $server)
                @if($server->domains_count < 30)
                    <li>
                        <div class="block hover:bg-gray-50">
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <div class="truncate text-sm font-medium text-slate-600">{{ $server->name }}</div>
                                    <div class="ml-2 flex flex-shrink-0">
                                        <div class="truncate text-sm text-slate-600">{{ $server->domains_count }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endif
            @endforeach

        </ul>
    </div>
</div>
