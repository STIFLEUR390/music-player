<?php

namespace App\Http\Controllers;

use App\Http\Resources\MusicCollection;
use App\Http\Resources\MusicResource;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Owenoj\LaravelGetId3\GetId3;
// use Image;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new MusicCollection(Music::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errors = 0;
        $count = 0;
        $upload_image = $request->file('image')->store('public/uploads/');
        $image = "" . Env("APP_URL") . "storage" . substr($upload_image, 6) . "";
        if (is_array($request->file('audio'))) {
            foreach ($request->file('audio') as $key => $audio_file) {
                $src = $audio_file->store('public/uploads/');
                $src_file = "" . Env("APP_URL") . "storage" . substr($src, 6) . "";
                $track = GetId3::fromUploadedFile($audio_file);
                // enregistrer les information audio
                $store_music = new Music;
                $store_music->artiste = $track->getArtist();
                $store_music->titre = $track->getTitle();
                $store_music->album = $track->getAlbum();
                $store_music->duree_total = $track->getPlaytime();
                $store_music->duree_total_seconde = $track->getPlaytimeSeconds();
                $illustration = "data:image/jpeg;charset=utf-8;base64,".$track->getArtwork()."";
                if($track->getArtwork()) {
                    $store_music->illustration = $illustration;
                }
                $genre = $track->getGenres();
                $store_music->genre = $genre ? $genre['0'] : 'inconue';
                $store_music->compositeur = $track->getComposer();
                $store_music->numero_album = $track->getTrackNumber();
                $store_music->copyright = $track->getCopyrightInfo();
                $store_music->format = $track->getFileFormat();
                $store_music->image = $image;
                $store_music->src = $src_file;
                $result = $store_music->save();
                $count++;
                if (!$result) {
                    $errors++;
                }
            }
        } else {
            $upload_audios = $request->file('audio')->store('public/uploads/');
            $src_file = "" . Env("APP_URL") . "storage" . substr($upload_audios, 6) . "";
            $track = GetId3::fromUploadedFile($request->file('audio'));
            // enregistrer les information audio
            $store_music = new Music;
            $store_music->artiste = $track->getArtist();
            $store_music->titre = $track->getTitle();
            $store_music->album = $track->getAlbum();
            $store_music->duree_total = $track->getPlaytime();
            $store_music->duree_total_seconde = $track->getPlaytimeSeconds();
            $illustration = "data:image/jpeg;charset=utf-8;base64,".$track->getArtwork()."";
            if($track->getArtwork()) {
                $store_music->illustration = $illustration;
            }
            $store_music->genre = $track->getGenres();
            $store_music->compositeur = $track->getComposer();
            $store_music->numero_album = $track->getTrackNumber();
            $store_music->copyright = $track->getCopyrightInfo();
            $store_music->format = $track->getFileFormat();
            $store_music->image = $image;
            $store_music->src = $src_file;
            $result = $store_music->save();
            if (!$result) {
                $errors++;
            }
        }

        if ($count == $errors) {
            return ['result' => 'Aucun des fichiers n\'a été télécharger'];
        }
        if ($count > $errors && $errors != 0) {
            return ['result' => 'Certain fichier n\'ont pas été télécharger'];
        }

        if ($count > $errors && $errors == 0) {
            return ['result' => 'Tous les fichiers on été télécharger'];
        }
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
        return new MusicResource(Music::findOrFail($id));
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
