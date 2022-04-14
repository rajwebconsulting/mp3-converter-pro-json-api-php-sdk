<?php

namespace Rajwebconsulting;

use Rajwebconsulting\Config;
use Rajwebconsulting\JsonApiSdk\App;

require __DIR__ . '/../vendor/autoload.php';

if (isset($_POST['hash']) && isset($_POST['vid']) && isset($_POST['title']))
{
    $hash = trim($_POST['hash']);
    $vid = trim($_POST['vid']);
    $title = trim($_POST['title']);
    if (!empty($hash))
    {
        $app = new App();
        $data = $app->StartTask(Config::API_URL, $hash);
        $data['videoId'] = $vid;
        $data['title'] = $title;
    }
}
else
{
    $error = 'Error: no hash provided.';
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
        <?php if (isset($data)) : ?>
            <div class="card max-w-xl bg-base-100 shadow-xl mx-auto">
                <figure class="px-10 pt-10">
                    <img src="https://i.ytimg.com/vi/<?php echo $data['videoId']; ?>/mqdefault.jpg" alt="Shoes" class="rounded-xl" />
                </figure>
                <div class="card-body text-center">
                    <h2 class="card-title justify-center"><?php echo $data['title'] ?></h2>
                    <p class="mx-auto">
                    <div id="progress">Preparing...</div>
                    </p>
                    <div class="card-actions justify-end">
                        <div id="download"></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script>
        <?php if (isset($data['taskId'])) : ?>

            var update = setInterval(function() {
                getTaskStatus();
            }, 1000);
            
            // Example POST method implementation:
            async function postData(url = '', data = {}) {
                const response = await fetch(url, {
                    method: 'POST', 
                    mode: 'cors', 
                    cache: 'no-cache',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    redirect: 'follow',
                    referrerPolicy: 'no-referrer',
                    body: JSON.stringify(data)
                });

                return response.json();
            }

            function getTaskStatus() {
                let status = 'none';
                postData('<?php echo pathinfo($_SERVER['PHP_SELF'])['dirname'];?>/progress.php', {
                    "taskId": <?php echo $data['taskId']; ?>
                })
                .then(data => {
                    status = data.status;
                    if(status === 'finished') {
                        clearInterval(update);
                    }
                    const elem = document.querySelector('#progress');
                    const dl = document.querySelector('#download');
                    elem.innerHTML = `
                    <div>Download Progress: ${data.download_progress}%</div>
                    <div><progress class="progress progress-primary w-56" value="${data.download_progress}" max="100"></progress></div>
                    <div>Convert Progress: ${data.convert_progress}%</div>
                    <div><progress class="progress progress-primary w-56" value="${data.convert_progress}" max="100"></progress></div>
                    <p>Status: ${data.status}</p>`;
                    if (status == 'finished') {
                        dl.innerHTML = `
                            <a href="${data.download}" class="btn btn-primary">Download</a> 
                            <a href="<?php echo pathinfo($_SERVER['PHP_SELF'])['dirname'];?>/index.php" class="btn btn-secondary mt-2 md:mt-0">Convert other video</a>
                        `;
                    } else {
                        dl.innerHTML = `<button class="btn btn-primary" disabled="disabled">Download</button>`;
                    }
                });      
            }
        <?php endif; ?>
    </script>
</body>

</html>