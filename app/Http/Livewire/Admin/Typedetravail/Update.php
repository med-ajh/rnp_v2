<?php

namespace App\Http\Livewire\Admin\Typedetravail;

use App\Models\Typedetravail;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $typedetravail;
    public $name;



    protected $rules = [
        'name' => 'required',

    ];

    public function mount(Typedetravail $Typedetravail){
        $this->typedetravail = $Typedetravail;
        $this->name = $this->typedetravail->name;


    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Typedetravail') ]) ]);

        $this->typedetravail->update([
            'name' => $this->name,
        ]);
    }

    public function render()
    {
        return view('livewire.admin.typedetravail.update', [
            'typedetravail' => $this->typedetravail
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Typedetravail') ])]);
    }
}
