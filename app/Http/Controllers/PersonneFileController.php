<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonneFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        if (Storage::disk('local')->exists("personnes.txt")==false){

            Storage::disk('local')->put("personnes.txt","");

        }
        if (Storage::disk('local')->exists("id.txt")==false){

            Storage::disk('local')->put("id.txt","1");

        }

    }

    public function index()
    {
        $text = Storage::disk('local')->get("personnes.txt");

        $tab = explode(";",$text);
        $tabpersonne = [];


        for ($i = 0; $i< count($tab)-1;$i++){

                if (count(explode(",",$tab[$i]))!= 6)
                    continue;
            array_push($tabpersonne,explode(",",$tab[$i]));

        }
        //dd($tabpersonne);
        return view("home",compact("tabpersonne"));
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


        //dd($request);
        $id = $this->getId();
        $prenom = $request->prenom;
        $nom = $request->nom;
        $telephone = $request->telephone;
        $datenaisse = $request->datenaisse;
        $today = new \DateTime();
        $date = new \DateTime($datenaisse);
        $dateDiff = $today->diff($date);
        $age = $dateDiff->y;
        $personne = $id.",".$prenom.",".$nom.",".$telephone.",".$datenaisse.",".$age.";";
        //dd($personne);
        Storage::disk('local')->append("personnes.txt",$personne);
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
    public function edit(string $id)
    {
        $text = Storage::disk('local')->get("personnes.txt");

        $tab = explode(";",$text);

        for ($i = 0; $i< count($tab)-1;$i++){
            $p = explode(",",$tab[$i]);
            if($p[0] == $id){
                return view("edite",compact("p"));
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $text = Storage::disk('local')->get("personnes.txt","");
        //dd($text);
        //dd($request);
        $id = $request->idold;
        $prenom = $request->prenom;
        $nom = $request->nom;

        $telephone = $request->telephone;
        $datenaisse = $request->datenaisse;
        $today = new \DateTime();
        $date = new \DateTime($datenaisse);
        $dateDiff = $today->diff($date);
        $age = $dateDiff->y;
        $personne = $id.",".$prenom.",".$nom.",".$telephone.",".$datenaisse.",".$age;
        //dump($nom);
        $tab = explode(";",$text);

        for ($i = 0; $i< count($tab)-1;$i++){
            if(explode(",",$tab[$i])[0] ==$request->idold ){

              $text =  str_replace($tab[$i],$personne,$text);
                break;
            }
        }

        Storage::disk('local')->put("personnes.txt",$text);
        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $text = Storage::disk('local')->get("personnes.txt","");
        //dd($text);
        //dd($request);
        $tab = explode(";",$text);

        for ($i = 0; $i< count($tab)-1;$i++){
            if(explode(",",$tab[$i])[0] ==$id ){
                $text = str_replace($tab[$i].";","",$text);
                break;
            }
        }
        Storage::disk('local')->put("personnes.txt",$text);
        return redirect("/");
    }

    function getId(){

        $id = (int)Storage::disk('local')->get("id.txt");
        $idr = $id;
        //dd($id);
        $id++;
        Storage::disk('local')->put("id.txt",$id);
        return $idr;

    }
}
