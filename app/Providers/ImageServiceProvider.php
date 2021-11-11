<?php

//Author: Simón Flórez Silva

namespace App\Providers;

use App\Interfaces\ImageStorage;
use App\Util\LocalImageStorage;
use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider
{
    /**
     * Register any application serivices.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ImageStorage::class, function () {
            return new LocalImageStorage();
        });
    }
}
