### PHP SDK and wrapper for [MP3 Converter Pro](https://demo.apiyoutu.be) [JSON API](https://demo.apiyoutu.be/developers) - Brought to you by [RAJ Web Consulting](https://rajwebconsulting.com)

The SDK and API support downloads/conversions from **YouTube, TikTok, Facebook, Instagram, Twitter, SoundCloud, Vimeo, Dailymotion, VK,** and **AOL** -- 10 of the largest video/audio hosting sites in the world!

## Requirements

- [YouTube Video Backend](https://shop.rajwebconsulting.com/store/converter-scripts)
 - All [YouTube Video Backend requirements](https://shop.rajwebconsulting.com/knowledgebase/30/How-To-install-YouTube-Video-Backend-on-aaPanel-recommended.html)
- [MP3 Converter Pro](https://shop.rajwebconsulting.com/store/converter-scripts)
 - All [MP3 Converter Pro requirements](https://shop.rajwebconsulting.com/knowledgebase/41/How-To-install-MP3-Converter-Pro-Update-v3.0.5-beta5-on-aaPanel-recommended.html)
- PHP 7.4+

## Installation

In a command prompt, "cd" to the root directory of your website (where you wish to consume the MP3 Converter Pro JSON API) and run this command to add the project files to a new or existing "vendors" folder:
```bash
composer require rajwebconsulting/json-api-sdk
```

## Usage

Use SDK project and add Autoloader:
```php
<?php
use RajWebConsulting\JsonSdk\App;

require __DIR__ . '/vendor/autoload.php';
```

Initialize SDK:
```php
$app = new App(['API_URL' => 'https://example.com']);;
```

Generate Request HASH:
```php
$data = $app->GenerateDownloadHash('VIDEO_URL', 'FILE_TYPE');
```

Start Conversion TASK:
```php
$data = $app->StartTask('GENERATED_HASH');
```

Get Conversion Status & Download URL:
```php
$output = $app->GetStatus('TASK_ID');
```

## Reference of Special Terms

- API_URL = `URL of your MP3 Converter Pro installation`

- VIDEO_URL = `Any Video/Audio Page URL from a Supported site like YouTube`

- FILE_TYPE = `mp3 or mp4`

- GENERATED_HASH = `GENERATED HASH returned in the GenerateDownloadHash() API response`

- TASK_ID = `TASK ID number returned in the StartTask() API response`

