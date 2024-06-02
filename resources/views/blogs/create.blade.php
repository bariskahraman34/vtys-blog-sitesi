@extends('layouts.app')

@section('content')
<div class="container">
  <div class="heading-container">
    <h2>Yeni Blog Yazısı</h2>
  </div>

  <form id="new-blog-form" method="POST" action="{{ url('blog-ekle') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="kullaniciId" value="{{auth()->user()->id}}" />
    <label for="title">Başlık:</label>
    <input type="text" id="title" name="blogBaslik" required>

    <label for="content">İçerik:</label>
    <textarea id="content" name="blogIcerik" required></textarea>

    <label for="category">Kategori:</label>
    <select id="category" name="kategoriId" required>
      <option selected disabled hidden value="">Kategori Seçin</option>
      @foreach ($kategoriler as $item)
      <option value="{{$item->id}}">{{$item->kategoriAdi}}</option>
      @endforeach
    </select>

    <label for="tags">Etiketler (virgülle ayırın):</label>
    <input type="text" id="tags" name="etiketler">
    <label for="image">Kapak Resmi:</label>
    <input type="file" name="image" id="image" accept="image/*">
    <button type="submit">Ekle</button>
  </form>
</div>
@endsection