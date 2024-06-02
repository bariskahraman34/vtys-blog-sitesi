<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index()
    {
        if(auth()->user()->kullaniciTipi != "ADMIN"){
            abort(403);
        }
        $kategoriler = Kategori::all();
        return view('kategoriler.index', compact('kategoriler'));
    }

    public function create()
    {
        if(auth()->user()->kullaniciTipi != "ADMIN"){
            abort(403);
        }
        return view('kategoriler.create');
    }

    public function store(Request $request)
    {
        if(auth()->user()->kullaniciTipi != "ADMIN"){
            abort(403);
        }
        Kategori::create($request->all());

        return redirect('kategoriler')
                ->with('success', 'Kategori created successfully.');
    }

    public function show(Kategori $kategori)
    {
        if(auth()->user()->kullaniciTipi != "ADMIN"){
            abort(403);
        }
        return view('kategoriler.show', compact('kategori'));
    }

    public function edit(Kategori $kategori)
    {
        if(auth()->user()->kullaniciTipi != "ADMIN"){
            abort(403);
        }
        return view('kategoriler.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        if(auth()->user()->kullaniciTipi != "ADMIN"){
            abort(403);
        }
        $kategori->update($request->all());

        return redirect()->route('kategoriler.index')
                         ->with('success', 'Kategori updated successfully.');
    }

    public function destroy(Request $request)
    {
        if(auth()->user()->kullaniciTipi != "ADMIN"){
            abort(403);
        }
        Kategori::find($request->id)->delete();

        return redirect('kategoriler')
                ->with('success', 'Kategori deleted successfully.');
    }
}
