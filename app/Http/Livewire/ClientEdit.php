<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Livewire\Component;
use Str;

class ClientEdit extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public Client $client;

    public $name;
    public $status;

    public function mount(): void
    {
        $this->form->fill([
            'name' => $this->client->name,
            'slug' => $this->client->slug,
            'status' => $this->client->status,
            'address' => $this->client->address,
            'city' => $this->client->city,
            'state' => $this->client->state,
            'postal_code' => $this->client->postal_code,
            'phone_number' => $this->client->phone_number,
            'email_address' => $this->client->email_address,
        ]);
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

    public function update(): void
    {
        $this->client->update(
            $this->form->getState()
        );

        redirect()->route('client.show', $this->client);

        Notification::make()
            ->title('Client Successfully Updated!')
            ->success()
            ->send();
    }

}
