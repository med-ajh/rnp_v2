<?php

namespace App\Http\Livewire\Admin\Typedetravail;

use App\Models\Typedetravail;
use Livewire\Component;

class Single extends Component
{

    public $typedetravail;

    public function mount(Typedetravail $Typedetravail){
        $this->typedetravail = $Typedetravail;
    }

    public function delete()
    {
        $this->typedetravail->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Typedetravail') ]) ]);
        $this->emit('typedetravailDeleted');
    }

    public function render()
    {
        return view('livewire.admin.typedetravail.single')
            ->layout('admin::layouts.app');
    }
}
