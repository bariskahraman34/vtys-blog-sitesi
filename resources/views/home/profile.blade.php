@extends('layouts.app')

@section('content')

<div class="container">
  <h1>Kullanıcı Profili</h1>
  <div class="profile">
    <div class="img-container">
      @if(auth()->user()->profile_image != "")
        <img src="{{asset(auth()->user()->profile_image)}}" alt="Kullanıcı Resmi" class="profile-image">
      @else
      <img src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" alt="Kullanıcı Resmi" class="profile-image">

      @endif
    </div>
    <div class="user-container">
      <h2>{{auth()->user()->name}}</h2>
      <p><strong>Kullanıcı Tipi:</strong> {{auth()->user()->kullaniciTipi == "ADMIN" ? "Moderatör" : "Yazar"}}</p>
      <p><strong>Email:</strong> {{auth()->user()->email}}</p>
    </div>
  </div>
  <div class="tabs">
      <button class="tablink" onclick="openTab(event, 'Blogs')">Bloglar</button>
      <button class="tablink" onclick="openTab(event, 'Settings')">Ayarlar</button>
  </div>
  <div id="Blogs" class="tabcontent">
    <h3>Bloglarım</h3>
    <ul>
      @foreach (auth()->user()->bloglar as $item)
      <li>
        <a href="/blog/{{$item->id}}">{{$item->blogBaslik}}</a>
        <div class="button-container">
          <form method="POST" action="{{ url('blog-sil/'.$item->id) }}">
            @csrf
            @method('DELETE')
            <button class="remove-btn" type="submit">Kaldır</button>
          </form>
          <a class="edit-btn" href="/blog-guncelle/{{$item->id}}">Düzenle</a>
        </div>
      </li>
      @endforeach
        
    </ul>
  </div>
  <div id="Settings" class="tabcontent">
    <h3>Ayarlar</h3>
    <form method="POST" action="{{ url('profil') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="username">Kullanıcı Adı:</label>
        <input type="text" id="username" name="name" placeholder="username" value="{{auth()->user()->name}}">
        <label for="password">Şifre:</label>
        <input type="password" id="password" name="password" placeholder="******" value="">
        <label for="profile_image">Profil Resmi:</label>
        <input type="file" name="profile_image" id="profile_image" accept="image/*">
        <button type="submit">Güncelle</button>
    </form>
  </div>
</div>

@endsection

@section('css')
<link href="{{asset('css/profile-page.css')}}" rel="stylesheet" />
@endsection
@section('js')
<script src="{{asset('js/profilePage.js')}}" defer></script>
@endsection