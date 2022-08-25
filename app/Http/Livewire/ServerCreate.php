<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Server;
use Closure;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Livewire\Component;
use Str;

class ServerCreate extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->reactive()
                ->afterStateUpdated(function (Closure $set, $state) {
                    $set('slug', Str::slug($state));
                }),
            Hidden::make('slug'),
            TextInput::make('ip_address'),
            Select::make('client_id')
                ->label('Client')
                ->options(Client::all()->pluck('name', 'id')),
            RichEditor::make('notes')
        ];
    }

    public function create(): void
    {
        Server::create($this->form->getState());

        $this->redirect('/servers');

        Notification::make()
            ->title('Server Successfully Saved!')
            ->success()
            ->send();
    }

}