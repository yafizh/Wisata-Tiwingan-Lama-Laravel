<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'destinations' => Destination::all()
        ]);
    }

    public function destination(Request $request)
    {
        return response()->json(['destination' => Destination::where('slug', $request->slug)->with('destination_images')->get()[0]]);
    }
}
