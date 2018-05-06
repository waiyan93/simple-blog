<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['title', 'price', 'author_id', 'publisher_id', 'cover_image'];
    public function author()
    {
        return $this->belongsTo('App\Author');
    }
     public function publisher()
    {
        return $this->belongsTo('App\Publisher');
    }
}
