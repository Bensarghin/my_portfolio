<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('meta_title','bensarghin')</title>
        <meta name="description" content="@yield('meta_description')">
        <meta name="robots" content="index, follow">

        <!-- ############ open graph ############ -->
        <meta property="og:title" content="Colby Fayock - A UX Designer &amp; Front-end Developer Blog" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="/static/website-social-card-44070c4a901df708aa1563ac4bbe595a.jpg" />
        <meta property="og:url" content="https://www.colbyfayock.com" />
        <meta property="og:description" content="description" />

        <!-- ############ styles ############ -->
        <link rel="stylesheet" href="{{asset('assets/css/uikit.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}" />

    </head>
    <body>
        <div class="uk-section-primary uk-preserve-color">

            <div uk-sticky="start: 200; animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light">
                <nav class="uk-navbar-container">
                    <div class="uk-container uk-container-expand">
                        <div uk-navbar>
                            <ul class="uk-navbar-nav">
                                <li class="uk-active">
                                    <a href="#offcanvas-usage" uk-toggle uk-navbar-toggle-icon></a>
                                </li>
                                <li>
                                    <a href="{{route('posts')}}">Bensarghin</a>
                                </li>
                                <li><a href="#">Item</a>
                                    <div class="uk-navbar-dropdown">
                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                            <li class="uk-active"><a href="#">Active</a></li>
                                            <li><a href="#">Item</a></li>
                                            <li><a href="#">Item</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <div class="uk-navbar-right">
                                <div class="">
                                    <form class="uk-search uk-search-default">
                                        <span uk-search-icon></span>
                                        <input class="uk-search-input" type="search" placeholder="Search">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            @yield('cover-primary')
            <div id="offcanvas-usage" uk-offcanvas>
                <div class="uk-offcanvas-bar">

                    <button class="uk-offcanvas-close" type="button" uk-close></button>

                    <h3>Title</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                </div>
            </div>
        </div>

        <div class="uk-padding-small">
          <ul class="uk-breadcrumb">
            <li><a href="{{route('posts')}}">Home</a></li>
            <li><span>@yield('blog-title')</span></li>
            <li>@yield('blog-category')</li>
          </ul>
          <hr>
        </div>