<?php

namespace App\Http\Livewire\Admin\Pachalik;

use App\Models\Pachalik;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $pachalik;
    public $name;
    public $province_id; 

    protected $rules = [
        'name' => 'required',
        'province_id' => 'required|exists:provinces,id',
    ];

    public function mount(Pachalik $Pachalik)
    {
        $this->pachalik = $Pachalik;
        $this->name =  $this->pachalik->name;
        $this->province_id = $this->pachalik->province_id;
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }



    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Pachalik') ]) ]);

        $this->pachalik->update([
            'name' => $this->name,
            'province_id' => $this->province_id,
        ]);
    }






    public function render()
    {
        return view('livewire.admin.pachalik.update', [
            'pachalik' => $this->pachalik
        ])
            ->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Pachalik') ])]);
    }



}
