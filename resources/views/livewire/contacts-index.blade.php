<div>
    <div class="-mx-4 mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Phone Number</th>
                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Email Address</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Client(s)</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
            @foreach($contacts as $contact)
                <tr>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-tkd-blue-900 sm:pl-6">{{ $contact->first_name }} {{ $contact->last_name }}</td>
                    <td class="hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500 sm:table-cell">
                        {{ preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3',$contact->phone_number) }}
                        @if($contact->extension)
                            <span>Ext: {{ $contact->extension }}</span>
                        @endif
                    </td>
                    <td class="hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500 hover:text-gray-700 hover:underline lg:table-cell">
                        <a href="mailto:{{ $contact->email_address }}">{{ $contact->email_address }}</a>
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        @foreach($contact->clients as $client)
                            <a class="hover:underline" href="{{ route('client.show', $client) }}">{{ $client->name }}</a>
                            @if(!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </td>
                    <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                        <a href="{{ route('contact.edit', $contact) }}" class="text-tkd-blue-600 hover:text-tkd-blue-900">Edit<span class="sr-only">, {{ $contact->name }}</span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-5">
        {{ $contacts->links() }}
    </div>
</div>
