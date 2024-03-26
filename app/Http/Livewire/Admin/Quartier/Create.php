<?php

namespace App\Http\Livewire\Admin\Quartier;

use App\Models\Quartier;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;


    public $name;
    public $pachalik_id;

    protected $rules = [
        'name' => 'required|string|max:255',
        'pachalik_id' => 'required|exists:provinces,id',
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $validatedData = $this->validate();

        Quartier::create([
            'name' => $this->name,
            'pachalik_id' => $this->pachalik_id,
            'user_id' => auth()->id(),
        ]);

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Quartier') ])]);

        $this->reset(['name', 'pachalik_id']);
    }

    public function render()
    {
        return view('livewire.admin.quartier.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Quartier') ])]);
    }
}
