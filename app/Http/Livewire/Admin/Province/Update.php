<?php

namespace App\Http\Livewire\Admin\Province;

use App\Models\Province;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $province;

    public $name;
    public $region_id;

    protected $rules = [
        'name' => 'required',
        'region_id' => 'required|exists:regions,id',
    ];

    public function mount(Province $Province){
        $this->province = $Province;
        $this->name = $this->province->name;
        $this->region_id = $this->province->region_id;
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Province') ]) ]);

        $this->province->update([
            'name' => $this->name,
            'region_id' => $this->region_id,
        ]);
    }




    public function render()
    {
        return view('livewire.admin.province.update', [
            'province' => $this->province
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Province') ])]);
    }
}
