<?php

namespace App\Livewire;

use Livewire\Component;

class SeancesTable extends Component
{
    protected int $perPage = 8;

    public function render()
    {
        return view('livewire.seances-table',
            [
                "all" => \App\Models\Seance::orderBy("date", "desc")->paginate($this->perPage)
            ]
        );
    }
}
