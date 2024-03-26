<?php

namespace App\Http\Livewire\Admin\Pachalik;

use App\Models\Pachalik;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $province_id;

    protected $rules = [
        'name' => 'required|string|max:255',
        'province_id' => 'required|exists:provinces,id',
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $validatedData = $this->validate();

        Pachalik::create([
            'name' => $this->name,
            'province_id' => $this->province_id,
            'user_id' => auth()->id(),
        ]);

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Pachalik') ])]);

        $this->reset(['name', 'province_id']);
    }

    public function render()
    {
        return view('livewire.admin.pachalik.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Pachalik') ])]);
    }
}
