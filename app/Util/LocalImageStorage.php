<?php

//Author: Simón Flórez Silva

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\arrayHasKey;

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

    public function store($file): string {
        $user = Auth::user();
        // Files uploaded by a specific user are uploaded to a directory inside storage
        $dir = 'img/'.$user->getName().$user->getId().'/';
        $name = Auth::user()->getId().'_'.date('Y-m-d-H:i:s').'_'.uniqid().'.'.$file->extension();
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
