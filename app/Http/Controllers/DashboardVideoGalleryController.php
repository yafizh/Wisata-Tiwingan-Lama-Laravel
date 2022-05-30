<?php

namespace App\Http\Controllers;

use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class DashboardVideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.video.index', [
            "videos" => VideoGallery::where('title', 'like', '%'.request('search').'%')->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.video.create');
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
            'video' => 'required'
        ]);

        // get video id
        parse_str(parse_url($request->get('video'), PHP_URL_QUERY), $videoId);

        // Creating slug
        $duplicate = 0;
        do {
            $duplicate++;
            $slug = Str::slug((($duplicate > 1) ? ($validatedForm['title'] . '-' . $duplicate) : $validatedForm['title']), '-');
            $validator = Validator::make(["slug" => $slug], [
                "slug" => "unique:video_galleries"
            ]);
        } while ($validator->fails());

        $validatedForm['video'] = $videoId['v'];
        $properDataVideoGallery = array_merge($validator->validated(), $validatedForm);
        VideoGallery::create($properDataVideoGallery);

        return redirect('/admin/gallery/videos')->with('success', ['message' => 'Galeri Video berhasil ditambahkan!', 'slug' => $slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function show(VideoGallery $videoGallery)
    {
        return view('dashboard.video.show', [
            'videoGallery' => $videoGallery
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoGallery $videoGallery)
    {
        return view('dashboard.video.edit', [
            'videoGallery' => $videoGallery
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoGallery $videoGallery)
    {
        $validatedForm = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'video' => 'required'
        ]);

        // get video id
        parse_str(parse_url($request->get('video'), PHP_URL_QUERY), $videoId);

        // Creating slug
        $duplicate = 0;
        do {
            $duplicate++;
            $slug = Str::slug((($duplicate > 1) ? ($validatedForm['title'] . '-' . $duplicate) : $validatedForm['title']), '-');
            if ($slug == $videoGallery->$slug) break;
            $validator = Validator::make(["slug" => $slug], [
                "slug" => "unique:video_galleries"
            ]);
        } while ($validator->fails());

        $validatedForm['video'] = $videoId['v'];
        $properDataVideoGallery = array_merge($validator->validated(), $validatedForm);
        VideoGallery::where('id', $videoGallery->id)
        ->update($properDataVideoGallery);

        return redirect('/admin/gallery/videos')->with('success', ['message' => 'Galeri Video berhasil diubah!', 'slug' => $slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoGallery $videoGallery)
    {
        VideoGallery::destroy($videoGallery->id);
        return redirect('/admin/gallery/videos')->with('success', ['message' => 'Galeri Video berhasil dihapus!']);
    }

    public function youtube_parser($url)
    {
        $regExp = "/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/";
        $match = preg_match($regExp, $url);

        dd($match);
        return ($match && count($match[7]) == 11) ? $match[7] : false;
    }
}
