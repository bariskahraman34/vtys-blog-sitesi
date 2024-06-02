<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        $kategoriler = Kategori::where('aktif', true)->get();
        return view('blogs.create', compact('kategoriler'));
    }

    public function store(Request $request)
    {
        $blog = Blog::create($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $blog->image = 'images/' . $imageName;
            $blog->save();
        }

        return redirect('/blog/'.$blog->id)
                         ->with('success', 'Blog created successfully.');
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    public function edit($id){
        $blog = Blog::where('id', $id)->first();
        $kategoriler = Kategori::where('aktif', true)->get();


        if($blog == null){
            return abort(404);
        }

        return view('blogs.edit', compact('blog', 'kategoriler'));
    }

    public function update(Request $request)
    {
        $blog = Blog::where('id', $request->id)->first();
        $blog->update($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $blog->image = 'images/' . $imageName;
            $blog->save();
        }

        return redirect('/blog/'.$blog->id)
                ->with('success', 'Blog updated successfully.');
    }

    public function destroy(Request $request)
    {
        Blog::find($request->id)->delete();

        return redirect('/profil')
                ->with('success', 'Kategori deleted successfully.');
    }
}
