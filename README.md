Video Sharing Website made in Laravel 8

# How to Use:

   Must have composer installed https://getcomposer.org/
   
   FFMpeg for video conversion and thumbnail generation https://ffmpeg.org/
    
- composer update in project directory
- php artisan migrate in project directory
- copy .env.xample to .env
- start server
    
    
FFMPEG
    change ffmpeg in app\Http\Controllers\VideoController.php depending on your FFMPEG installation
    
    $cmd = "ffmpeg -i $video -c:v libx264 $_video";
    $cmd = "ffmpeg -i $video -an -ss $timeStamp -s $size $_image";
    
Database
    edit .env file for database settings
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=videostream
    DB_USERNAME=root
    DB_PASSWORD=


Helper Files 
    \app\Helpers\VideoStream.php by Rana https://gist.github.com/ranacseruet/9826293
