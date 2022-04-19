<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return view('galery.image.index', [
            'images' => Image::all()
        ]);
    }
}
