<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;
use Owenoj\LaravelGetId3\GetId3;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $upload_audios= [];
        $upload_image = $request->file('image')->store('public/uploads/');
        // if (is_array($request->file('audio'))){
        //     foreach ($request->file('audio') as $key => $audio_file) {
        //         $src = $audio_file->store('public/uploads/');
        //         $src_file = substr($src, );
        //     }

        // }
        // else {
        //     $upload_audios = $request->file('audio')->store('public/uploads/');
        // }

        // $track = GetId3::fromUploadedFile(request()->file('audio'));
        // $result = $track->getArtist();

        return ["result" => $upload_image];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
