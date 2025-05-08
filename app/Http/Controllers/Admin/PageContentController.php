<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;

class PageContentController extends Controller
{
    public function index()
    {
        $contents = PageContent::whereNotIn('page', ['images'])->get();
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

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Store the file in the public disk under images/content
            $path = $file->storeAs('images/content', $fileName, 'public');

            // Find existing image record or create new one
            $pageContent = PageContent::updateOrCreate(
                [
                    'page' => 'images',
                    'section' => $request->section
                ],
                [
                    'content' => json_encode([
                        'path' => $path,
                        'url' => asset('storage/' . $path)
                    ])
                ]
            );

            return response()->json([
                'url' => asset('storage/' . $path)
            ]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
