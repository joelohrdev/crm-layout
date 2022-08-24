<?php

namespace App\Http\Livewire;

use App\Models\Domain;
use Filament\Tables;
use App\Models\Server;
use Filament\Tables\Columns\TextColumn;
use Livewire\Component;

class ServersIndex extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery()
    {
        return Server::query()->orderBy('name', 'ASC');
    }

    protected function getTableColumns(): array
    {
        return [
          TextColumn::make('name'),
          TextColumn::make('ip_address'),
          TextColumn::make('client.name'),
          TextColumn::make('domains_count')->counts('domains'),
        ];
    }

    public function render()
    {
        return view('livewire.servers-index');
    }
}
