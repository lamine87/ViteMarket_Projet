<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'prix',
        'user_id',
        'image',
        'created_at',
        'updated_at'
    ];


    public function user(){
        return $this->hasMany('App\User');
    }

    public function categories()
    {
        return $this->belongsToMany(Categorie::class);
    }
}
