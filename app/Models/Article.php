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
        'image'
    ];

    public function user(){
        return $this->hasMany('App\User');
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

}
