<?php

namespace NawrasBukhari\GeoContent;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class GeoContentServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('geo-content')
            ->publishesServiceProvider(GeoContentServiceProvider::class);

        $this->publishes([
            __DIR__.'/../config/geo-content.php' => config_path('geo-content.php'),
        ], 'geo-content-config');
    }
}
