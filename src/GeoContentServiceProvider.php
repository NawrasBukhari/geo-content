<?php

namespace NawrasBukhari\GeoContent;

use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class GeoContentServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        Blade::directive('country', function ($methodName, $data) {
            return "<?php echo \NawrasBukhari\GeoContent\Facades\GeoContent::$methodName($data); ?>";
        });

        $package
            ->name('geo-content')
            ->publishesServiceProvider(GeoContentServiceProvider::class)
            ->hasConfigFile('geo-content');

        $this->publishes([
            __DIR__.'/../config/geo-content.php' => config_path('geo-content.php'),
        ], 'geo-content-config');
    }
}
