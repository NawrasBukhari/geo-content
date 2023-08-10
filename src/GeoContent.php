<?php

namespace NawrasBukhari\GeoContent;

use NawrasBukhari\GeoContent\Exceptions\MissingSSLException;

class GeoContent
{
    /**
     * This class is responsible for getting the data from the API
     * __________________________________________________________________________________________________________
     * || Field           || Type            || Description
     * ----------------------------------------------------------------------------------------------------------
     * || ipVersion       || string          || The IP version (e.g., "4" for IPv4).
     * || ipAddress       || string          || The IP address for which geolocation information is provided.
     * || latitude        || string          || The latitude coordinate of the IP address location.
     * || longitude       || string          || The longitude coordinate of the IP address location.
     * || countryName     || string          || The name of the country where the IP address is located.
     * || countryCode     || string          || The ISO 3166-1 alpha-2 country code of the IP address location.
     * || timeZone        || string          || The time zone offset of the IP address location.
     * || zipCode         || string          || The ZIP code or postal code of the IP address location.
     * || cityName        || string          || The name of the city where the IP address is located.
     * || regionName      || string          || The name of the region or state where the IP address is located.
     * || continent       || string          || The name of the continent where the IP address is located.
     * || continentCode   || string          || The ISO code of the continent where the IP address is located.
     * __________________________________________________________________________________________________________
     */

    /**
     * @throws MissingSSLException
     */
    private function run(): array
    {
        $curl = curl_init();

        try {
            if ($this->appHasApiKey()) {
                $ipAddress = $this->isLocalIpAddress() ? config('geo-content.testing_ip_address') : request()->ip();
                $url = config('geo-content.freeipapi_base_url').$ipAddress.'?key='.config('geo-content.freeipapi_key');
            } else {
                $ipAddress = $this->isLocalIpAddress() ? config('geo-content.testing_ip_address') : request()->ip();
                $url = config('geo-content.freeipapi_base_url').$ipAddress;
            }

            $options = [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYHOST => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => config('geo-content.timeout'),
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            ];

            if ($this->isLocalIpAddress() && ! $this->appHasHttps()) {
                $options[CURLOPT_SSL_VERIFYHOST] = false;
                $options[CURLOPT_SSL_VERIFYPEER] = false;
            }

            curl_setopt_array($curl, $options);

            $response = curl_exec($curl);

            if ($response === false) {
                throw new \Exception('cURL error: '.curl_error($curl));
            }

            curl_close($curl);

            return json_decode($response, true);

        } catch (\Exception $exception) {
            throw new MissingSSLException($exception->getMessage());
        }
    }

    /**
     * @throws MissingSSLException
     */
    public function country($country): bool
    {
        $data = $this->run();

        if (($data['countryName'] === $country)) {
            return true;
        }

        return false;
    }

    /**
     * @throws MissingSSLException
     */
    public function countryCode($countryCode): bool
    {
        $data = $this->run();

        if (($data['countryCode'] === $countryCode)) {
            return true;
        }

        return false;
    }

    /**
     * @throws MissingSSLException
     */
    public function continent($continent): bool
    {
        $data = $this->run();
        if (($data['continent'] === $continent)) {
            return true;
        }

        return false;
    }

    /**
     * @throws MissingSSLException
     */
    public function continentCode($continentCode): bool
    {
        $data = $this->run();
        if (($data['continentCode'] === $continentCode)) {
            return true;
        }

        return false;
    }

    /**
     * This function will have one parameter which will be passed,
     * and it will be the name of the country.
     *
     * @throws MissingSSLException
     */
    public function onlyShowInCountry($country): bool
    {
        $data = $this->run();
        if (($data['countryName'] === $country)) {
            return true;
        }

        return false;
    }

    /**
     * @throws MissingSSLException
     */
    public function onlyShowInCountryCode($countryCode): bool
    {
        $data = $this->run();
        if (($data['countryCode'] === $countryCode)) {
            return true;
        }

        return false;
    }

    /**
     * @throws MissingSSLException
     */
    public function doNotShowInCountry($country): bool
    {
        $data = $this->run();
        if (($data['countryName'] !== $country)) {
            return true;
        }

        return false;
    }

    /**
     * @throws MissingSSLException
     */
    public function doNotShowInCountryCode($countryCode): bool
    {
        $data = $this->run();
        if ($data['countryCode'] !== $countryCode) {
            return true;
        }

        return false;
    }

    /**
     * @throws MissingSSLException
     */
    public function excludeContinent($continent): bool
    {
        $data = $this->run();
        if (($data['continent'] !== $continent)) {
            return true;
        }

        return false;
    }

    /**
     * @throws MissingSSLException
     */
    public function excludeContinentCode($continentCode): bool
    {
        $data = $this->run();
        if (($data['continentCode'] !== $continentCode)) {
            return true;
        }

        return false;
    }

    /**
     * @throws MissingSSLException
     */
    public function onlyShowInContinent($continent): bool
    {
        $data = $this->run();
        if (($data['continent'] === $continent)) {
            return true;
        }

        return false;
    }

    /**
     * @throws MissingSSLException
     */
    public function onlyShowInContinentCode($continentCode): bool
    {
        $data = $this->run();
        if (($data['continentCode'] === $continentCode)) {
            return true;
        }

        return false;
    }

    private function appHasHttps()
    {
        return config('geo-content.freeipapi_ssl');
    }

    private function appHasApiKey()
    {
        return config('geo-content.freeipapi_key');
    }

    private function isLocalIpAddress(): bool
    {
        return in_array(request()->ip(), config('geo-content.usual_localhost_ip'));
    }
}
