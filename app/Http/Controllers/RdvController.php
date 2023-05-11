<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rdv;



class RdvController extends Controller
{
   public function AjoutRdv(Request $request){

    Rdv::Create([
    "idPatient"=> $request->idpat,
    "idMedecin"=> $request->idmed,
    "dateRdv"=>   $request->dateRdv,
    "heureRdv"=>  $request->time,
    "motif"=>  $request->motif

    ]);
    session()->flash('message', "Votre rendez-vous a été ajouté avec succès. 
                                                                Nous vous contacterons pour plus d'informations"); 
    return redirect(route('user.accueil'));
   }
}
