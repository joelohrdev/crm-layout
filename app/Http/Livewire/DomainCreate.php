<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Domain;
use App\Models\Server;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DatePicker;
use Filament\Notifications\Notification;
use Filament\Forms\Components\TextInput;
use Livewire\Component;

class DomainCreate extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public function mount(): void
    {
        $this->form->fill();
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

    public function create(): void
    {
        Domain::create($this->form->getState());

        $this->redirect('/domains');

        Notification::make()
            ->title('Domain Successfully Saved!')
            ->success()
            ->send();
    }

}
