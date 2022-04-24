<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\ImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DashboardImageGalleryController extends Controller
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
            'images.*' => 'image|max:20000'
        ]);

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

        return redirect('/admin/gallery/images')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageGallery  $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function show(ImageGallery $imageGallery)
    {
        return view('dashboard.images.show', [
            'imageGallery' => $imageGallery
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageGallery  $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageGallery $imageGallery)
    {
        return view('dashboard.images.edit', [
            'imageGallery' => $imageGallery
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImageGallery  $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageGallery $imageGallery)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
            'images.*' => 'image|max:20000'
        ]);

        if ($validator->fails()) {
            return redirect('/admin/gallery/images/'.$imageGallery->slug.'/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $validatedForm = $validator->safe()->except(['images']);

        $duplicate = 0;
        do {
            $duplicate++;
            $slug = Str::slug((($duplicate > 1) ? ($validatedForm['title'] . '-' . $duplicate) : $validatedForm['title']), '-');
            if ($slug == $imageGallery->$slug) break;
            $validator = Validator::make(["slug" => $slug], [
                "slug" => "unique:image_galleries"
            ]);
        } while ($validator->fails());

        $uploadedDataImages = $request->post('image_position');
        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $uploadedDataImages[] = $image->store('post-images');
            }
        }

        $properDataImageGallery = array_merge($validator->validated(), $validatedForm);
        ImageGallery::where('id', $imageGallery->id)
            ->update($properDataImageGallery);


        foreach (ImageGallery::find($imageGallery->id)->images as $image) {
            if (!in_array($image->image, $uploadedDataImages))
                Storage::delete($image->image);
        }
        Image::where('image_gallery_id', $imageGallery->id)->delete();
        foreach ($uploadedDataImages as $image) {
            Image::create(['image_gallery_id' => $imageGallery->id, 'image' => $image]);
        }

        return redirect('/admin/gallery/images')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageGallery  $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageGallery $imageGallery)
    {
        foreach ($imageGallery->images as $image) {
            Storage::delete($image->image);
        }
        ImageGallery::destroy($imageGallery->id);
        return redirect('/admin/gallery/images')->with('success', 'Image berhasil dihapus!');
    }
}
