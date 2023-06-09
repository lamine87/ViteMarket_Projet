<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;

class GetArticleController extends Controller
{
    // Affichage de la page d'accueil "Interface.blade.php"
    public function index()
    {

        $article = Article::all();
        $article = DB::table('articles')
            ->orderBy('created_at', 'desc')->paginate(6);
        return view('front.card',['articles'=>$article]);
    }



    // Affichage de la page Dashboard après Authentification " "
    public function getDashboard()
    {
        $categorie = Categorie::all();
        $user = Auth::user();
        $article = Article::all();
        $article = DB::table('articles')->where('user_id', '=',$user->id)
            ->orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard',['articles'=>$article,'users'=>$user,'categories'=>$categorie]);
    }

    public function detail(Request $request)
    {
        $article = Article::find($request->id);
        // $article = DB::table('articles')
        //     ->orderBy('created_at', 'desc');
        return view('front.detail',['article'=>$article]);
    }

    public function localisation(Request $request)
    {
        $article = Article::find($request->id);

        return view('google.map',['article'=>$article]);
    }


}


