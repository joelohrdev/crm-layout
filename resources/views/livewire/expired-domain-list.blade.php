<div>
    <ul class="space-y-1">
        @foreach($domains as $domain)
            <li class="text-sm text-slate-500">{{ $domain->name }} - {{ Carbon\Carbon::parse($domain->expires)->format('F d, Y') }}</li>
        @endforeach
    </ul>
</div>
