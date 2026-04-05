<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {

        $newsItems = News::latest()->paginate(10);

        // Return the backend news index view
        return view('pages.backend.news.index', compact('newsItems'));
    }

    public function create()
    {
        return view('pages.backend.news.create');
    }

    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // optional image
            'visibility' => 'required|in:public,hidden',
        ]);

        // Handle optional image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        // Create news record
        $news = News::create($validated);

        // Redirect back with success message
        return redirect()->route('admin.news.create')
            ->with('success', 'News published successfully!');
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)
            ->where('visibility', 'public')
            ->firstOrFail();

        return view('pages.frontend.article', compact('news'));
    }

    public function edit(News $news)
    {
        return view('pages.backend.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'visibility' => 'required|in:public,hidden',
        ]);

        // If new image uploaded
        if ($request->hasFile('image')) {

            // Delete old image if exists
            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }

            // Store new image
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        // Update news
        $news->update($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'News updated successfully!');
    }

    public function destroy(News $news)
    {
        // Delete image if exists
        if ($news->image && Storage::disk('public')->exists($news->image)) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'News deleted successfully!');
    }
}
