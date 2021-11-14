<?php

//Author: Simón Flórez Silva

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ImageStorage
{
    /**
     * @param Request $request
     * @return string with the internal name of the image in disk
     */
    public function storeRequest(Request $request): string;

    /**
     * @param $file
     * @return string with the internal name of the image in disk
     */
    public function store($file): string;

    /**
     * @param $content of SVG file
     * @return string with the internal name of the image in disk
     */
    public function storeSVG($file): string;
}
