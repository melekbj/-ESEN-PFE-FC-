<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use App\Models\Specialite;
use App\Models\Ville;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\AdminNewUserNotification;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';


    public function showRegistrationForm()
    {
        $specialites = Specialite::all();
        $villes = Ville::all();
        return view('auth.register', ['specialites'=>$specialites, 'villes'=>$villes ] );
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     * @return \Illuminate\Contracts\Support\Renderable
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
    


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'un   ique:users'],
            'num' => 'required',
            'idSpec' => 'required',
            'idVille' => 'required',
            'avatar' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */


    function register(Request $request)
        {  

            $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'num'=>  ['required', 'numeric', 'unique:users'],
                // 'specialite'=> 'required',
                // 'ville'=> 'required',
                // 'avatar' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'email.unique'    => 'Désolé, cette adresse e-mail est déjà utilisée par un autre utilisateur.',
                'num.unique'    => 'Désolé, ce numéro est déjà utilisée par un autre utilisateur.',
                'password.confirmed'    => 'La confirmation du mot de passe ne correspond pas.',
            ]
        );

        
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->num = $request->num;
            $user->password = \Hash::make($request->password);

            // Dynamic role
            if(in_array($request->role, [2,3])){
                $user->role = (int)$request->role;
            }
            else{
                $user->role = 2;
            }

            //  fields will be null in role == 2
            if( $user->role == 3 ){
                $user->idSpec = $request->specialite;
                $user->idVille = $request->ville;   
                $user->avatar = $request->avatar;   
            }

            //  image upload //Certificate
            if(request()->hasFile('avatar')) {
                $avatar = request()->file('avatar')->getClientOriginalName();
                request()->file('avatar')->storeAs('public/certificats', $user->name .'/' . $avatar, '');
                $user->update(['avatar'=> $avatar]);
            }

                //  dd($user);
            

            if( $user->save() ){
            return redirect($this->redirectPath())->with('message','Vous êtes maintenant inscrit avec succès !');
            
            }else{
                return redirect()->back()->with('error',"Échec de l'inscription");
            }

        }    
        




}
