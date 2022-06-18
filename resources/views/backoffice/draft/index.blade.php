@extends('backoffice.layouts.app')

@section('content')
@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
		<strong>Post Published</strong>
	</div>
@endif
<div class="card mt-4">
	<div class="card-header">
		<div class="row">
			<div class="col-4 me-auto">
				<p class="my-3 h5 text-muted">Draft List</p>
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
			@foreach($drafts as $draft)
			<tr>
				<td>{{$draft->title}}</td>
				<td>{{$draft->created_at->diffForHumans()}}</td>
				<td>{{$draft->updated_at->diffForHumans()}}</td>
				<td>
					<a href="{{route('blog.publish',['id' => $draft->id])}}" class="text-secondary px-1"><i class="fa-solid fa-paper-plane" data-toggle="tooltip" data-placement="top" title="publish"></i> </a> | 
				<a href="{{route('blog.edit',['blog' => $draft])}}" class="text-info px-1">
					<i class="fa-solid fa-pen-to-square"></i></a> | 
				<a href="" class="text-warning px-1" onclick="return confirm('Vous etes sure');" href="{{route('blog.delete',['id'=>$draft->id])}}">
					<i class="fa-solid fa-xmark"></i></a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
@endsection