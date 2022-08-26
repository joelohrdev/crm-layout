<?php

namespace App\Http\Livewire;

use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;

class ContactsIndex extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder|Relation
    {
        return Contact::query()->orderBy('last_name', 'ASC');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('first_name')->searchable(),
            TextColumn::make('last_name')->searchable(),
            TextColumn::make('phone_number'),
            TextColumn::make('extension'),
            TextColumn::make('email_address'),
            TextColumn::make('clients.name'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('edit')
                ->url(fn (Contact $record): string => route('contact.edit', $record))
        ];
    }

}
