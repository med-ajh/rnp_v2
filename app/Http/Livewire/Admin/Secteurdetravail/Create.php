<?php

namespace App\Http\Livewire\Admin\Secteurdetravail;

use App\Models\Secteurdetravail;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $typedetravail_id;

    protected $rules = [
        'name' => 'required',
        'typedetravail_id' => 'required|exists:typedetravails,id',

    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Secteurdetravail') ])]);

        Secteurdetravail::create([
            'name' => $this->name,
            'typedetravail_id' => $this->typedetravail_id,
                ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.secteurdetravail.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Secteurdetravail') ])]);
    }
}
