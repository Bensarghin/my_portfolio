<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class PostsController extends Controller
{
    public function index() {
        return view('blogs.index',[
            'blogs' => Blog::orderByDesc('updated_at')->where('draft',0)->paginate('10')
        ]);
    }

    public function category($category) {
        $blogs = Blog::orderByDesc('updated_at')
            ->where('draft',0)
            ->with('category')
            ->whereRelation('category','title',$category)
            ->paginate(10);
        return view('blogs.category',[
            'blogs' => $blogs
        ]);
    }

    public function show($slug) {
        $blog = Blog::where('slug','LIKE',$slug)->first();
        if($blog){
            return view('blogs.show',[
                'blog' => $blog
            ]);
        }
        else{
            return abort('404');
        }
    }
}
