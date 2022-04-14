<?php

namespace Rajwebconsulting\JsonApiSdk;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

require __DIR__.'/../vendor/autoload.php';

class App
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function GenerateDownloadHash($api, $url, $ftype)
    {
        $response = $this->client->post($api . '/api/json',
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
       $json = $response->getBody();
       return json_decode($json, true);
    }

    public function StartTask($api, $hash)
    {
        $response = $this->client->post($api . '/api/json',
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
       $json = $response->getBody();
       return json_decode($json, true);
    }

    public function GetStatus($api, $taskId)
    {
        $response = $this->client->post($api . '/api/json/task',
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
       $json = $response->getBody();
       return json_decode($json, true);
    }
}