<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\TourPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'destinations' => Destination::latest()->get(),
            'tour_packages' => TourPackage::latest()->get(),
        ]);
    }

    public function destination(Request $request)
    {
        return response()->json(['destination' => Destination::where('slug', $request->slug)->with('destination_images')->get()[0]]);
    }

    public function tour_package(Request $request)
    {
        return response()->json(['tour_package' => TourPackage::where('slug', $request->slug)->with('tour_package_images')->get()[0]]);
    }
}
