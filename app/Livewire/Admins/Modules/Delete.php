<?php

namespace App\Livewire\Admins\Modules;

use App\Models\Module;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    public $moduleId;

    public function render()
    {
        return view('livewire.admins.modules.delete');
    }

    #[On("deleteModule")]
    public function deleteModule($id)
    {
        $module = Module::find($id);
        $this->moduleId = $id;
        Flux::modal('delete-module')->show();
    }

    public function deleteData()
    {
        $module = Module::find($this->moduleId)->delete();
        $this->moduleId = null;
        $this->dispatch('refresh-list');
        $this->dispatch('show-toast', message: 'Module mis à jour avec succès.');
        Flux::modal('delete-module')->close();
        
    }
}
