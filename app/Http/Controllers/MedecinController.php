<?php

namespace App\Http\Controllers;

use App\Models\Rdv;
use App\Models\User;
use App\Models\Ville;
use App\Models\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Notification;

use App\Notifications\AlertePatientDanger;

class MedecinController extends Controller
{
    public function accueil()
    {
        return view ('dashboards.medecins.profile');
    }
     
    
    function listepat()
    {

        $userid=Auth::user()->id;
        $patients = DB::table('rdvs')
        ->join('users', 'users.id', '=', 'rdvs.idPatient')
        ->where("idMedecin",$userid)
        ->get();
        $admins=User::where('role',1)->get();
        return view('dashboards.medecins.listepat',["patients"=>$patients, "admins"=>$admins]);
    }

    function histrdv()
    {

        $rendezv = Rdv::where('idMedecin', Auth::user()->id)->get();
        return view('dashboards.medecins.histrdv',["rendezv"=>$rendezv]);
    }
       

    function updateInfo(Request $request)
    {
            $validator = \Validator::make($request->all(),[
                'name'=>'required',
                // 'email'=>'required|email',
                'num'=>'required',
                // 'ville'=>'required',
                // 'specialite'=>'required',
            ]);

            if(!$validator->passes()){
                return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
            }else
            {
                $query = User::find(Auth::user()->id)->update([
                    'name'=>$request->name,
                    // 'email'=>$request->email,
                    'num'=>$request->num,
                    // 'idSpec'=>$request->idSpec,
                    // 'idVille'=>$request->idVille,

                ]);

                if(!$query){
                    return response()->json(['status'=>0,'msg'=>'Quelque chose a mal tourné !.']);
                }else{
                    return response()->json(['status'=>1,'msg'=>'Votre profile a été mis à jour avec succès.']);
                }
            }
    }



    function changePassword(Request $request){
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
            session()->flash('message', 'Votre mot de passe a bien été mis à jour'); 
            return redirect()->route('login');
        }else{
            return redirect()->back()->with('message', "Le mot de passe actuel n'est pas valide");
        }


    }


    function accepter($id) {
        $user = Rdv::find($id);
        $user->etat=1;
        $user->save();

        return redirect(route('medecin.listerdv'))->with('message', 'Rendez-vous accepté');
    }


   

    public function alerte($id)
    {
        $data=User::find($id);

       return view('dashboards.medecins.alerte', compact('data'));
    }
    public function sendemail(Request $request, $id)
    {
        $data=User::find($id);

        $details = [
           'greeting' => $request->greeting,
           'body' => $request->body,
           'actionurl' => $request->actionurl,
           'actiontext' => $request->actiontext,
           'endpart' => $request->endpart

        ];

        Notification::send($data, new AlertePatientDanger($details));

         return redirect(route('medecin.listepat'))->with('message','Alerte envoyé avec succés');
    }


    function index()
    {
        $rendezv = Rdv::where('idMedecin', Auth::user()->id)->where('etat',0)->get();
        return view('dashboards.medecins.listerdv', ["rendezv"=>$rendezv]);
    }

 
    
    public function edit($id)
    {
        $rv = Rdv::find($id);
        return view('dashboards.medecins.editrv')->with('rendezv',$rv);
    }
 
//   reporter
    public function update(Request $request, $id)
    {
       $rv = Rdv::find($id);
        $input = $request->all();
        $rv->update($input);
        $rv->etat=-1;
        $rv->save();
        return redirect('rendezvous')->with('message', 'Votre rendez-vous a été reporté avec succès!');  
    }

    // function reporter($id) {
    //     $user = Rdv::find($id);
    //     $user->etat=-1;
    //     $user->save();

    //     return redirect(route('medecin.listerdv'));
    // }

    

}
