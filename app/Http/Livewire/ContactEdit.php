<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Livewire\Component;

class ContactEdit extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public Contact $contact;

    public $first_name;

    public $last_name;

    public $clients;

    public $position;

    public $phone_number;

    public $extension;

    public $email_address;

    public function mount(): void
    {
        $this->form->fill([
            'first_name' => $this->contact->first_name,
            'last_name' => $this->contact->last_name,
            'clients' => $this->contact->clients,
            'position' => $this->contact->position,
            'phone_number' => $this->contact->phone_number,
            'extension' => $this->contact->extension,
            'email_address' => $this->contact->email_address,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make()
                ->schema([
                    TextInput::make('first_name'),
                    TextInput::make('last_name'),
                ]),
            MultiSelect::make('client')
                ->relationship('clients', 'name'),
            TextInput::make('position'),
            Grid::make(3)
                ->schema([
                    TextInput::make('phone_number')
                        ->mask(fn (TextInput\Mask $mask) => $mask->pattern('000-000-0000')),
                    TextInput::make('extension'),
                    TextInput::make('email_address'),
                ]),
        ];
    }

    protected function getFormModel(): Contact
    {
        return $this->contact;
    }

    public function update(): void
    {
        $this->contact->update(
            $this->form->getState()
        );

        redirect()->route('contact.index');

        Notification::make()
            ->title('Contact Successfully Updated!')
            ->success()
            ->send();
    }
}
