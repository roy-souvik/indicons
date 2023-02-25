<?php

namespace App\Http\Controllers;

use App\Models\MediaCategory;
use Illuminate\Http\Request;

class MediaCategoryController extends Controller
{
    public function index()
    {
        $mediaCategories = MediaCategory::all();

        return view('admin.media_categories.index', compact('mediaCategories'));
    }

    public function create()
    {
        return view('admin.media_categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        MediaCategory::create($validatedData);

        return redirect()->route('media-categories.index')
            ->with('success', 'Media category created successfully.');
    }

    public function edit(MediaCategory $mediaCategory)
    {
        return view('admin.media_categories.edit', compact('mediaCategory'));
    }

    public function update(Request $request, MediaCategory $mediaCategory)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        $mediaCategory->update($validatedData);

        return redirect()->route('admin.media_categories.index')
            ->with('success', 'Media category updated successfully.');
    }

    public function destroy(MediaCategory $mediaCategory)
    {
        $mediaCategory->delete();

        return redirect()->route('media-categories.index')
            ->with('success', 'Media category deleted successfully.');
    }
}
