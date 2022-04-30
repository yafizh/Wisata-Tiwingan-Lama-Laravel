<?php

namespace App\Http\Controllers;

use App\Models\ImageGallery;
use Carbon\Carbon;
use Carbon\Language;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return view('galery.image.index', [
            'imageGalleries' => ImageGallery::paginate(24)
        ]);
    }

    public function show(Request $request)
    {
        return response()->json(['imageGallery' => ImageGallery::where('slug', $request->slug)->with('images')->get()[0]]);
    }
}
