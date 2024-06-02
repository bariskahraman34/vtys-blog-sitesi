@extends('layouts.app')

@section('content')
<div class="container">
  <div class="heading-container">
    <h2>Blog Düzenle</h2>
  </div>

  <form id="new-blog-form" method="POST" action="{{ url('blog-guncelle/'.$blog->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="kullaniciId" value="{{auth()->user()->id}}" />
    <label for="title">Başlık:</label>
    <input type="text" id="title" name="blogBaslik" value="{{$blog->blogBaslik}}" required>

    <label for="content">İçerik:</label>
    <textarea id="content" name="blogIcerik" required>{{$blog->blogIcerik}}</textarea>

    <label for="category">Kategori:</label>
    <select id="category" name="kategoriId" value="{{$blog->kategoriId}}" required>
      @foreach ($kategoriler as $item)
      <option value="{{$item->id}}">{{$item->kategoriAdi}}</option>
      @endforeach
    </select>

    <label for="tags">Etiketler (virgülle ayırın):</label>
    <input type="text" id="tags" name="etiketler" value="{{$blog->etiketler}}">
    <label for="image">Kapak Resmi:</label>
    <input type="file" name="image" id="image" accept="image/*">
    <button type="submit">Kaydet</button>
  </form>
</div>
@endsection