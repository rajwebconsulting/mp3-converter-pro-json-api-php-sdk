### PHP SDK and wrapper for [MP3 Converter Pro](https://demo.apiyoutu.be) [JSON API](https://demo.apiyoutu.be/developers) - Brought to you by [RAJ Web Consulting](https://rajwebconsulting.com)

![GitHub top language](https://img.shields.io/github/languages/top/rajwebconsulting/mp3-converter-pro-json-api-php-sdk) ![GitHub language count](https://img.shields.io/github/languages/count/rajwebconsulting/mp3-converter-pro-json-api-php-sdk) ![GitHub issues](https://img.shields.io/github/issues/rajwebconsulting/mp3-converter-pro-json-api-php-sdk)

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

#### 1.) Use SDK project and add Autoloader:
```php
<?php
use RajWebConsulting\JsonSdk\App;

require __DIR__ . '/vendor/autoload.php';
```

#### 2.) Instantiate SDK object, replacing 'https://myconvertersite.com' with the URL of your MP3 Converter Pro installation:
```php
$app = new App(['API_URL' => 'https://myconvertersite.com']);
```

#### 3.) Generate Download Hash value(s) for available video/audio qualities:
> `VIDEO_URL` = Any Video/Audio Page URL from a Supported site like YouTube
>
> `FILE_TYPE` = mp3 or mp4
```php
$data = $app->GenerateDownloadHash('VIDEO_URL', 'FILE_TYPE');
```
`$data` is a PHP associative array representation of the JSON API response, e.g.:
```
[
  'extractor' => 'Youtube',
  'videoId' => 'zvrMzRVtj1s',
  'title' => 'Goodknight. - Freedom [NCS Release]',
  'lengthSeconds' => '183',
  'tasks' => [
    0 => [
      'qualityLabel' => '1080p60',
      'hash' => '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'
    ],
    1 => [
      'qualityLabel' => '480p',
      'hash' => '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'
    ],
    2 => [
      'qualityLabel' => '360p',
      'hash' => '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'
    ],
    3 => [
      'qualityLabel' => '240p',
      'hash' => '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'
    ],
    4 => [
      'qualityLabel' => '144p',
      'hash' => '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'
    ],
  ],
]
```

#### 4.) Start Conversion TASK by passing the desired Download Hash value from previous API response:
>`GENERATED_HASH` = A Download Hash value returned by the SDK's GenerateDownloadHash() method
```php
$data = $app->StartTask('GENERATED_HASH');
```
`$data` is a PHP associative array representation of the JSON API response containing a corresponding TASK ID number, e.g.:
```
[
  'taskId' => 22
]
```

#### 5.) Get Conversion Status & Download URL by REGULARLY and REPEATEDLY polling this SDK method:
>`TASK_ID` = TASK ID number returned by the SDK's StartTask() method
```php
$output = $app->GetStatus('TASK_ID');
```
`$output` is a PHP associative array representation of the JSON API response containing current download/conversion progress information as well as the final download URL (upon completion), e.g.:
```
[
  'taskId' => 22,
  'status' => 'queued',
  'download_progress' => 0,
  'convert_progress' => 0,
  'title' => 'Goodknight. - Freedom [NCS Release]',
  'ext' => 'mp4'
]
```
```
[
  'taskId' => 22,
  'status' => 'Downloading video source file...',
  'download_progress' => 56,
  'convert_progress' => 0,
  'title' => 'Goodknight. - Freedom [NCS Release]',
  'ext' => 'mp4'
]
```
```
[
  'taskId' => 22,
  'status' => 'finished',
  'download_progress' => 100,
  'convert_progress' => 100,
  'title' => 'Goodknight. - Freedom [NCS Release]',
  'ext' => 'mp4',
  'download' => 'https://demo.apiyoutu.be/dl?hash=5caXl%2FQypcgVkNVVq%2F2qx2SO4Jr7Gp0HA3V6%2F9Ejz4sMeJmhho56KdsFlNWbXsA2%2B%2FUXHMauLc0F1xhRlydp7WaPz8Q33cCNXmlqZeK9QlPwHLEzT9BPz%2FQi9cQH7Rpo7XoO8f9tJsTV%2BoQGf1teMFVSQzb2evRaAQWqHEmNCWsDPi0IA2b9jxi46mEXZgxYGlh%2BcJDpP2UGPqu96CbbJhAe96bPHUiADXL22t5wLN0%3D'
]
```
