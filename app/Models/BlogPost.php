<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'title', 'excerpt', 'content', 'featured_image',
        'author', 'comment_count'
    ];
}
