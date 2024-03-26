<?php

namespace App\Http\Livewire\Admin\Quartier;

use App\Models\Quartier;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $quartier;

   public $name;
    public $pachalik_id; 

    protected $rules = [
        'name' => 'required',
        'pachalik_id' => 'required|exists:pachaliks,id',
    ];

    public function mount(Quartier $Quartier)
    {
        $this->quartier = $Quartier;
        $this->name = $this->quartier->name;
        $this->pachalik_id = $this->quartier->pachalik_id;
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->quartier->update([
            'name' => $this->name,
            'pachalik_id' => $this->pachalik_id,
        ]);

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Quartier') ]) ]);

        return redirect()->route(getRouteName().'.quartier.read');
    }

    public function render()
    {
        return view('livewire.admin.quartier.update')
            ->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Quartier') ])]);
    }
}
