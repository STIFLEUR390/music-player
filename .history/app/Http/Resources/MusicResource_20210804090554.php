<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MusicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "id" => $this->id,
            'artiste' => $this->artiste,
            'titre' => $this->titre,
            'album' => $this->album,
            'duree_total' => $this->duree_total,
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
    }
}
