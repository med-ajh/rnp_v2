<?php

namespace App\Http\Livewire\Admin\Citoyen;

use App\Models\Citoyen;
use Livewire\Component;

class Single extends Component
{

    public $citoyen;

    public function mount(Citoyen $Citoyen){
        $this->citoyen = $Citoyen;
    }

    public function delete()
    {
        $this->citoyen->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Citoyen') ]) ]);
        $this->emit('citoyenDeleted');
    }

    public function render()
    {
        return view('livewire.admin.citoyen.single')
            ->layout('admin::layouts.app');
    }
}
