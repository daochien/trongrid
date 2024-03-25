<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class HttpRequestService
{
    public function __construct()
    {
    }

    public function post($url, $headers = [], $params = [], $options = [])
    {
        $http = Http::timeout(30);
        if (!empty($headers)) {
            $http->withHeaders($headers);
        }

        return $http->post($url, $params)->json();
    }
}
