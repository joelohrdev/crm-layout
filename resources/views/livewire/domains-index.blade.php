<div>
    <div class="flex justify-end">
        <div class="w-1/4">
            <div class="relative mt-1 flex items-center">
                <label class="hidden" for="search">Search</label>
                <input wire:model="search" type="search" name="search" id="search" placeholder="Search Domains" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 sm:text-sm">
            </div>
        </div>
    </div>
    <div class="-mx-4 mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Cloudflare</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Managed by Us</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Expires</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Server</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">View</span>
                </th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
            @foreach($domains as $domain)
                <tr>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-tkd-blue-900 sm:pl-6">
                        <a target="_blank" href="{{ $domain->url }}">{{ $domain->name }}</a>
                    </td>
                    <td class="hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500 sm:table-cell">
                        @if($domain->cloudflare)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        @else
                            -
                        @endif
                    </td>
                    <td class="hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500 sm:table-cell">
                        @if($domain->managed)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        @else
                            -
                        @endif
                    </td>
                    <td class="hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500 lg:table-cell">
                        {{ Carbon\Carbon::parse($domain->expires)->format('F d, Y') }}
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 hover:text-gray-700 hover:underline">
                        <a target="_blank" href="https://{{ $domain->server->ip_address }}:2086">{{ $domain->server->name }}</a>
                    </td>
                    <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                        <a href="{{ route('domain.edit', $domain) }}" class="text-slate-600 hover:text-slate-900">Edit<span class="sr-only">, {{ $domain->name }}</span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-5">
        {{ $domains->links() }}
    </div>
</div>
