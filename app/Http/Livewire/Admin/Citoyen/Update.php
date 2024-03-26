<?php

namespace App\Http\Livewire\Admin\Citoyen;

use App\Models\Citoyen;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $citoyen;

    
    protected $rules = [
        
    ];

    public function mount(Citoyen $Citoyen){
        $this->citoyen = $Citoyen;
        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Citoyen') ]) ]);
        
        $this->citoyen->update([
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.citoyen.update', [
            'citoyen' => $this->citoyen
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Citoyen') ])]);
    }
}
