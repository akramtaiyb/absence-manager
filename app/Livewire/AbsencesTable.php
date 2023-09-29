<?php

namespace App\Livewire;

use App\Models\Absence;
use App\Models\Groupe;
use App\Models\Seance;
use Livewire\Component;
use Livewire\WithPagination;

class AbsencesTable extends Component
{
    use WithPagination;

    public $search = "";
    public $groupeId;
    public $groupes;
    public $seanceId;
    public $seances;
//    public $perPage = 8;
//    public function mount()
//    {
//        $this->groupes = Groupe::pluck("label", "id")->all();
//        $this->seances = Seance::where('groupe_id', $this->groupeId)->pluck("label", "id");
//
//    }
//
    public function updatedGroupeId()
    {
        $this->seances = Seance::where('groupe_id', $this->groupeId)->pluck("label", "id")->toArrau();
    }

    public function updateDistribution(Absence $absence, $index)
    {
        $dist = json_decode($absence->distribution, true);

        if (in_array($index, $dist)) {
            $dist = array_diff($dist, [$index]);
        } else {
            $dist[] = $index;
        }

        $dist = json_encode($dist);

        $absence->update(["distribution" => $dist]);
    }

    public function render()
    {
        return view('livewire.absences-table', [
            "absences" => Absence::join('seances', 'absences.seance_id', '=', 'seances.id')
                ->join('stagiaires', 'absences.stagiaire_id', '=', 'stagiaires.id')
                ->where('seances.groupe_id', $this->groupeId)
                ->where(function ($query) {
                    $query->where('stagiaires.first_name', 'like', '%' . $this->search . '%')
                        ->orWhere('stagiaires.last_name', 'like', '%' . $this->search . '%');
                })->orderBy("stagiaires.last_name", "asc")->get(),
            "seance" => $this->seances,
        ]);
    }

}
