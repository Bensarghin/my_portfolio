@extends('backoffice.layouts.app')

@section('content')
<form class="card" action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-header">
      <p class="h5 text-muted">Add post</p>
    </div>
    <div class="card-body">
        <div class="mb-3">
          <label class="form-label">title</label>
          <input type="text" value="{{old('title')}}" class="form-control" name="title">
          @error('title') <span class="text-danger"> {{$message}} </span> @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">slug</label>
          <input type="text" value="{{old('slug')}}" class="form-control" name="slug">
          @error('slug') <span class="text-danger"> {{$message}} </span> @enderror
        </div>
        <div class="mb-3">
            <label for="image-input" class="form-label">image</label>
            <input class="form-control" name="image" accept="image/*" type="file" id="image-input">
            @error('image') <span class="text-danger"> {{$message}} </span> @enderror
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
          <textarea name="body" id="summernote">{{old('body')}}</textarea>
          @error('body') <span class="text-danger"> {{$message}} </span> @enderror
        </div>
        <div class="mb-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="0" name="draft" {{ old('draft')==='0' ?'checked':''}} id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Publier
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
                <input type="text" value="{{old('meta_title')}}" class="form-control" name="meta_title">@error('meta_title') <span class="text-danger"> {{$message}} </span> @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">meta description</label>
                <input type="text" value="{{old('meta_description')}}" class="form-control" name="meta_description">
                @error('meta_description') <span class="text-danger"> {{$message}} </span> @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">image alt</label>
                <input type="text" value="{{old('image_alt')}}" class="form-control" name="image_alt">
                @error('image_alt') <span class="text-danger"> {{$message}} </span> @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">og:title</label>
                <input type="text" value="{{old('og_title')}}" class="form-control" name="og_title">
                @error('og_title') <span class="text-danger"> {{$message}} </span> @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">og:description</label>
                <input type="text" value="{{old('og_description')}}" class="form-control" name="og_description">
                @error('og_description') <span class="text-danger"> {{$message}} </span> @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">og:image</label>
                <input type="text" value="{{old('og_image')}}" class="form-control" name="og_image">
                @error('og_image') <span class="text-danger"> {{$message}} </span> @enderror
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
@endsection