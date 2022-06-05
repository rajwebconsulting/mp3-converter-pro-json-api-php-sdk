## RajWebConsulting

### [MP3 Converter Pro](https://shop.rajwebconsulting.com/store/converter-scripts) v3 JSON API SDK v1.0.3

#### Installation required PHP 7.4+

```bash
composer require rajwebconsulting/json-api-sdk
```

#### Usage

Autoloader and use SDK
```php
<?php
use RajWebConsulting\JsonSdk\App;

require __DIR__ . '/vendor/autoload.php';
```

Init SDK
```php
$app = new App(['API_URL' => 'https://example.com']);;
```

Generate Request HASH
```php
$data = $app->GenerateDownloadHash('VIDEO_URL', 'FILE_TYPE');
```

Start Conversion TASK
```php
$data = $app->StartTask('GENERATED_HASH');
```

Get Conversion Status & Download URL
```php
$output = $app->GetStatus('TASK_ID');
```

Constants

`API_URL = Domain of your MP3 Converter Pro v3 installation.`

`VIDEO_URL = any Supported Video URL. YouTube, TikTok, etc.`

`FILE_TYPE = MP3 or MP4`

`GENERATED_HASH = GENERATED HASH of the first API request.`

`TASK_ID = TASK ID of the second API request.`

