<?php

namespace App\Http\Controllers;

use App\Models\Rdv;
use App\Models\Specialite;
use App\Models\Ville;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller
{
    function accueil(Request $request)
    {
        $villes=DB::table('villes')
        ->join('users', 'users.idVille', '=', 'villes.idVille')->get();
        $specs = DB::table('specialites')
        ->join('users', 'users.idSpec', '=', 'specialites.idSpec')->get();
        $users = [];
        if($request->has("ville") and $request->has("specialite")){
            $users = User::where("idVille", $request->ville)->where("idSpec", $request->specialite)->get();
        }
        
        return view('dashboards.users.accueil', ["villes"=>$villes, "specs"=>$specs, "request"=>$request, 'users'=>$users]);
    }
    
    
    function index (){
        $rendezv = Rdv::where('idPatient', Auth::user()->id)->where('etat',0)->get();
        return view('dashboards.users.gestrdv', compact('rendezv'));
    }

 
    
    public function edit($id)
    {
        $rv = Rdv::find($id);
        return view('dashboards.users.editrv')->with('rendezv',$rv);
    }
 
  
    public function update(Request $request, $id)
    {
        $rv = Rdv::find($id);
        $input = $request->all();
        $rv->update($input);
        return redirect('rendezvo')->with('message', 'Votre rendez-vous a été mis à jour avec succès!');  
    }
 
    public function destroy($id)
     {
        Rdv::destroy($id);
         return redirect('rendezvo')->with('message', 'Rendez-vous annulé!');  
     }

      function profile(){
        return view('dashboards.users.profile');
     }
     function histordv(){
        $rendezv = Rdv::where('idPatient', Auth::user()->id)->get();
        return view('dashboards.users.histordv', compact('rendezv'));
    }

    function detailrdv(){
       return view('dashboards.users.detailrdv');
    }


    function updateInfo(Request $request)
    {
           $validator = \Validator::make($request->all(),[
               'name'=>'required',
               'num'=>'required',

           ]);

           if(!$validator->passes()){
               return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
           }else
           {
               $query = User::find(Auth::user()->id)->update([
                   'name'=>$request->name,
                // 'email'=>$request->email,
                   'num'=>$request->num,

               ]);

               if(!$query){
                   return response()->json(['status'=>0,'msg'=>'Quelque chose a mal tourné !.']);
               }else{
                   return response()->json(['status'=>1,'msg'=>'Votre profile a été mis à jour avec succès.']);
               }
           }
   }


   function changePassword(Request $request)
    {
        $validateData = $request->validate([
        'oldpassword'=>'required',
        'password'=>'required|confirmed|min:8',
        ],
        [
            'oldpassword.required'    => 'Mot de passe actuel obligatoire.',
            'password.min'    => 'Le mot de passe doit comporter au moins 8 caractères..',
            'password.confirmed'    => 'La confirmation du mot de passe ne correspond pas.',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('message', 'Votre mot de passe a bien été mis à jour');
        }else{
            return redirect()->back()->with('message', "Le mot de passe actuel n'est pas valide");
        }
    }




}
