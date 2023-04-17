<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::get();
        return view('banner.index',compact('banners'));
    }

    public function create()
    {
        return view('banner.create');
    }

    public function store(Request $request)
    {
        $path = Storage::disk('local')->put('public/banner', $request->banner_img);
        $path = str_replace("public","storage",$path);

        Banner::create([
            'img_path' => $path,
            'img_opacity' => $request->opacity,
            'weight'=> $request->weight,
        ]);

        return redirect('/banner');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
    }
}
