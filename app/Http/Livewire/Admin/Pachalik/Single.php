<?php

namespace App\Http\Livewire\Admin\Pachalik;

use App\Models\Pachalik;
use Livewire\Component;

class Single extends Component
{

    public $pachalik;

    public function mount(Pachalik $Pachalik){
        $this->pachalik = $Pachalik;
    }

    public function delete()
    {
        $this->pachalik->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Pachalik') ]) ]);
        $this->emit('pachalikDeleted');
    }

    public function render()
    {
        return view('livewire.admin.pachalik.single')
            ->layout('admin::layouts.app');
    }
}
