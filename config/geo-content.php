<?php

return [
    'freeipapi_base_url' => env('FREEIPAPI_BASE_URL', 'https://freeipapi.com/api/json/'),
    'freeipapi_key' => env('FREEIPAPI_KEY'),
    'freeipapi_ssl' => env('FREEIPAPI_SSL', true),
    'timeout' => env('FREEIPAPI_TIMEOUT', 30),
    'testing_ip_address' => env('FREEIPAPI_TESTING_IP_ADDRESS', '208.67.222.222'),
];
