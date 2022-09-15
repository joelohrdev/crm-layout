<div>
    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">IP Address</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Disk Used</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
            @foreach($accounts['data']['acct'] as $account)
                <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-tkd-blue-800 font-semibold sm:pl-6">{{ $account['domain'] }}</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{ $account['ip'] }}</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{ $account['diskused'] }}</td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
                        @if($account['suspended'] === 0)
                            <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">Active</span>
                        @else
                            <span class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800">Suspended</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
