@extends('layouts.master')
@section('content')
@section('cover-primary')
    <div class="uk-section uk-light">
        <div class="uk-container">

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>

            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>

        </div>
    </div>
@endsection
	<div class="heading">
		<div class="twelve mb-4">
		  <h1>Top Posts</h1>
		</div>
	</div>
	<div class="uk-container">
		<div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-1@s uk-text-center" uk-grid>
		@foreach($blogs as $blog)
		<div>
			<div class="uk-margin">
				<div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
				    <div class="uk-card-media-left uk-cover-container">
				        <img src="{{asset('uploads/'.$blog->image)}}" alt="" uk-cover>
				        <canvas width="600" height="400"></canvas>
				    </div>
				    <div>
				        <div class="uk-card-body uk-align-left">
				        	<span class="uk-badge">Edited ( {{$blog->updated_at->diffForHumans()}} )</span>
				            <h3 class="uk-card-title">{{Str::limit($blog->title,53)}}</h3>
				            <div class="blog-body">{!!Str::limit($blog->body,253)!!}</div>
							<div class="uk-container uk-margin-auto">
								<div class="uk-width-1-2 ">
									<a href="{{route('posts.slug',['slug' => $blog->slug])}}" class="">
										Read More ... </a>
								</div>
							</div>
				        </div>
				    </div>
				</div>
			</div>
		</div>
		<hr class="uk-divider-icon">
		@endforeach
		</div>
	</div>
	<div class="uk-container uk-margin-auto">
		<div class="uk-width-1-2 ">
		{{$blogs->links()}}
		</div>
	</div>
@endsection