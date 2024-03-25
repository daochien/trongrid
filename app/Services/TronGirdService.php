<?php

namespace App\Services;
use IEXBase\TronAPI\Tron;
use IEXBase\TronAPI\Provider\HttpProvider;

class TronGirdService
{

    protected $apiKey;

    protected $apiUrl;

    protected $http;

    public function __construct(HttpRequestService $http)
    {
        $this->apiKey = 'd29b0f4f-6601-42fb-b92b-25ef7b479b8c';
        $this->apiUrl = 'https://api.trongrid.io';
        $this->http = $http;
    }

    public function createAccount()
    {

        $fullNode = new HttpProvider('https://api.trongrid.io', 30000, false, false, [
            'TRON-PRO-API-KEY' => $this->apiKey
        ]);

        $tron = new Tron($fullNode);
        $generateAddress = $tron->generateAddress();
        $isValid = $tron->isAddress($generateAddress->getAddress());

        $account = $tron->registerAccount('TGGBHJsSmEsooKzm8gYEVk7XT76oGfS8NQ', $generateAddress->getAddress(true));

        dd([
            $generateAddress->getAddress(),
            $generateAddress->getAddress(true),
            $generateAddress->getPrivateKey(),
            $generateAddress->getPublicKey(),
            $isValid,
            $generateAddress->getRawData(),
            $account
        ]);
    }
}
