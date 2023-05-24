<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {

        event(new Registered($user = $this->create($request)));

        // $this->guard()->login($user);
        // Auth::login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        return redirect('/login')->with('success', 'Votre compte à bien été crée vous devez le confirmer avec l\'email que vous avez reçu');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Models\User
     */
    protected function create(Request  $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'prenom' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1999',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

         if($request->hasFile('avatar')) {
            $uniqid = uniqid();
            // Recuperer le nom de l'image saisi par l'utilisateur
            $fileName = $request->file('avatar')->getClientOriginalName();
            // Renommer le nom de l'image
            $rename = str_replace('','_',$uniqid).'-'.date('d-m-Y-H-i-').$fileName;
            //Telechargement de l'image
            $request->file('avatar')->storeAs('public/avatar/', $uniqid.$rename);
         }

         $user = new User();
         $user->name = $request->name;
         $user->prenom = $request->prenom;
         $user->phone = $request->phone;
         $user->email = $request->email;
         $user->password = Hash::make($request->password);
         if ($request->avatar != null){
             $user->avatar = $uniqid.$rename;
         }

         $user->save();

        event(new Registered($user));

    }
}
