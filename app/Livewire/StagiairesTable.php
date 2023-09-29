<?php

namespace App\Livewire;

use App\Models\Stagiaire;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class StagiairesTable extends Component
{
    use WithPagination;

    public $search = "";
    public $perPage = 25;

    public function render()
    {
        return view('livewire.stagiaires-table',
            [
                "stagiaires" => Stagiaire::search($this->search)->paginate($this->perPage),
            ]
        );
    }
}
