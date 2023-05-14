<?php

namespace App\Http\Controllers\Auth;

use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
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
             $user->avatar = $fileName;
         }
         $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
