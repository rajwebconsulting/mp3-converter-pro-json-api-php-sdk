<?php

namespace Rajwebconsulting\JsonSdk;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class App
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'verify' => false,
            'force_ip_resolve' => 'v4',
        ]);
    }

    public function GenerateDownloadHash($api, $url, $ftype)
    {
        $response = $this->client->post(
            $api . '/api/json',
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                RequestOptions::JSON => [
                    'ftype' => $ftype,
                    'url' => $url
                ],
            ]
        );
        return $response->getBody();
    }

    public function StartTask($api, $hash)
    {
        $response = $this->client->post(
            $api . '/api/json',
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                RequestOptions::JSON => [
                    'hash' => $hash
                ],
            ]
        );
        return $response->getBody();
    }

    public function GetStatus($api, $taskId)
    {
        $response = $this->client->post(
            $api . '/api/json/task',
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                RequestOptions::JSON => [
                    'taskId' => $taskId
                ],
            ]
        );
        return $response->getBody();
    }
}
