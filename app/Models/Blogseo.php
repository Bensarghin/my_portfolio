<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogseo extends Model
{
    use HasFactory;

    protected $fillable = ['title','image_alt','description','og_title','og_description','og_image','blog_id'];


    public function blog() {
        return $this->hasOne(Blog::class);
    }
}
