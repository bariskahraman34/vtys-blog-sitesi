<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog Sitesi</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <script src="{{asset('js/app.js')}}" defer></script>
    @yield('css')
    @yield('js')
</head>
<body>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <div id="app">
        <div class="header-wrapper">
            <header class="header">
              <div class="heading">
                <a href="/">
                  <h2>Blog Sitesi</h2>
                </a>
              </div>
              <ul class="nav-items">
                <li class="nav-item">
                  <a href="/" class="link">Tüm Bloglar</a>
                </li>
                {{-- @foreach($topCategories as $category)
                    <li class="nav-item"><a class="link" href="{{url('/?kategori='.$category->id)}}">{{ $category->kategoriAdi }}</a></li>
                @endforeach --}}
                @foreach($topCategories as $category)
                <li class="nav-item">
                    <a class="link" href="{{ url('/?kategori='.$category->id) }}">
                        {{ $category->kategoriAdi }} ({{ $category->bloglar_count }})
                    </a>
                </li>
                @endforeach
              </ul>
              <div class="user-container">
                <a href="#" class="user-profile"><i class="fa-solid fa-user"></i></a>

                <ul class="user-operations-list">
                    @guest
                    <li>
                        <a href="{{ route('login') }}" id="login-btn">
                          Giriş Yap
                        </a>
                      </li>
                        @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">Kayıt Ol</a>
                        </li>
                        @endif
                    @else
                    <li>
                        <span class="user-name">
                            {{ Auth::user()->name }}
                        </span>
                      </li>
                      <li>
                        <a href="{{url('profil')}}" id="profile-btn">
                          Profile Git
                        </a>
                      </li>
                      <li>
                        <a href="{{url('blog-ekle')}}" id="add-blog-btn">
                          Blog Ekle
                        </a>
                      </li>
                      @if(Auth::user()->kullaniciTipi == "ADMIN")
                      <li>
                        <a href="{{url('kategoriler')}}">
                          Kategori Ekle
                        </a>
                      </li>
                      @endif
                      <li>
                        <a href="#" class="quit-btn" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                          Çıkış Yap
                        </a>
                      </li>
                    @endguest
                  
                </ul>
              </div>
            </header>
          </div>
          @yield('content')
    </div>
</body>
</html>
