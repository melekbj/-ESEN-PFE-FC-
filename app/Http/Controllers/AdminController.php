<?php

namespace App\Http\Controllers;

use App\Models\Rdv;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Notification;
use App\Notifications\AdminNewUserNotification;


class AdminController extends Controller {
    
  
    public function index()
    {
        $patients = User::where('role',2)->get();
        return view ('dashboards.admins.gestpat')->with('patients', $patients);
    }

    public function accueil()

    {
        return view ('dashboards.admins.index');
    }

    function rdvs()
    {
        $rdvs = Rdv::all(); 
        return view('dashboards.admins.rdvs', compact('rdvs'));
    }

     function liste_approvals()
     {
        $users = User::where('role',3)->where('approved',0)->get();
        return view('dashboards.admins.liste_approvals', )->with('users', $users);
     }
        
    //  function approve($id) {
    //      $user = User::find($id);
    //      $user->approved=1;
    //      $user->save();

    //      return redirect(route('admin.liste_approvals'))->with('message', 'Médecin Approuvé');
    //  }

     function bloque_debloque($id) {
        $user = User::find($id);
        if($user->block==1) {
            $user->block=0;
        } else{
            $user->block=1;
        }
        
        $user->save();

        if($user->block==1) {
            return redirect()->back()->with('message', 'utilisateur bloqué');
        }else {
            return redirect()->back()->with('message', 'utilisateur débloqué');
        }
       
    }

     public function emailview($id)
     {
         $data=User::find($id);

        return view('dashboards.admins.emailview', compact('data'));
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
        

         Notification::send($data, new AdminNewUserNotification($details));
         $data->approved=1;
         $data->save();
          return redirect(route('admin.liste_approvals'))->with('message','Médecin approuvé');
     }
     
     
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('patients')->with('message', 'Patient supprimé!');  
    }
     


}
