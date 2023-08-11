# Laravel Geo-Content Package

---
The Laravel Geo-Content package provides a convenient way to fetch geolocation information using the FreeIPAPI service. This package is designed to retrieve geolocation data for IP addresses, including details such as country name, country code, continent, and more.

## Installation
```bash
composer require nawrasbukhari/geo-content
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="geo-content-config"
```

This is the contents of the published config file:

```php
return [
    'freeipapi_base_url' => env('FREEIPAPI_BASE_URL', 'https://freeipapi.com/api/json/'),
    'freeipapi_key' => env('FREEIPAPI_KEY'),
    'freeipapi_ssl' => env('FREEIPAPI_SSL', false),
    'timeout' => env('FREEIPAPI_TIMEOUT', 30),
    'testing_ip_address' => env('FREEIPAPI_TESTING_IP_ADDRESS', '208.67.222.222'),
    'usual_localhost_ip' => [
        '127.0.0.1',
        '::1',
        'localhost',
    ],
];
```

## Usage

Show content only to users from the United States
```php
use NawrasBukhari\GeoContent\Facades\GeoContent;

$geoContent = new GeoContent();

if ($geoContent->country('United States of America')) {
    // Display restricted content here
}
```
Allowing Content for Specific Continents
Similarly, you can use the continent method to display content exclusively to users from particular continents:

```php
use NawrasBukhari\GeoContent\Facades\GeoContent;

$geoContent = new GeoContent();

if ($geoContent->continent('AM')) {
    // Display restricted content here
}
```

Disallowing Content for Specific Countries
You can use the `onlyShowInCountry()` or `onlyShowInCountryCode()` method to display content to users from specific country

```php
use NawrasBukhari\GeoContent\Facades\GeoContent;

// Create an instance of the GeoContent class
$geoContent = new GeoContent();

// Hide content from users in Russia
if ($geoContent->onlyShowInCountry('Russia')) {
    // Display non-restricted content here for users from Russia
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.


## Credits

- [Free IP API](https://freeipapi.com)
- [Spatie skeleton](https://github.com/spatie/package-skeleton-laravel)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
