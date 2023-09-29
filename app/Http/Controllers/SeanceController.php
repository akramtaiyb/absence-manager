<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Seance;
use App\Models\Stagiaire;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::today()->format("Y-m-d");
        $seances = Seance::where("date", "=", $today)->orderBy("start_time")->get();
        $count = $seances->count();

        return view("seances.index", compact("seances", "count"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modules = \App\Models\Module::pluck("code", "id")->toArray();
        $groupes = \App\Models\Groupe::pluck("label", "id")->toArray();

        return view("seances.create", compact("modules", "groupes"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_seance = Seance::create($request->all());

        $stagiaires = Stagiaire::where("groupe_id", $request->groupe_id)->get("id");

        foreach ($stagiaires as $stagiaire) {
            Absence::create([
                "stagiaire_id" => $stagiaire->id,
                "seance_id" => $new_seance->id,
                "hours" => Carbon::createFromFormat("H:i", $new_seance->start_time)->diffInHours(Carbon::createFromFormat("H:i",$new_seance->end_time)),
                "distribution" => json_encode([]),
                "reason" => "",
            ]);
        }

        return redirect()->back()->with("message", "Séance bien ajoutée.");

    }

    /**
     * Display the specified resource.
     */
    public function show(Seance $seance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seance $seance)
    {
        $modules = \App\Models\Module::pluck("code", "id")->toArray();
        $groupes = \App\Models\Groupe::pluck("label", "id")->toArray();

        return view("seances.edit", compact("seance", "modules", "groupes"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seance $seance)
    {
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $isGroupeChanged = ($seance->groupe_id == $request->groupe_id);

        if ($isGroupeChanged) {
            Absence::where("seance_id", "=", $seance->id)->delete();
        }

        $seance->update([
            "label" => $request->label,
            "module_id" => $request->module_id,
            "date" => $request->date,
            "start_time" => $request->start_time,
            "end_time" => $request->end_time,
            "type" => $request->type,
            "groupe_id" => $request->groupe_id,
        ]);

        return redirect()->back()->with('message', 'Séance editée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seance $seance)
    {
        //
    }
}
