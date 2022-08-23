<?php

namespace App\Http\Livewire;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Actions\Action;
use App\Models\Client;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;

class ClientsIndex extends Component  implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder|Relation
    {
        return Client::query()->orderBy('status', 'ASC')->orderBy('name', 'ASC');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->searchable(),
            BadgeColumn::make('status')
                ->colors([
                    'success' => fn ($state): bool => $state === 'active',
                    'danger' => fn ($state): bool => $state === 'closed',
                ]),
            TextColumn::make('phone_number'),
            TextColumn::make('email_address'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('view')
                ->url(fn (Client $record): string => route('client.show', $record))
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            Tables\Filters\SelectFilter::make('status')
                ->options([
                    'active' => 'Active',
                    'closed' => 'Closed',
                ])
        ];
    }

}
