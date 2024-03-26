<?php

namespace App\Http\Livewire\Admin\Avenue;

use App\Models\Avenue;
use Livewire\Component;

class Single extends Component
{

    public $avenue;

    public function mount(Avenue $Avenue){
        $this->avenue = $Avenue;
    }

    public function delete()
    {
        $this->avenue->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Avenue') ]) ]);
        $this->emit('avenueDeleted');
    }

    public function render()
    {
        return view('livewire.admin.avenue.single')
            ->layout('admin::layouts.app');
    }
}
