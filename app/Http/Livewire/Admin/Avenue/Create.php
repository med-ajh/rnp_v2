<?php

namespace App\Http\Livewire\Admin\Avenue;

use App\Models\Avenue;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $quartier_id;

    protected $rules = [
        'name' => 'required|string|max:255',
        'quartier_id' => 'required|exists:provinces,id',
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $validatedData = $this->validate();

        Avenue::create([
            'name' => $this->name,
            'quartier_id' => $this->quartier_id,
            'user_id' => auth()->id(),
        ]);

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Avenue') ])]);

        $this->reset(['name', 'quartier_id']);
    }

    public function render()
    {
        return view('livewire.admin.Avenue.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Avenue') ])]);
    }
}
