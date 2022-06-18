@extends('backoffice.layouts.app')

@section('content')
@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
		<strong>Post drafted</strong>
	</div>
@endif
<div class="card mt-4">
	<div class="card-header">
		<div class="row">
			<div class="col-4 me-auto">
				<p class="my-3 h5 text-muted">Post List</p>
			</div>
			<div class="col-4">
				<a href="{{route('blog.add')}}" class="btn btn-primary float-end">Add Post</a>
			</div>
		</div>
	</div>
  <div class="card-body">
	<div class="table-responsive">
		<table class="table align-items-center mb-0 text-center">
      <tr>
        <th class="text-uppercase text-muted thead">title</th>
        <th class="text-uppercase text-muted thead">posted at</th>
        <th class="text-uppercase text-muted thead">last updat</th>
        <th class="text-uppercase text-muted thead">Action</th>
      </tr>
				@foreach($blogs as $blog)
			<tr>
				<td>{{$blog->title}}</td>
				<td>{{$blog->created_at->diffForHumans()}}</td>
				<td>{{$blog->updated_at->diffForHumans()}}</td>
				<td>
					<a href="{{route('blog.publish',['id' => $blog->id])}}" class="text-secondary px-1" data-toggle="tooltip" data-placement="top" title="draft"><i class="fa-solid fa-paperclip"></i> </a> | 
				<a href="{{route('blog.edit',['blog' => $blog])}}" class="text-info px-1">
					<i class="fa-solid fa-pen-to-square"></i></a> | 
				<a onclick="return confirm('Vous etes sure');" href="{{route('blog.delete',['id'=>$blog->id])}}" class="text-warning px-1">
					<i class="fa-solid fa-xmark"></i></a>
				</td>
			</tr>
			@endforeach
		</table>
		<div class="mt-3">
			{{$blogs->links('pagination::bootstrap-5')}}
		</div>
	</div>
</div>
@endsection