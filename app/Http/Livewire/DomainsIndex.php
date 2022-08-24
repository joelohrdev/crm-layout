<?php

namespace App\Http\Livewire;

use App\Models\Domain;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;

class DomainsIndex extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder|Relation
    {
        return Domain::query()->orderBy('name', 'ASC');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name'),
            TextColumn::make('domain'),
            TextColumn::make('expires')->date(),
            TextColumn::make('server.name'),
            TextColumn::make('client.name'),
        ];
    }
}
