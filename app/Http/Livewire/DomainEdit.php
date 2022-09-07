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
    public $domainName;
    public $server_id;
    public $client_id;
    public $registrar;
    public $managed;
    public $expires;
    public $notes;

    public function mount(): void
    {
        $this->form->fill([
            'name' => $this->domain->name,
            'domain' => $this->domain->domainName,
            'server_id' => $this->domain->server_id,
            'client_id' => $this->domain->client_id,
            'registrar' => $this->domain->registrar,
            'managed' => $this->domain->managed,
            'expires' => $this->domain->expires,
            'notes' => $this->domain->notes,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')->required(),
            TextInput::make('domain')
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
            DatePicker::make('expires'),
            RichEditor::make('notes')
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
