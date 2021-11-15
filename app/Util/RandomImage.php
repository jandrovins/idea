<?php

//Author: Simón Flórez Silva, Adrián Gutiérrez, Vincent A. Arcila

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Http;

class RandomImage
{
    public function genImage($type, $seed)
    {
        $response = Http::get('https://avatars.dicebear.com/api/'.$type.'/'.$seed.'.svg');
        $imageStorage = app(ImageStorage::class);
        $imageName = $imageStorage->storeSVG($response->body());

        return $imageName;
    }
}
