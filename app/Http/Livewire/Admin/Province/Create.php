<?php

namespace App\Http\Livewire\Admin\Province;

use App\Models\Province;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $region_id;
    
    protected $rules = [
        'name' => 'required',
        'region_id' => 'required|exists:regions,id',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Province') ])]);
        
        Province::create([
            'name' => $this->name,
            'region_id' => $this->region_id,            
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.province.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Province') ])]);
    }
}
