<?php

//Author: Simón Flórez Silva

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LocalImageStorage implements ImageStorage
{
    public function storeRequest($request): string
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            return $this->store($file);
        } else {
            return 'img/missing.jpeg';
        }
    }

    public function storeSVG($content): string
    {
        $user = Auth::user();
        if (is_null($user)) {
            $dir = 'img/general/';
        } else {
            // Files uploaded by a specific user are uploaded to a directory inside storage
            $dir = 'img/'.$user->getName().$user->getId().'/';
        }
        $name = date('Y-m-d-H:i:s').'_'.uniqid().'.svg';
        // check if user directory already exists
        if (! Storage::exists($dir)) {
            // create user directory
            Storage::makeDirectory($dir);
        }
        // Store data in local disk
        Storage::disk('public')->put($dir.$name, $content);

        return 'storage'.'/'.$dir.$name;
    }

    public function store($file): string
    {
        $user = Auth::user();
        if (is_null($user)) {
            $dir = 'img/general/';
        } else {
            // Files uploaded by a specific user are uploaded to a directory inside storage
            $dir = 'img/'.$user->getName().$user->getId().'/';
        }
        $name = date('Y-m-d-H:i:s').'_'.uniqid().'.'.$file->extension();
        // check if user directory already exists
        if (! Storage::exists($dir)) {
            // create user directory
            Storage::makeDirectory($dir);
        }
        // Store data in local disk
        Storage::disk('public')->put($dir.$name, $file->get());

        return 'storage'.'/'.$dir.$name;
    }
}
