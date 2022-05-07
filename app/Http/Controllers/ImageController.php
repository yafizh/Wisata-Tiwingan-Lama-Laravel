<?php

namespace App\Http\Controllers;

use App\Models\ImageGallery;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return view('galery.image.index', [
            'imageGalleries' => ImageGallery::latest()->paginate(12),
            'count' => ImageGallery::all()->count()
        ]);
    }

    public function show(Request $request)
    {
        return response()->json(['imageGallery' => ImageGallery::where('slug', $request->slug)->with('images')->get()[0]]);
    }

    public function getMore(Request $request)
    {
        $response = [];
        foreach (ImageGallery::with('images')->paginate($request->paginate) as $i => $value) {
            $response[] = [
                'slug' => $value->slug,
                'title' => $value->title,
                'body' => $value->body,
                'images' => $value->images
            ];

            if($value->created_at->isToday()){
                $response[$i]['created_at'] = 'Hari ini';
            } else if ($value->created_at->isYesterday()) {
                $response[$i]['created_at'] = 'Kemarin';
            } else {
                $response[$i]['created_at'] = $value->created_at->locale('ID')->getTranslatedMonthName() . ' ' . $value->created_at->year;
            }

        }
        return response()->json(['imageGallery' => $response]);
    }
}
