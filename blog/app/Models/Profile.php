<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
     /** @use HasFactory<\Database\Factories\CommentFactory> */
     use HasFactory;

     /**
      * The attributes that are mass assignable.
      *
      * @var array<int, string>
      */
    //code...
    protected $fillable = [];

    // Un profil n'appartient qu'a un seul utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
