<?php

namespace App\Http\Livewire\Admin\Region;

use App\Models\Region;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $region;

    public $name;
    
    protected $rules = [
        'name' => 'required',        
    ];

    public function mount(Region $Region){
        $this->region = $Region;
        $this->name = $this->region->name;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Region') ]) ]);
        
        $this->region->update([
            'name' => $this->name,            
        ]);
    }

    public function render()
    {
        return view('livewire.admin.region.update', [
            'region' => $this->region
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Region') ])]);
    }
}
