<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;



class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
    	'title', 'description', 'content', 'image', 'publier_le'
    ];


    public function deleteImage()
    {
    	Storage::delete($this->image);
    }
}
