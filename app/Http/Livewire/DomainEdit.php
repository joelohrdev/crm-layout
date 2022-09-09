<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Domain;
use App\Models\Server;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Livewire\Component;

class DomainEdit extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public Domain $domain;

    public $name;
    public $url;
    public $server_id;
    public $client_id;
    public $registrar;
    public $managed;
    public $cloudflare;
    public $expires;
    public $notes;

    public function mount(): void
    {
        $this->form->fill([
            'name' => $this->domain->name,
            'url' => $this->domain->url,
            'server_id' => $this->domain->server_id,
            'client_id' => $this->domain->client_id,
            'registrar' => $this->domain->registrar,
            'managed' => $this->domain->managed,
            'cloudflare' => $this->domain->cloudflare,
            'expires' => $this->domain->expires,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')->required(),
            TextInput::make('url')
                ->required()
                ->url(),
            Forms\Components\Grid::make()
                ->schema([
                    Select::make('server_id')
                        ->required()
                        ->label('Server')
                        ->options(Server::all()->pluck('name', 'id')),
                    Select::make('client_id')
                        ->label('Client')
                        ->options(Client::all()->pluck('name', 'id')),
                ]),
            TextInput::make('registrar'),
            Toggle::make('managed')->inline()
                ->label('Managed by Us?'),
            Toggle::make('cloudflare')->inline()
                ->label('Domain on Cloudflare?'),
            DatePicker::make('expires'),
        ];
    }

    public function getFormModel(): Domain
    {
        return $this->domain;
    }

    public function update(): void
    {
        $this->domain->update(
            $this->form->getState()
        );

        redirect()->route('domain.index');

        Notification::make()
            ->title('Domain Successfully Updated!')
            ->success()
            ->send();
    }
}
