Video Sharing Website made in Laravel 8

# Requirements:

1. composer installed https://getcomposer.org/
2. FFMpeg for video conversion and thumbnail generation https://ffmpeg.org/
3. mysql

run bash or cmd in the project root

for live server run

    composer install --no-dev
   
for production run   

    composer install 
    
copy .env.example to .env file


FFMPEG
    change ffmpeg in app/Http/Controllers/VideoController.php depending on your FFMPEG installation
    
    $cmd = "ffmpeg -i $video -c:v libx264 $_video";
    $cmd = "ffmpeg -i $video -an -ss $timeStamp -s $size $_image";


Default storage disk is 'local' for local storage in /storage/app/

change the settings in  app/Http/Controllers/VideoController.php

's3'  for amazon s3

'local'  for local disk

    $this->disk = 'local'
    $this->video_path = 'videos/'
    $this->thumbnail_path = 'thumbnails/'


Helper Files 
    \app\Helpers\VideoStream.php by Rana https://gist.github.com/ranacseruet/9826293
