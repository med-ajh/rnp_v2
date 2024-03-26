<?php

namespace App\Http\Livewire\Admin\Reclamation;

use App\Models\Reclamation;
use Livewire\Component;

class Single extends Component
{

    public $reclamation;

    public function mount(Reclamation $Reclamation){
        $this->reclamation = $Reclamation;
    }

    public function delete()
    {
        $this->reclamation->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Reclamation') ]) ]);
        $this->emit('reclamationDeleted');
    }

    public function render()
    {
        return view('livewire.admin.reclamation.single')
            ->layout('admin::layouts.app');
    }
}
