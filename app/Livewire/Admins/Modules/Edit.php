<?php

namespace App\Livewire\Admins\Modules;

use App\Models\Module;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Edit extends Component
{
    public $moduleId;
    public string $name;
    public $status;

    public function render()
    {
        return view('livewire.admins.modules.edit');
    }

    #[On("editModule")]
    public function editModule($id)
    {
        $module = Module::find($id);
        $this->moduleId = $id;
        $this->name = $module->name;
        $this->status = $module->status;
        Flux::modal('edit-module')->show();
    }

    public function updateModule()
    {
        $this->validate([
            'name' => "required|unique:modules,name," .$this->moduleId
        ]);

        $module = Module::find($this->moduleId)->update(['name' => $this->name]);

        $this->dispatch('refresh-list');
        $this->dispatch('show-toast', message: 'Module mis à jour avec succès.');
        Flux::modal('edit-module')->close();
    }
}
