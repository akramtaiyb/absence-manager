<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Groupe;
use App\Models\Seance;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{

    public function list(Request $request)
    {
        $groupes = Groupe::pluck("label", "id")->all();

        $groupe_id = $request->groupe_id;

        $seances = Seance::where("groupe_id", $groupe_id)->get(["id", "label"]);


        return view("absences.index", compact("groupes", "seances", "groupe_id"));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupes = Groupe::pluck("label", "id")->all();
        $groupe_id = 1;
        $seances = Seance::where("groupe_id", $groupe_id)->get(["id", "label"]);
        return view("absences.index", compact("groupes", "seances", "groupe_id"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Absence $absence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absence $absence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absence $absence)
    {
        $dist = json_decode($absence->distribution, true);

        if (in_array($request->index, $dist)) {
            $dist = array_diff($dist, [$request->index]);
        } else {
            $dist[] = $request->index;
        }

        $dist = json_encode($dist);

        $absence->update(["distribution" => $dist]);

        $groupe_id = $absence->stagiaire->groupe_id;

        return back()->with("groupe_id", $groupe_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absence $absence)
    {
        //
    }
}
