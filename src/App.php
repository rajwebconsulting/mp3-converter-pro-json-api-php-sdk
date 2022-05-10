<?php

namespace Rajwebconsulting\JsonSdk;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class App
{
    protected $client;
    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->client = new Client([
            'verify' => false,
            'force_ip_resolve' => 'v4',
        ]);
    }

    /**
     * Generate Download Hash
     *
     * @param string $url
     * @param string $ftype
     * @return array
     */
    public function GenerateDownloadHash($url, $ftype)
    {
        $response = $this->client->post(
            $this->config['API_URL'] . '/api/json',
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

    /**
     * Start Convert process
     *
     * @param string $hash
     * @return array
     */
    public function StartTask($hash)
    {
        $response = $this->client->post(
            $this->config['API_URL'] . '/api/json',
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

    /**
     * Get Status update and download results
     *
     * @param string $taskId
     * @return array
     */
    public function GetStatus($taskId)
    {
        $response = $this->client->post(
            $this->config['API_URL'] . '/api/json/task',
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
