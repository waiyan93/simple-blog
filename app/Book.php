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
    public function getCoverImageUrlAttribute($value)
    {
        if(!is_null($this->cover_image))
        {
            $imageUrl = "";
            $imagePath = public_path(). "/uploads/" . $this->cover_image;
            if(file_exists($imagePath))
            {
                $imageUrl = asset("uploads/". $this->cover_image);
            }
            return $imageUrl;
        }
    }
}
