<?php

namespace App\Http\Resources;

// use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

// class MusicCollection extends ResourceCollection
class MusicCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        /*
        $dureetotal = explode(":", $this->duree_total);
        if (strlen($dureetotal[0]) == 1) {
            $dureetotal[0] = "0".$dureetotal[0];
        }

        if (strlen($dureetotal[1]) == 1) {
            $dureetotal[1] = "0".$dureetotal[1];
        }
        $duree = $dureetotal[0].":".$dureetotal[1];
        return [
            "id" => $this->id,
            'artiste' => $this->artiste,
            'titre' => $this->titre,
            'album' => $this->album,
            'duree_total' => $duree,
            'duree_total_seconde' => $this->duree_total_seconde,
            'illustration' => $this->illustration,
            'genre' => $this->genre,
            'compositeur' => $this->compositeur,
            'numero_album' => $this->numero_album,
            'copyright' => $this->copyright,
            'format' => $this->format,
            'image' => $this->image,
            'src' => $this->src,
        ];
        */
        return [
            'data' => $this->collection,
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
