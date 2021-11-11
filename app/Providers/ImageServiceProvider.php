<?php

//Author: Simón Flórez Silva

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ImageStorage;
use App\Util\LocalImageStorage;

class ImageServiceProvider extends ServiceProvider {
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
