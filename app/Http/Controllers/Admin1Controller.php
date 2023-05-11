<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Ville;
use App\Models\Specialite;
use Illuminate\Http\Request;

class Admin1Controller extends Controller
{
    public function index()

    {
        $medecins = User::where('role',3)->where('approved',1)->get();
        return view ('dashboards.adminmed.index')->with('medecins', $medecins);
    }
 
    
    // public function create()
    // {
    //     $specialites = Specialite::all();
    //     $villes = Ville::all();
    //     return view('dashboards.adminmed.create', ['specialites'=> $specialites, 'villes'=> $villes]);
    // }
 
  
    // public function store(Request $request)
    // {
    //     $input = $request->all();
    //     User::create($input);
    //     return redirect('medecins')->with('flash_message', 'Doctor Addedd!');  
    // }
 
    
    // public function show($id)
    // {
    //    $medecin = User::find($id);
    //     return view('dashboards.adminmed.show')->with('medecins',$medecin);
    // }
 
    
    public function edit($id)
    {
        $medecin = User::find($id);
        return view('dashboards.adminmed.edit')->with('medecins',$medecin);
    }
 
  
    public function update(Request $request, $id)
    {
       $medecin = User::find($id);
        $input = $request->all();
        $medecin->update($input);
        return redirect('medecins')->with('message', 'Medecin Modifié!');  
    }
 
  
    // public function destroy($id)
    // {
    //     User::destroy($id);
    //     return redirect('medecins')->with('message', 'Medecin Supprimé!');  
    // }

}


