<?php

namespace App\Http\Controllers;

use App\Models\VideoGallery;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        return view('galery.video.index', [
            'videoGalleries' => VideoGallery::latest()->paginate(12),
            'count' => VideoGallery::all()->count()
        ]);
    }

    public function show(Request $request)
    {
        return response()->json(['videoGallery' => VideoGallery::where('slug', $request->slug)->get()[0]]);
    }

    public function getMore(Request $request)
    {
        $response = [];
        foreach (VideoGallery::paginate($request->paginate) as $i => $value) {
            $response[] = [
                'slug' => $value->slug,
                'title' => $value->title,
                'body' => $value->body,
                'video' => $value->video,
            ];

            if($value->created_at->isToday()){
                $response[$i]['created_at'] = 'Hari ini';
            } else if ($value->created_at->isYesterday()) {
                $response[$i]['created_at'] = 'Kemarin';
            } else {
                $response[$i]['created_at'] = $value->created_at->locale('ID')->getTranslatedMonthName() . ' ' . $value->created_at->year;
            }

        }
        return response()->json(['videoGallery' => $response]);
    }
}
