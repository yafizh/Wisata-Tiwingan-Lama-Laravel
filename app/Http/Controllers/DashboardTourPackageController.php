<?php

namespace App\Http\Controllers;

use App\Models\TourPackage;
use App\Models\TourPackageImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DashboardTourPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.tour_packages.index', [
            "tour_packages" => TourPackage::where('name', 'like', '%'.request('search').'%')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tour_packages.create');
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
            'name' => 'required',
            'body' => 'required',
            'images.*' => 'image|max:20000'
        ]);

        // Creating slug
        $duplicate = 0;
        do {
            $duplicate++;
            $slug = Str::slug((($duplicate > 1) ? ($validatedForm['name'] . '-' . $duplicate) : $validatedForm['name']), '-');
            $validator = Validator::make(["slug" => $slug], [
                "slug" => "unique:tour_packages"
            ]);
        } while ($validator->fails());

        $uploadedImages = [];
        if ($request->file('images'))
            foreach ($request->file('images') as $image)
                $uploadedImages[] = $image->store('tour_package_images');


        $properDataImageGallery = array_merge($validator->validated(), $validatedForm);
        $id = (TourPackage::create($properDataImageGallery))->id;

        foreach ($uploadedImages as $image)
            TourPackageImage::create(['tour_package_id' => $id, 'image' => $image]);


        return redirect('/admin/tour-packages')->with('success', 'Paket Wisata berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TourPackage  $tourPackage
     * @return \Illuminate\Http\Response
     */
    public function show(TourPackage $tourPackage)
    {
        return view('dashboard.tour_packages.show', [
            'tour_package' => $tourPackage
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TourPackage  $tourPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(TourPackage $tourPackage)
    {
        return view('dashboard.tour_packages.edit', [
            'tour_package' => $tourPackage
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TourPackage  $tourPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TourPackage $tourPackage)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'body' => 'required',
            'images.*' => 'image|max:20000'
        ]);

        if ($validator->fails())
            return redirect('/admin/tour-packages/' . $tourPackage->slug . '/edit')
                ->withErrors($validator)
                ->withInput();

        $validatedForm = $validator->safe()->except(['images']);

        // Creating slug and checking with old slug
        $duplicate = 0;
        $properSlug = '';
        do {
            $duplicate++;
            $slug = Str::slug((($duplicate > 1) ? ($validatedForm['name'] . '-' . $duplicate) : $validatedForm['name']), '-');
            $validator = Validator::make(["slug" => $slug], [
                "slug" => "unique:tour_packages"
            ]);
            if ($slug == $tourPackage->slug) {
                $properSlug = ['slug' => $tourPackage->slug];
                break;
            } else $properSlug = $validator->validated();
        } while ($validator->fails());

        $uploadedImages = $request->post('tour_package_image_in_storage');
        if ($request->file('images'))
            foreach ($request->file('images') as $image)
                $uploadedImages[] = $image->store('tour_package_images');

        $properDataTourPackage = array_merge($properSlug, $validatedForm);
        TourPackage::where('id', $tourPackage->id)
            ->update($properDataTourPackage);

        foreach (TourPackage::find($tourPackage->id)->tour_package_images as $image)
            if (!in_array($image->image, $uploadedImages))
                Storage::delete($image->image);
        TourPackageImage::where('tour_package_id', $tourPackage->id)->delete();
        foreach ($uploadedImages as $image)
            TourPackageImage::create(['tour_package_id' => $tourPackage->id, 'image' => $image]);


        return redirect('/admin/tour-packages')->with('success', 'Paket WIsata berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TourPackage  $tourPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(TourPackage $tourPackage)
    {
        foreach ($tourPackage->tour_package_images as $image)
            Storage::delete($image->image);

        TourPackage::destroy($tourPackage->id);
        return redirect('/admin/tour-packages')->with('success', 'Paket Wisata berhasil dihapus!');
    }
}
