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
                TextInput::make('first_name'),
                TextInput::make('last_name'),
                MultiSelect::make('clients')
                    ->relationship('clients', 'name')
            ])
        ];
    }

    protected function getFormModel(): Model|string|null
    {
        return $this->contact;
    }

    public function save(): void
    {
        $this->contact->update(
            $this->form->getState(),
        );
    }
}
