<?php

namespace App\Http\Livewire\Admin\Commune;

use App\Models\Commune;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $commune;
    public $name;
    public $pachalik_id; 

    protected $rules = [
        'name' => 'required',
        'pachalik_id' => 'required|exists:pachaliks,id',
    ];

    public function mount(Commune $Commune)
    {
        $this->commune = $Commune;
        $this->name = $this->commune->name;
        $this->pachalik_id = $this->commune->pachalik_id;
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->commune->update([
            'name' => $this->name,
            'pachalik_id' => $this->pachalik_id,
        ]);

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Commune') ]) ]);

        return redirect()->route(getRouteName().'.commune.read');
    }

    public function render()
    {
        return view('livewire.admin.commune.update')
            ->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Commune') ])]);
    }
}
