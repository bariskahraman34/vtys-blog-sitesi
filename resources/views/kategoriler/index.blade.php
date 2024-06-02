@extends('layouts.app')

@section('content')
<div class="container categories-list">
  <div class="heading-container">
    <h2>Kategori İşlemleri</h2>
  </div>
  <div class="blog-heading-container">
    <h3>Kategori Ekle</h3>
    <div class="heading-liner"></div>
  </div>
  <form method="POST" action="{{ url('kategori-ekle') }}">
    @csrf
    <label for="category-name">Kategori Adı:</label>
    <input type="text" id="category-name" name="kategoriAdi" required>
    <button type="submit">Ekle</button>
  </form>

  <div class="categories-container">
    <div class="blog-heading-container">
      <h3>Kategoriler</h3>
      <div class="heading-liner"></div>
    </div>
    <ul class="categories-list">
      @foreach ($kategoriler as $item)
      <li class="category-item">
        <form method="POST" action="{{ url('kategori-sil/'.$item->id) }}">
          @csrf
          @method('DELETE')
          <span>{{$item->kategoriAdi}}</span>
          <button type="submit" class="remove-category">Kaldır</button>
        </form>
      </li>
      @endforeach
    </ul>
  </div>
</div>
@endsection