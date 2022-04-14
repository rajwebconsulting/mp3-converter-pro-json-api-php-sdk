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
        <form action="<?php echo pathinfo($_SERVER['PHP_SELF'])['dirname'];?>/generate.php" method="GET">
            <div class="card max-w-xl bg-base-100 shadow-xl mx-auto">
                <div class="card-body">
                    <h2 class="card-title justify-center">YouTube to MP3 Converter</h2>
                    <p><input type="text" name="url" placeholder="Enter valid video url" class="w-full input input-bordered input-secondary w-full"></p>
                    <p class="mx-auto mt-2">
                        <select name="ftype" class="select select-secondary w-full max-w-xs mx-auto">
                            <option disabled selected>Pick your favorite file type</option>
                            <option value="mp3">MP3</option>
                            <option value="mp4">MP4</option>
                            <option value="webm">WEBM</option>
                        </select>
                    </p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Get</button>
                    </div>
                </div>
            </div>
        </form>   
    </div>
</body>
</html>