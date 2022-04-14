<?php

namespace Rajwebconsulting;

use Rajwebconsulting\Config;
use Rajwebconsulting\JsonApiSdk\App;

require __DIR__ . '/../vendor/autoload.php';

// Takes raw data from the request
$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json);

if (!empty($data))
{
    $app = new App();
    $output = $app->GetStatus(Config::API_URL, $data->taskId);
    echo json_encode($output);
}
