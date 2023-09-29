<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count = Stagiaire::all()->count();
        return view("stagiaires.index", compact("count"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groupes = \App\Models\Groupe::all();
//        $groupes = json_decode(\App\Models\Groupe::all());
        return view("stagiaires.create", compact("groupes"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exists = Stagiaire::where("first_name", "=", $request->first_name)
            ->where("last_name", "=", $request->last_name)
            ->where("groupe_id", "=", $request->groupe_id)
            ->exists();
        if (!$exists) {
            Stagiaire::create($request->input());
            return redirect()->back()->with("message", "Stagiaire bien enregistré(e).");
        } else {
            return redirect()->back()->withErrors(["error" => "Ce stagiaire existe déjà."]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Stagiaire $stagiaire)
    {
        return view("stagiaires.show", compact("stagiaire"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stagiaire $stagiaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stagiaire $stagiaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stagiaire $stagiaire)
    {
        //
    }
}
