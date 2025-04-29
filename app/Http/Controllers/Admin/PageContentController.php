<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;

class PageContentController extends Controller
{
    public function index()
    {
        $contents = PageContent::all();
        return view('pages.admin.contents.index', compact('contents'));
    }

    public function edit($id)
    {
        $content = PageContent::findOrFail($id);
        return view('pages.admin.contents.edit', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $content = PageContent::findOrFail($id);
        $content->update([
            'content' => $request->content
        ]);

        return redirect()->route('admin.contents.index')
            ->with('success', 'Content updated successfully');
    }
}
