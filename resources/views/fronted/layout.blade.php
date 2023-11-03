<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/fronted/css/bootstrap.css')}}">
    <title>Document</title>
</head>
<body>
    {{-- navbar --}}
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{url('/blog')}}">BLOG</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/blog')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li> --}}
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Categories
              </a>
              <div class="dropdown-menu">
                <div class="dropdown-divider"></div>
                @foreach ($categories as $category)
                <a class="dropdown-item" href="{{ url('blog') }}?category={{ $category->id }}">{{$category->name}}</a>
                <div class="dropdown-divider"></div>
                @endforeach

              </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                  Tags
                </a>
                <div class="dropdown-menu">
                <div class="dropdown-divider"></div>
                    @foreach ($tags as $tag)
                    <a class="dropdown-item" href="{{ url('blog') }}?tag={{ $tag->id }}">{{$tag->name}}</a>
                    <div class="dropdown-divider"></div>
                    @endforeach
                </div>
            </li>

          </ul>
          {{-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form> --}}
        </div>
      </nav>
      {{-- end navbar --}}
      <main>
        @yield('content')
      </main>





    <script src="{{asset('assets/fronted/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/fronted/js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('assets/fronted/js/bootstrap.js')}}"></script>
</body>
</html>
