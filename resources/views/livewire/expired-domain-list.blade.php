<div>
    <ul class="space-y-1">
        @forelse($domains as $domain)
            <li class="text-sm text-slate-500">{{ $domain->name }} - {{ Carbon\Carbon::parse($domain->expires)->format('F d, Y') }}</li>
        @empty
            <li>There are no expired domains</li>
        @endforelse
    </ul>
</div>
