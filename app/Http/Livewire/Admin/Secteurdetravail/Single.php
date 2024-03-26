<?php

namespace App\Http\Livewire\Admin\Secteurdetravail;

use App\Models\Secteurdetravail;
use Livewire\Component;

class Single extends Component
{

    public $secteurdetravail;

    public function mount(Secteurdetravail $Secteurdetravail){
        $this->secteurdetravail = $Secteurdetravail;
    }

    public function delete()
    {
        $this->secteurdetravail->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Secteurdetravail') ]) ]);
        $this->emit('secteurdetravailDeleted');
    }

    public function render()
    {
        return view('livewire.admin.secteurdetravail.single')
            ->layout('admin::layouts.app');
    }
}
