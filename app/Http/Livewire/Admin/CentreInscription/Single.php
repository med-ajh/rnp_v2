<?php

namespace App\Http\Livewire\Admin\Centreinscription;

use App\Models\CentreInscription;
use Livewire\Component;

class Single extends Component
{

    public $centreinscription;

    public function mount(CentreInscription $CentreInscription){
        $this->centreinscription = $CentreInscription;
    }

    public function delete()
    {
        $this->centreinscription->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('CentreInscription') ]) ]);
        $this->emit('centreinscriptionDeleted');
    }

    public function render()
    {
        return view('livewire.admin.centreinscription.single')
            ->layout('admin::layouts.app');
    }
}
