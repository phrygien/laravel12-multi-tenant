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
        Flux::modal('edit-module')->show();
    }

    public function updateModule()
    {
        $this->validate([
            'name' => "required|unique:modules,name," .$this->moduleId
        ]);

        $module = Module::find($this->moduleId)->update(['name' => $this->name]);

        $this->dispatch('refresh-list');
        Flux::modal('edit-module')->close();
    }
}
