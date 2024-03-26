<?php

namespace App\Http\Livewire\Admin\Region;

use App\Models\Region;
use Livewire\Component;

class Single extends Component
{

    public $region;

    public function mount(Region $Region){
        $this->region = $Region;
    }

    public function delete()
    {
        $this->region->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Region') ]) ]);
        $this->emit('regionDeleted');
    }

    public function render()
    {
        return view('livewire.admin.region.single')
            ->layout('admin::layouts.app');
    }
}
