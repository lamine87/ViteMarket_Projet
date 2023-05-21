<?php

namespace App\Http\Controllers\Back;

use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File as FileFacade;
use Intervention\Image\ImageManagerStatic as Image;

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
                'image' => 'required|image|max:1999'
            ]);
                if ($request->hasFile('image')) {
                    $uniqid = uniqid();
                    // Recuperer le nom de l'image saisi par l'utilisateur
                    $fileName = $request->file('image')->getClientOriginalName();

                    // Renommer le nom de l'image
                    $rename = str_replace('','_',$uniqid).'-'.date('d-m-Y-H-i-').$fileName;

                    //Telechargement de l'image
                    $request->file('image')->storeAs('public/image/', $uniqid.$rename);

                    $img = Image::make($request->file('image')->getRealPath());

                    //Dimensionner l'image
                    // $img->resize(500, 500);

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
                 ])->categories()->attach($request->categories);

            return Redirect::route('dashboard')->with('success', 'L\'article a bien été ajouté, vous devez attendre la validation par l\'administrateur');

    }


    public function getEdit(Request $request)
    {
        $categorie=Categorie::all();
        $article = Article::find($request->id);
        // $article = DB::select('select * from articles where id = ?',$id);
            return view('front.edit', ['article'=>$article,'categories'=>$categorie]);
    }

    public function updateArticle(Request $request)
    {
        // $user = Auth::user();
        $article = Article::find($request->id);
        $request->validate(
            [
                'nom' =>  ['required', 'string', 'max:50'],
                'description' =>  ['required', 'string', 'max:250'],
                'prix'=>  ['required', 'string', 'max:50'],
                'image' => 'image|mimes:jpeg,png,jpg,svg|max:1999'
            ]);
        if ($request->hasFile('image')) {
            $uniqid = uniqid();
            // Recuperer le nom de l'image saisi par l'utilisateur
            $file = $request->file('image');

            $originalName = $file->getClientOriginalName();
            // Renommer le nom de l'image
            $fileName = str_replace('','_',$uniqid).'-'.date('d-m-Y-H-i-').$originalName;

            //Telechargement de l'image
            // $request->file('image')->storeAs('public/upload', $rename);
            $img = Image::make($request->file('image')->getRealPath());

            //Dimensionner l'image
            // $img->resize(500, 500);

            // Imprimer l'icon sur l'image
            $img->insert(public_path('icon/logovite3.png'), 'bottom-right', 5, 5);

            // Supprimer l'ancienne image du repertoire
            FileFacade::delete(public_path('storage/upload/' .$article->image));

            // Enregistrer image dans le repertoire
            $article->image = $fileName;
            $img->save('storage/upload/'.$fileName);
        }

        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->prix = $request->prix;
        if ($request->image != null){
            $article->image = $fileName;
        }
        $article->categories()->sync($request->categories);
        // dd($request->categories);
        $article->save();
        return Redirect::route('dashboard')->with('success', 'L\'article a bien été modifié, vous devez attendre la validation par l\'administrateur');

    }


    public function destroyArticle($id)
    {
        // dd($request->id);
        $article = Article::find($id);
        $fileName = $article->image;
        $file_path = public_path('storage/upload/'.$fileName);
        unlink($file_path);
        $article->delete();
        return Redirect::route('dashboard')->with('success', 'L\'article a bien été supprimé');

    }

}
