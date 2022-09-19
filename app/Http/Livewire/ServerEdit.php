<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Server;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Livewire\Component;
use Str;

class ServerEdit extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public Server $server;

    public $name;

    public $slug;

    public $ip_address;

    public $client_id;

    public function mount(): void
    {
        $this->form->fill([
            'name' => $this->server->name,
            'slug' => $this->server->slug,
            'ip_address' => $this->server->ip_address,
            'client_id' => $this->server->client_id,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->reactive()
                ->afterStateUpdated(function (Closure $set, $state) {
                    $set('slug', Str::slug($state));
                }),
            Hidden::make('slug'),
            TextInput::make('ip_address')->required(),
            Select::make('client_id')
                ->required()
                ->label('Client')
                ->options(Client::all()->pluck('name', 'id')),
        ];
    }

    public function getFormModel(): Server
    {
        return $this->server;
    }

    public function update(): void
    {
        $this->server->update(
            $this->form->getState()
        );

        redirect()->route('server.index');

        Notification::make()
            ->title('Server Successfully Updated!')
            ->success()
            ->send();
    }
}
