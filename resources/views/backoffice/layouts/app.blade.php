<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- google Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- {{-- select2 css --}} -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- {{-- bootstrap --}} -->
     <link href="{{asset('backoffice/css/bootstrap.min.css')}}" rel="stylesheet">
     <!-- {{-- custom file input --}} -->
     <link rel="stylesheet" type="text/css" href="{{asset('backoffice/css/demo.css')}}" />
     <!-- own style  -->
    <link href="{{asset('backoffice/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('backoffice/css/style.css')}}" rel="stylesheet">

    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
</head>
<body>
    <header style="margin-bottom:124px">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><span style="color:#ff695f;">Ben</span><span>sarghin</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a href="" class="btn btn-primary btn-sm notify"><i class="fa-solid fa-bell"></i></a>
            <div class="dropdown">
              <button class="btn btn-primary btn-sm notify dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                <i class="fa-solid fa-user"></i>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user-lock"></i> Authent</a></li>
                <li>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-unlock-keyhole"></i>{{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                </li>
              </ul>
            </div>
            <a class="btn btn-primary navbar-toggler" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
          Link with href
            </a>
          </div>
        </div>
      </div>
    </nav>
    </header>
    <div class="">
        <div class="">
            <div class="offcanvas offcanvas-start show" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
              <div class="offcanvas-header">
              </div>
              <div class="offcanvas-body">
                <ul class="list-menu">
                  <li class="list-menu-item">
                    <a class="active" href="{{route('home')}}"><i class="fa-solid fa-gauge-high"></i> <span class="pl-3">Dashboard</span></a>
                  </li>
                  <li class="list-menu-item">
                    <a href="{{route('blog.add')}}"><i class="fa-solid fa-feather"></i> <span class="pl-3">Add Post</span></a>
                  </li>
                  <li class="list-menu-item">
                    <a href="{{route('blog.index')}}"><i class="fa-solid fa-newspaper"></i> <span class="pl-3">Posts</span></a>
                  </li>
                  <li class="list-menu-item">
                    <a href="{{route('drafts')}}"><i class="fa-solid fa-paperclip"></i> <span class="pl-3">Drafts</span></a>
                  </li>
                  <li class="list-menu-item">
                    <a href="{{route('categories')}}"><i class="fa-solid fa-bars-staggered"></i> <span class="pl-3">Categories</span></a>
                  </li>
                  <li class="list-menu-item">
                    <a href="#"><i class="fa-solid fa-message"></i> <span class="pl-3">FeedBack</span></a>
                  </li>
                </ul>
              </div>
            </div>
        </div>
        <div class="container-fluid">
          <div class="col-lg-9 mx-0 ms-auto">
            <ol class="breadcrumb bg-primary py-3 px-4 ">
              <li class="breadcrumb-item "><a href="#" class="text-white text-decoration-none">Home</a></li>
              <li class="breadcrumb-item active">Library</li>
            </ol>
            @yield('content')
          </div>
        </div>
    </div>

      <!-- Scripts -->
  <script src="{{asset('backoffice/js/jquery.min.js')}}"></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
  <script src="{{asset('js/app.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/vee6b36jzk6ks8dzodr9sqxtsnegfp8i53u6wce1heovb5sx/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="{{asset('backoffice/js/main.js')}}"></script>
  <script>
    tinymce.init({
      selector: 'textarea#summernote',
      toolbar: 'fontfamily fontsize forecolor blocks bold italic underline alignleft aligncenter alignright alignjustify blockquote ',
    });
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();        
    });
  </script>
</body>
</html>