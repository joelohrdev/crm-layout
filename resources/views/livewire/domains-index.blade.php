<div>
    <div class="-mx-4 mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">URL</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Expires</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Domains</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">View</span>
                </th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
            @foreach($domains as $domain)
                <tr>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-tkd-blue-900 sm:pl-6">
                        {{ $domain->name }}
                    </td>
                    <td class="hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500 sm:table-cell">
                        <a class="hover:underline" target="_blank" href="{{ $domain->domain }}">{{ $domain->domain }}</a>
                    </td>
                    <td class="hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500 hover:text-gray-700 hover:underline lg:table-cell">
                        {{ Carbon\Carbon::parse($domain->expires)->format('F d, Y') }}
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        {{ $domain->server->name }}
                    </td>
                    <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                        <a href="#" class="text-tkd-blue-600 hover:text-tkd-blue-900">View<span class="sr-only">, {{ $domain->name }}</span></a>
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
