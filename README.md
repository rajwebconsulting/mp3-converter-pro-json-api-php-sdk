## RajWebConsulting

### [MP3 Converter Pro](https://shop.rajwebconsulting.com/store/converter-scripts) v3 JSON API SDK

Install dependencies via Composer

```
composer install
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

In test folder is a full functional Code that you can restyle.
It using [TailwindCSS](https://tailwindcss.com/) and [DaisyUI](https://daisyui.com/) Components