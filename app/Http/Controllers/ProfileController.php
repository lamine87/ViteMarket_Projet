<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File as FileFacade;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = User::find($request->id);
        $request->validate(
            [
                'name' =>  'string|max:50',
                'prenom' =>  'string|max:50',
                'phone'=>  'string|max:50',
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1999',
            ]
        );
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->hasFile('avatar')) {
            $uniqid = uniqid();
            // Recuperer le nom de l'image saisi par l'utilisateur
            $file = $request->file('avatar');

            $originalName = $file->getClientOriginalName();
            // Renommer le nom de l'image
            $fileName = str_replace('','_',$uniqid).'-'.date('d-m-Y-H-i-').$originalName;

            //Telechargement de l'image
            $img = Image::make($request->file('avatar')->getRealPath());

            // dd($user->avatar);
            // Supprimer l'ancienne image du repertoire
            FileFacade::delete(public_path('storage/avatar/' .$user->avatar));

            // Enregistrer image dans le repertoire
            $user->avatar = $fileName;
            $img->save('storage/avatar/'.$fileName);
        }

        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->phone = $request->phone;

        if ($request->avatar != null){
            $user->avatar = $fileName;
        }
        $user->save();

        return Redirect::route('profile.edit')->with('success', 'Modifier avec succès');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = User::find($request->id);
        if ($user->avatar != null){
            $fileName = $user->avatar;
            $file_path = public_path('storage/avatar/'.$fileName);
            unlink($file_path);
        }

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('success', 'L\'utilisateur a bien été supprimé');
    }
}
