<?php

namespace App\Http\Livewire\Admin\Avenue;

use App\Models\Avenue;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $avenue;
    public $name;
    public $quartier_id;

    protected $rules = [
        'name' => 'required',
        'quartier_id' => 'required|exists:quartiers,id',
    ];

    public function mount(Avenue $Avenue)
    {
        $this->avenue = $Avenue;
        $this->name = $this->avenue->name;
        $this->quartier_id = $this->avenue->quartier_id;
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->avenue->update([
            'name' => $this->name,
            'quartier_id' => $this->quartier_id,
        ]);

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Avenue') ]) ]);

        return redirect()->route(getRouteName().'.avenue.read');
    }

    public function render()
    {
        return view('livewire.admin.avenue.update')
            ->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Avenue') ])]);
    }
}
