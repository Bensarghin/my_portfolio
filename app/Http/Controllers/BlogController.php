<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Blogseo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Image;

class BlogController extends Controller
{
    public function index() {
        $blogs = Blog::orderByDesc('created_at')->where('draft' , 0)->paginate(10);
        return  view('backoffice.blog.index', [
            'blogs' => $blogs,
        ]);
    }

    public function add() {

        $categories = Category::all();
        return  view('backoffice.blog.add',[
            
            'categories' => $categories
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'slug' => 'required|unique:blogs,slug',
            'title' => 'required|unique:blogs,title',
            'image' => 'required|image',
            'body' => 'required',
            'categories' => 'required',
            'draft' => 'nullable',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'image_alt' => 'required',
            'og_title' => 'required',
            'og_description' => 'required',
            'og_image' => 'required',
        ]);            

        $image = $request->file('image');
        $imagename = Str::slug($request->image_alt,'').'.'.$image->extension();
     
        $destinationPath = public_path('/uploads');
        $img = Image::make($image->path());
        $img->resize(640,427)->save($destinationPath.'/'.$imagename);

        $blog = Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->slug,'-'),
            'image' => $imagename,
            'body'  => $request->body,
            'draft'  => (boolean) $request->draft,
            
        ]);

        Blogseo::create([
            'title' => $request->meta_title,
            'description'  => $request->meta_description,
            'image_alt' => $request->meta_description,
            'og_title'  => $request->og_title,
            'og_description' => $request->og_description,
            'og_image' => $request->og_image,
            'blog_id' => $blog->id
        ]);

        return  redirect()->route('blog.index');
    }

    public function edit(Blog $blog) {

        $categories = Category::all();
        return  view('backoffice.blog.edit', [
            'blog' => $blog,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Blog $blog) {

        $request->validate([
            'slug' => 'required|unique:blogs,slug',
            'title' => 'required|unique:blogs,title',
            'image' => 'nullable|image',
            'body' => 'required',
            'categories' => 'required',
            'draft' => 'nullable',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'image_alt' => 'required',
            'og_title' => 'required',
            'og_description' => 'required',
            'og_image' => 'required',
        ]);            
        
        $image = $request->file('image');
        if( $image!=null ) {
            $imagename = Str::slug($request->image_alt,'').'.'.$image->extension();
            $destinationPath = public_path('/uploads');
            $img = Image::make($image->path());
            $img->resize(640,427)->save($destinationPath.'/'.$imagename);
            
            $blog->update(['image' => $imagename]);
         }
         $blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->slug,'-'),
            'body'  => $request->body,
            'draft'  => (boolean) $request->draft,
            
        ]);

        Blogseo::create([
            'title' => $request->meta_title,
            'description'  => $request->meta_description,
            'image_alt' => $request->meta_description,
            'og_title'  => $request->og_title,
            'og_description' => $request->og_description,
            'og_image' => $request->og_image,
            'blog_id' => $blog->id
        ]);

        return  redirect()->route('blog.index');
    }

    public function delete($id) {
        $blog = Blog::find($id);
        if($blog) {
            $blog->delete();
            return redirect()->back();
        }
        else {
            abort('404');
        }
    }

    public function publish($blog) {
        $blog = Blog::find($blog);
        $blog->update([
            'draft' => !$blog->draft
        ]);
        return redirect()->back()->with('success','Post published!!');
    }

    public function drafts() {
        $blogs = Blog::orderByDesc('created_at')
        ->where('draft' , 1)->get();
        return view('backoffice.draft.index',[
            'drafts' => $blogs
        ]);
    }
}
