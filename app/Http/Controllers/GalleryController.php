<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\MediaCategory;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function showImageCategories()
    {
        $images = Media::with(['category'])->image()->get();
        $categories = $images->pluck('category')->unique();

        return view('gallery-image-categories', compact('categories'));
    }

    public function showImages(MediaCategory $category)
    {
        $images = Media::image()
            ->active()
            ->where('category_id', $category->id)
            ->get();

        return view('gallery-images', compact('images', 'category'));
    }
}