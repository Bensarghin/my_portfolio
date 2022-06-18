@extends('backoffice.layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    <p class="h5 text-muted">Edit post</p>
  </div>
  <div class="card-body">
  <form action="{{route('blog.update',['blog' => $blog])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="form-label">title</label>
      <input type="text" value="{{$blog->title}}" class="form-control" name="title">
    </div>
    <div class="mb-3 m-auto" style="width: 350px;">
        <label for="image" class="form-label">image</label><br>
        <img src="{{asset('backoffice/img/image-default.png')}}" id="output" width="350" height="250"  class="img-thumbnail">
        <input class="form-control" name="image" accept="image/*" type="file" onchange="loadFile(event)">
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Categories</label>
      <select class="js-example-basic-multiple form-control" name="categories[]" multiple="multiple">
        @foreach ($categories as $category)
        <option value="{{$category->id}}" {{in_array($category->id, old('categories',[]))?'selected':''}}>{{$category->title}}</option>
        @endforeach
      </select>
      @error('categories') <span class="text-danger"> {{$message}} </span> @enderror
    </div>
    <div class="mb-3">
    <textarea name="body" id="summernote">{{$blog->body}}</textarea>
    </div>
        <div class="mb-3">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="0" name="draft" id="flexCheckDefault" {{$blog->draft=='0'?'checked':''}}>
        <label class="form-check-label" for="flexCheckDefault">
          Publish
        </label>
        @error('draft') <span class="text-danger"> {{$message}} </span> @enderror
      </div>
    </div>
  <hr>
  <div class="accordion mb-3" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
          SEO
        </button>
      </h2>
      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <div class="mb-3">
            <label class="form-label">head title</label>
            <input type="text" value="{{old('meta_title')}}" class="form-control" name="meta_title">
          </div>
          <div class="mb-3">
            <label class="form-label">meta description</label>
            <input type="text" value="{{old('meta_description')}}" class="form-control" name="meta_description">
          </div>
          <div class="mb-3">
            <label class="form-label">meta keywords</label>
            <input type="text" value="{{old('meta_keywords')}}" class="form-control" name="meta_keywords">
          </div>
          <div class="mb-3">
            <label class="form-label">image alt</label>
            <input type="text" value="{{old('image_alt')}}" class="form-control" name="image_alt">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>
</div>
@endsection