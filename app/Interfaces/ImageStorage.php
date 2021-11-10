<?php

//Author: Simón Flórez Silva

namespace App\Interfaces;
use Illuminate\Http\Request;

interface ImageStorage {
    /**
     * @param Request $request
     * @return string with the internal name of the image in disk
     */
    public function store(Request $request): string;
}
