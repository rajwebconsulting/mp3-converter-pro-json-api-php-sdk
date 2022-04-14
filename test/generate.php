<?php

namespace Rajwebconsulting;

use Rajwebconsulting\Config;
use Rajwebconsulting\JsonApiSdk\App;

require __DIR__ . '/../vendor/autoload.php';

if (isset($_GET['url']) && isset($_GET['ftype']))
{
    $url = trim($_GET['url']);
    $ftype = trim($_GET['ftype']);
    if (!empty($url) && !empty($ftype))
    {
        $app = new App();
        $data = $app->GenerateDownloadHash(Config::API_URL, $url, $ftype);
    }
}
else
{
    $error = 'Error: no URL or file type provided.';
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="corporate">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube to MP3 Converter</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.13.6/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen bg-base-200 pt-10">
        <?php if (isset($error)) : ?>
            <div class="card max-w-xl bg-base-100 shadow-xl mx-auto">
                <div class="card-body">
                    <div class="alert alert-error shadow-lg">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span><?php echo $error; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if (isset($data) && !empty($data)) : ?>
            <form action="<?php echo pathinfo($_SERVER['PHP_SELF'])['dirname'];?>/convert.php" method="post">
                <div class="card max-w-xl bg-base-100 shadow-xl mx-auto">
                    <figure class="px-10 pt-10">
                        <img src="https://i.ytimg.com/vi/<?php echo $data['videoId']; ?>/mqdefault.jpg" alt="Shoes" class="rounded-xl" />
                    </figure>
                    <div class="card-body text-center">
                        <h2 class="card-title justify-center"><?php echo $data['title'] ?></h2>
                        <input type="hidden" name="vid" value="<?php echo $data['videoId']; ?>">
                        <input type="hidden" name="title" value="<?php echo $data['title']; ?>">
                        <p class="mx-auto">
                            <select name="hash" class="select select-secondary w-full max-w-xs mx-auto">
                                <option disabled selected>Pick your favorite file Quality</option>
                                <?php foreach ($data['tasks'] as $f) : ?>
                                    <option value="<?php echo $f['hash'] ?>"><?php echo ($f['qualityLabel']) ? $f['qualityLabel'] : $f['bitrate'] . ' kbps'; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </p>
                        <div class="card-actions justify-end">
                        <button class="btn btn-primary">Convert</button>
                        </div>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>