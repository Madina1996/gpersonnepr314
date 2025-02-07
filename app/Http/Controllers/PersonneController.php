<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PersonneController extends Controller
{
    function __construct()
    {
        if (Session::get("tpersonnes")==null){
                $tab = [];
                Session::put("tpersonnes",$tab);
        }


    }


    function liste(){

        $tabpersonne = Session::get("tpersonnes");
        return  view("home",compact("tabpersonne"));

    }

    function store(Request $request){
        $prenom = $request->prenom;
        $tab = Session::get("tpersonnes");
        array_push($tab,$prenom);
        Session::put("tpersonnes",$tab);
        return redirect("/");
    }

    function update(Request $request){
        $tab = Session::get("tpersonnes");
        for ($i = 0; $i<count($tab);$i++){
            if($tab[$i] == $request->prenomold){
               $tab[$i] = $request->prenom;
               break;
            }
        }
        Session::put("tpersonnes",$tab);
        return redirect("/");
    }

    function delete($prenom){
        $tab = Session::get("tpersonnes");
        for ($i = 0; $i<count($tab);$i++){
            if($tab[$i] == $prenom){
                array_splice($tab,$i,1);
                break;
            }
        }
        Session::put("tpersonnes",$tab);
        return redirect("/");
    }


}
