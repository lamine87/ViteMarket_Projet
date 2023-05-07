<?php

namespace App\Http\Controllers\Back;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic as Image;
// use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{
    //
    public function create(Request $request)
    {

        // $user = Auth::user();
        $request->validate(
            [   'nom' => 'required',
                'description' => 'required | max:250',
                'prix'=> 'required',
                'image' => 'required|image|max:1999']);
                if ($request->hasFile('image')) {
                    $uniqid = uniqid();
                    // Recuperer le nom de l'image saisi par l'utilisateur
                    $fileName = $request->file('image')->getClientOriginalName();

                    // Renommer le nom de l'image
                    $rename = str_replace('','_',$uniqid).'-'.date('d-m-Y-H-i-').$fileName;

                    //Telechargement de l'image
                    $request->file('image')->storeAs('public/image', $rename);

                    $img = Image::make($request->file('image')->getRealPath());

                    //Dimensionner l'image
                    $img->resize(500, 500);

                    // Imprimer l'icon sur l'image
                    $img->insert(public_path('icon/logovite3.png'), 'bottom-right', 5, 5);

                    $img->save('storage/upload/'.$rename);
                }
                // var_dump($user);
                Article::create([
                'nom' => $request->nom,
                'description' => $request->description,
                'prix' => $request->prix,
                'image' => $rename,
                'user_id' => auth()->user()->id,

                 ]);

            return Redirect::route('dashboard')->with('status', 'L\'article a bien été ajouté, vous devez attendre la validation par l\'administrateur');

    }
}
