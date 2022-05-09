## RajWebConsulting

### [MP3 Converter Pro](https://shop.rajwebconsulting.com/store/converter-scripts) v3 JSON API SDK v1.0.2

Install via Composer

```
composer require rajwebconsulting/json-api-sdk
```

Autoloader and use SDK
```
<?php
use RajWebConsulting\JsonSdk\App;

require __DIR__ . '/vendor/autoload.php';
```

Init SDK
```
$app = new App();
```

Generate Request HASH
```
$data = $app->GenerateDownloadHash('API_URL', 'VIDEO_URL', 'FILE_TYPE');
```

Start Conversion TASK
```
$data = $app->StartTask('API_URL', 'GENERATED_HASH');
```

Get Conversion Status & Download URL
```
$output = $app->GetStatus('API_URL', 'TASK_ID');
```

Constants
`API_URL = Domain of your MP3 Converter Pro v3 installation.`

`VIDEO_URL = any Supported Video URL. YouTube, TikTok, etc.`

`FILE_TYPE = MP3 or MP4`

`GENERATED_HASH = GENERATED HASH of the first API request.`

`TASK_ID = TASK ID of the second API request.`

