<?php

namespace App\Http\Livewire\Admin\Quartier;

use App\Models\Quartier;
use Livewire\Component;

class Single extends Component
{

    public $quartier;

    public function mount(Quartier $Quartier){
        $this->quartier = $Quartier;
    }

    public function delete()
    {
        $this->quartier->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Quartier') ]) ]);
        $this->emit('quartierDeleted');
    }

    public function render()
    {
        return view('livewire.admin.quartier.single')
            ->layout('admin::layouts.app');
    }
}
