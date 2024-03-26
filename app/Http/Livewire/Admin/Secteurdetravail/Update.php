<?php

namespace App\Http\Livewire\Admin\Secteurdetravail;

use App\Models\Secteurdetravail;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $secteurdetravail;
    public $name;
    public $typedetravail_id;

    protected $rules = [
        'name' => 'required',
        'typedetravail_id' => 'required|exists:typedetravails,id',

    ];

    public function mount(Secteurdetravail $Secteurdetravail){
        $this->secteurdetravail = $Secteurdetravail;
        $this->name = $this->secteurdetravail->name;
        $this->typedetravail_id = $this->secteurdetravail->typedetravail_id;
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Secteurdetravail') ]) ]);

        $this->secteurdetravail->update([
            'name' => $this->name,
            'typedetravail_id' => $this->typedetravail_id,
                ]);
    }

    public function render()
    {
        return view('livewire.admin.secteurdetravail.update', [
            'secteurdetravail' => $this->secteurdetravail
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Secteurdetravail') ])]);
    }
}
