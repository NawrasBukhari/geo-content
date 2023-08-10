<?php

use NawrasBukhari\GeoContent\Facades\GeoContent;

it('can get country name', function () {
    expect(GeoContent::country('United States of America'))->toBe(true);
});

it('can get country code', function () {
    expect(GeoContent::countryCode('US'))->toBe(true);
});

it('can get continent name', function () {
    expect(GeoContent::continent('Americas'))->toBe(true);
});

it('can get continent code', function () {
    expect(GeoContent::continentCode('US'))->toBe(false);
});

it('can only show in country', function () {
    expect(GeoContent::onlyShowInCountry('United States of America'))->toBe(true);
});

it('can not show in country', function () {
    expect(GeoContent::doNotShowInCountryCode('US'))->toBe(false);
});

it('can exclude continent', function () {
    expect(GeoContent::excludeContinent('AM'))->toBe(true);
});

it('can only show in continent', function () {
    expect(GeoContent::onlyShowInContinentCode('AM'))->toBe(true);
});

it('can only show in country code', function () {
    expect(GeoContent::onlyShowInCountryCode('US'))->toBe(true);
});

it('can not show in country', function () {
    expect(GeoContent::doNotShowInCountry('United States of America'))->toBe(false);
});

it('can exclude continent code', function () {
    expect(GeoContent::excludeContinentCode('AM'))->toBe(true);
});

it('can only show in continent', function () {
    expect(GeoContent::onlyShowInContinent('Americas'))->toBe(true);
});
