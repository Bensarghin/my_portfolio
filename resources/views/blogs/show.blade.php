@extends('layouts.master')

<!-- blog categories -->
@section('blog-category')
@foreach($blog->category as $category)
 <a href="{{route('posts.category',['category' => $category->title])}}">#{{$category->title}}</a> -
@endforeach
@endsection
@section('blog-title',$blog->title)
<!-- get met from table -->
@section('meta_description','descritoin is work')
@section('meta_title',$blog->title)
@section('content')
<div class="uk-width-1-2 uk-container">
<article class="uk-article">
    <h1 class="uk-article-title uk-text-capitalize">{{$blog->title}}</h1>

    <p class="uk-article-meta">Written by <a href="#">Bensarghin</a><span class="uk-margin-left"> <i class="fa-regular fa-clock"></i> {{$blog->updated_at->diffForHumans()}} </span></p>

    <img src="{{asset('uploads/'.$blog->image)}}">

    <p>{!!$blog->body!!}</p>

    <div class="uk-grid-small uk-child-width-auto" uk-grid>
        <div>
            <a class="uk-button uk-button-text" href="#">Read more</a>
        </div>
        <div>
            <a class="uk-button uk-button-text" href="#">5 Comments</a>
        </div>
    </div>
</article>
</div>
@endsection