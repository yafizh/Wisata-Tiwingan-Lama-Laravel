<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\ImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class DashboardImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.images.index', [
            "images" => ImageGallery::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedForm = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'images.*' => 'file|image|required'
        ]);

        // Generate Unique Identifier and check it in database
        $duplicate = 0;
        do {
            $duplicate++;
            $slug = Str::slug((($duplicate > 1) ? ($validatedForm['title'] . '-' . $duplicate) : $validatedForm['title']), '-');
            $validator = Validator::make(["slug" => $slug], [
                "slug" => "unique:image_galleries"
            ]);
        } while ($validator->fails());

        $uploadedDataImages = [];
        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $uploadedDataImages[] = $image->store('post-images');
            }
        }

        $properDataImageGallery = array_merge($validator->validated(), $validatedForm);
        $id = (ImageGallery::create($properDataImageGallery))->id;

        foreach ($uploadedDataImages as $image) {
            Image::create(['image_gallery_id' => $id, 'image' => $image]);
        }

        return redirect('/admin/images')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
