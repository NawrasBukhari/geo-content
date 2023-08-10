<?php

namespace NawrasBukhari\GeoContent\Facades;

use Illuminate\Support\Facades\Facade;
use NawrasBukhari\GeoContent\Exceptions\MissingSSLException;

/**
 * @see \NawrasBukhari\GeoContent\GeoContent
 */
class GeoContent extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \NawrasBukhari\GeoContent\GeoContent::class;
    }

    /**
     * @throws MissingSSLException
     */
    public static function country($country): bool
    {
        return app(\NawrasBukhari\GeoContent\GeoContent::class)->country($country);
    }

    /**
     * @throws MissingSSLException
     */
    public static function countryCode($countryCode): bool
    {
        return app(\NawrasBukhari\GeoContent\GeoContent::class)->countryCode($countryCode);
    }

    /**
     * @throws MissingSSLException
     */
    public static function continent($continent): bool
    {
        return app(\NawrasBukhari\GeoContent\GeoContent::class)->continent($continent);
    }

    /**
     * @throws MissingSSLException
     */
    public static function continentCode($continentCode): bool
    {
        return app(\NawrasBukhari\GeoContent\GeoContent::class)->continentCode($continentCode);
    }

    /**
     * @throws MissingSSLException
     */
    public static function onlyShowInCountry($country): bool
    {
        return app(\NawrasBukhari\GeoContent\GeoContent::class)->onlyShowInCountry($country);
    }

    /**
     * @throws MissingSSLException
     */
    public static function onlyShowInCountryCode($countryCode): bool
    {
        return app(\NawrasBukhari\GeoContent\GeoContent::class)->onlyShowInCountryCode($countryCode);
    }

    /**
     * @throws MissingSSLException
     */
    public static function doNotShowInCountry($country): bool
    {
        return app(\NawrasBukhari\GeoContent\GeoContent::class)->doNotShowInCountry($country);
    }

    /**
     * @throws MissingSSLException
     */
    public static function doNotShowInCountryCode($countryCode): bool
    {
        return app(\NawrasBukhari\GeoContent\GeoContent::class)->doNotShowInCountryCode($countryCode);
    }

    /**
     * @throws MissingSSLException
     */
    public static function excludeContinent($continent): bool
    {
        return app(\NawrasBukhari\GeoContent\GeoContent::class)->excludeContinent($continent);
    }

    /**
     * @throws MissingSSLException
     */
    public static function excludeContinentCode($continentCode): bool
    {
        return app(\NawrasBukhari\GeoContent\GeoContent::class)->excludeContinentCode($continentCode);
    }

    /**
     * @throws MissingSSLException
     */
    public static function onlyShowInContinent($continent): bool
    {
        return app(\NawrasBukhari\GeoContent\GeoContent::class)->onlyShowInContinent($continent);
    }

    /**
     * @throws MissingSSLException
     */
    public static function onlyShowInContinentCode($continentCode): bool
    {
        return app(\NawrasBukhari\GeoContent\GeoContent::class)->onlyShowInContinentCode($continentCode);
    }
}
