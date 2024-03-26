<?php

namespace App\Http\Livewire\Admin\Commune;

use App\Models\Commune;
use Livewire\Component;

class Single extends Component
{

    public $commune;

    public function mount(Commune $Commune){
        $this->commune = $Commune;
    }

    public function delete()
    {
        $this->commune->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Commune') ]) ]);
        $this->emit('communeDeleted');
    }

    public function render()
    {
        return view('livewire.admin.commune.single')
            ->layout('admin::layouts.app');
    }
}
