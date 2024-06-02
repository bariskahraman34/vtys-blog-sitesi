@extends('layouts.app')

@section('content')
<div class="container">
    <div class="blog-heading-container">
        <h2>{{$title}}</h2>
        <div class="heading-liner"></div>
    </div>
    <div class="blogs-container">
        @foreach ($blogs as $blog)
        <a class="card" href="/blog/{{$blog->id}}">
            <div class="img-container">
                @if($blog->image != "")
                <img width="300" height="200" src="{{asset($blog->image)}}" alt="">

                @else
                <img src="https://picsum.photos/seed/picsum/300/200" alt="">

                @endif
            </div>
            <div class="content-heading">
                <h3>{{$blog->blogBaslik}}</h3>
            </div>
    
        </a>
        @endforeach
        
    </div>
</div>
@endsection