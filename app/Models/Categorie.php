<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nom'];

    // public function article(){

    //     return $this->hasMany('App\Article');

    // }
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
