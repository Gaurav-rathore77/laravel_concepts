<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

public function create()
{
    return view('admin.pages.create');
}


    // public function store(Request $request)
    // {
    //     Page::create($request->all());
    //     return redirect()->route('pages.index');
    // }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required'
    ]);

    Page::create($request->only('title', 'content'));

    return redirect()->route('pages.index');
}

    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $page = Page::find($id);
        $page->update($request->all());
        return redirect()->route('pages.index');
    }

    public function destroy($id)
    {
        Page::destroy($id);
        return redirect()->route('pages.index');
    }
}
