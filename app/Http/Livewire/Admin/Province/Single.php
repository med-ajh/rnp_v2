<?php

namespace App\Http\Livewire\Admin\Province;

use App\Models\Province;
use Livewire\Component;

class Single extends Component
{

    public $province;

    public function mount(Province $Province){
        $this->province = $Province;
    }

    public function delete()
    {
        $this->province->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Province') ]) ]);
        $this->emit('provinceDeleted');
    }

    public function render()
    {
        return view('livewire.admin.province.single')
            ->layout('admin::layouts.app');
    }
}
