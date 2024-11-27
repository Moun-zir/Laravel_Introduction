<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
     /** @use HasFactory<\Database\Factories\ArticleFactory> */
     use HasFactory;

     /**
      * The attributes that are mass assignable.
      *
      * @var array<int, string>
      */
    // Ajout
    protected $fillable = ['title', 'body', 'user_id', 'image'];

    // Un article n'a qu'un auteur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Un article peut avoir plusieurs commentaires
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
