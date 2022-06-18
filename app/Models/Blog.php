<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title','image','body','draft','slug'];

    public function category() {
        return $this->belongsToMany(Category::class,'blogs_categories');
    }

    public function blogseo() {
        return $this->belongsTo(Blogseo::class);
    }
}
