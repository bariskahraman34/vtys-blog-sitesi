<?php

namespace App\Http\Controllers;

use App\Models\Yorum;
use Illuminate\Http\Request;

class YorumController extends Controller
{
    public function index()
    {
        $yorumlar = Yorum::all();
        return view('yorumlar.index', compact('yorumlar'));
    }

    public function create()
    {
        return view('yorumlar.create');
    }

    public function store(Request $request)
    {
        Yorum::create($request->all());

        return redirect()->back()
                         ->with('success', 'Yorum created successfully.');
    }

    public function show(Yorum $yorum)
    {
        return view('yorumlar.show', compact('yorum'));
    }

    public function edit(Yorum $yorum)
    {
        return view('yorumlar.edit', compact('yorum'));
    }

    public function update(Request $request, Yorum $yorum)
    {
        $yorum->update($request->all());

        return redirect()->route('yorumlar.index')
                         ->with('success', 'Yorum updated successfully.');
    }

    public function destroy(Yorum $yorum)
    {
        $yorum->delete();

        return redirect()->route('yorumlar.index')
                         ->with('success', 'Yorum deleted successfully.');
    }
}
