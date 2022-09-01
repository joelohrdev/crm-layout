<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Contact;
use Closure;
use Filament\Forms;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\MultiSelect;
use PhpParser\Node\Expr\AssignOp\Mul;
use Str;

class ContactCreate extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $clients;

    public function mount(Contact $contact): void
    {
        $this->contact = $contact;
        $this->form->fill();
    }

    public function getFormSchema(): array
    {
        return [
          Grid::make()
            ->schema([
                TextInput::make('first_name')->required(),
                TextInput::make('last_name')->required(),
            ]),
            MultiSelect::make('clients')
                ->relationship('clients', 'name'),
            TextInput::make('position'),
            Grid::make(3)
                ->schema([
                    TextInput::make('phone_number')
                        ->mask(fn (TextInput\Mask $mask) => $mask->pattern('000-000-0000')),
                    TextInput::make('extension'),
                    TextInput::make('email_address')
                ])
        ];
    }

    protected function getFormModel(): Model|string|null
    {
        return $this->contact;
    }

    public function create(): void
    {
        $contact = Contact::create($this->form->getState());

        $this->form->model($contact)->saveRelationships();

        $this->redirect('/contacts');

        Notification::make()
            ->title('Contact Successfully Saved!')
            ->success()
            ->send();
    }
}
