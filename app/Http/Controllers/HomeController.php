<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Kategori;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $title = 'Tüm Bloglar';

        $blogs = Blog::where('aktif', true);

        if($request->kategori != null && $request->kategori != ''){
            $kategori = Kategori::find($request->kategori);
            $title = $kategori->kategoriAdi;
            $blogs = $blogs->where('kategoriId', $kategori->id);
        }

        $blogs = $blogs->get();

        return view('home.index', compact('blogs', 'title'));
    }

    public function blogView($id){
        $blog = Blog::where('aktif', true)->where('id', $id)->first();

        if($blog == null){
            return abort(404);
        }

        return view('blogs.blogView', compact('blog'));
    }

    public function profile(){
        return view('home.profile');
    }

    public function profileUpdate(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'profile_image' => 'nullable|max:4096', // Maksimum 2MB boyutunda bir resim dosyası
        ]);

        // Kullanıcıyı bul
        $user = User::find(auth()->user()->id);

        // Name güncelle
        $user->name = $request->name;

        // Password güncelle (eğer verilmişse)
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Profil resmi güncelle (eğer verilmişse)
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $user->profile_image = 'images/' . $imageName;
        }

        // Veritabanına kaydet
        $user->save();

        return redirect('profil')->with('success', 'Profil güncellendi.');
    }
}
