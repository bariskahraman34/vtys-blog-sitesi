@extends('layouts.app')

@section('content')
<div class="container">
  <div class="blog-container">
    <div class="img-wrapper">
      @if($blog->image != "")
      <img src="{{asset($blog->image)}}" alt="">

      @else
      <img src="https://picsum.photos/seed/picsum/800/600" alt="">

      @endif
    </div>
    <div class="badges">
      <div class="badge">
        <i class="fa-solid fa-at"></i>
        <span class="author">{{$blog->kullanici->name}}</span>
      </div>
      <div class="badge">
        <i class="fa-solid fa-calendar-days"></i>
        <span class="date-added">{{ $blog->created_at_formatted }}</span>
      </div>
    </div>
    <div class="blog-heading">
      <h2>{{$blog->blogBaslik}}</h2>
    </div>
    <div class="blog-content">
      {{$blog->blogIcerik}}
    </div>
  </div>
  <div class="blog-heading-container">
    <h3>Yorumlar</h3>
    <div class="heading-liner"></div>
  </div>
  <div class="new-comment-form-container">
      <form id="new-comment" method="POST" action="{{ url('yorum-ekle') }}">
        @csrf
        <input type="hidden" name="kullaniciId" value="{{auth()->user()->id}}" />
        <input type="hidden" name="blogId" value="{{$blog->id}}" />
        <input type="hidden" name="yorumTarihi" value="{{date('Y-m-d H:i:s')}}" />
        <input placeholder="Başlık" type="text" name="yorumBaslik" required/>
        <textarea name="yorumIcerik" id="comment" rows="1" placeholder="Yorum Bırak..." maxlength="200" required></textarea>
      <button>Ekle</button>
    </form>
  </div>
  <div class="comments-container">
    @foreach ($blog->yorumlar as $yorum)
    <div class="card">
      <div class="comment-author">
        <span class="author-image">
          <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="">
        </span>
        <span class="author-username">{{$yorum->kullanici->name}}</span>
      </div>
      <div class="comment-content">
        <div class="comment-heading" style="margin-bottom: 10px;">
          <h3>{{$yorum->yorumBaslik}}</h3>
        </div>
        {{$yorum->yorumIcerik}}
      </div>
    </div>
    @endforeach
    
  </div>
</div>
@endsection