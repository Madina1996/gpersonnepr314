<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;

class PersonneDbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personnes = Personne::all();
        return view("home",compact("personnes"));
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
        $personne = new Personne();
        $personne->prenom = $request->prenom;
        $personne->nom = $request->nom;
        $personne->telephone = $request->telephone;
        $personne->datenaiss = $request->datenaisse;
        $today = new \DateTime();
        $date = new \DateTime($personne->datenaiss);
        $dateDiff = $today->diff($date);
        $personne->age = $dateDiff->y;
        $personne->save();
        //dd($personne);
        return redirect("/");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $personne = Personne::find($id);
        //dd($personne);
        return view("edite",compact("personne"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $personne = Personne::find($request->idold);
        $personne->prenom = $request->prenom;
        $personne->nom = $request->nom;
        $personne->telephone = $request->telephone;
        $personne->datenaiss = $request->datenaisse;
        $today = new \DateTime();
        $date = new \DateTime($personne->datenaiss);
        $dateDiff = $today->diff($date);
        $personne->age = $dateDiff->y;
        $personne->update();
        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         Personne::destroy($id);
        return redirect("/");
    }
}
