<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Closure;
use Filament\Forms;
use Filament\Notifications\Notification;
use Livewire\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Str;

class ClientCreate extends Component implements Forms\Contracts\HasForms
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
                })->required(),
            Hidden::make('slug'),
            Select::make('status')
                ->options([
                    'active' => 'Active',
                    'closed' => 'Closed'
                ])->required(),
            TextInput::make('address'),
            Grid::make(3)
                ->schema([
                    TextInput::make('city'),
                    TextInput::make('state'),
                    TextInput::make('postal_code'),
                ]),
            Grid::make()
                ->schema([
                    TextInput::make('phone_number')
                        ->mask(fn (TextInput\Mask $mask) => $mask->pattern('000-000-0000')),
                    TextInput::make('email_address'),
                ])
        ];
    }

    public function create(): void
    {
        Client::create($this->form->getState());

        $this->redirect('/clients');

        Notification::make()
            ->title('Client Successfully Saved!')
            ->success()
            ->send();
    }

    public function render()
    {
        return view('livewire.client-create');
    }
}
