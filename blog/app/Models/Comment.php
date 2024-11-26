<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     /** @use HasFactory<\Database\Factories\CommentFactory> */
     use HasFactory;

     /**
      * The attributes that are mass assignable.
      *
      * @var array<int, string>
      */
    //code...
    protected $fillable = ['comment', 'user_id', 'article_id'];
}