@extends('fronted.layout')

@section('content')
<div class="container px-4 py-5" id="hanging-icons">
    <h2 class="pb-2 border-bottom">All Posts </h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        @foreach ($posts as $post)
        <div class="col-4 mb-5 d-flex align-items-start">
          <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
            <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"></use></svg>
          </div>
          <div>
            <h2>{{$post->title}}</h2>
            <img src="images/{{$post->image}}" width="100px" height="100px">
            <p>{{$post->summary}}</p>
            <div>
                tags :
                @foreach ($post->tags as $tag)
                        <a class="btn btn-info btn-sm" href="{{ url('blog') }}?tag={{ $tag->id }}">#{{$tag->name}}</a>
                @endforeach
            </div>
            <br>
            <a href="{{url('blog/'.$post->id)}}" class="btn btn-primary">
              Show Post
            </a>
          </div>
        </div>
        @endforeach
    </div>
  </div>
@endsection
