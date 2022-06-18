<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('backoffice.category.index');
    }

    public function categories()
    {
        $category = Category::orderByDesc('id')->get();
        return response()->json($category);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:categories,title',
            'description' => 'required'
        ]);
        Category::create([
            'title' => $request->title,
            'description' => $request->description
            ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        Category::find($request->id)->update([
            'title' => $request->title,
            'description' => $request->description
        ]);
    }

    public function delete(Request $request)
    {
        $category = Category::find($request->id);
        if(isset($category)) {
            $category->delete();
        }
        else{
            return abort('404');
        }
    }
}
