<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\DestinationImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DashboardDestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.destinations.index', [
            "destinations" => Destination::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.destinations.create');
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
                "slug" => "unique:destinations"
            ]);
        } while ($validator->fails());

        $uploadedImages = [];
        if ($request->file('images'))
            foreach ($request->file('images') as $image)
                $uploadedImages[] = $image->store('destination_images');


        $properDataImageGallery = array_merge($validator->validated(), $validatedForm);
        $id = (Destination::create($properDataImageGallery))->id;

        foreach ($uploadedImages as $image)
            DestinationImage::create(['destination_id' => $id, 'image' => $image]);


        return redirect('/admin/destinations')->with('success', 'Wisata berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(Destination $destination)
    {
        return view('dashboard.destinations.show', [
            'destination' => $destination
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        return view('dashboard.destinations.edit', [
            'destination' => $destination
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'body' => 'required',
            'images.*' => 'image|max:20000'
        ]);

        if ($validator->fails())
            return redirect('/admin/destinations/' . $destination->slug . '/edit')
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
                "slug" => "unique:destinations"
            ]);
            if ($slug == $destination->slug) {
                $properSlug = ['slug' => $destination->slug];
                break;
            } else $properSlug = $validator->validated();
        } while ($validator->fails());

        $uploadedImages = $request->post('destination_image_in_storage');
        if ($request->file('images'))
            foreach ($request->file('images') as $image)
                $uploadedImages[] = $image->store('destination_images');

        $properDataDestination = array_merge($properSlug, $validatedForm);
        Destination::where('id', $destination->id)
            ->update($properDataDestination);

        foreach (Destination::find($destination->id)->destination_images as $image)
            if (!in_array($image->image, $uploadedImages))
                Storage::delete($image->image);
        DestinationImage::where('destination_id', $destination->id)->delete();
        foreach ($uploadedImages as $image)
            DestinationImage::create(['destination_id' => $destination->id, 'image' => $image]);


        return redirect('/admin/destinations')->with('success', 'Wisata berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        foreach ($destination->destination_images as $image)
            Storage::delete($image->image);

        Destination::destroy($destination->id);
        return redirect('/admin/destinations')->with('success', 'Wisata berhasil dihapus!');
    }
}
