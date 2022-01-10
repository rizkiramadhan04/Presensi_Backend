<?php

namespace App\Helpers;

use Intervention\Image\Facades\Image;

class ImageAd
{

    public static function storeImage($directory, $file_name, $image_base64)
    {
        $image = Image::make($image_base64);
        $base_path = app()->basePath() . '/public/images/';
        $upload_path = 'upload/';

        $file_path = $base_path . $upload_path . $directory . '/' . $file_name;
        if (!file_exists($upload_path . $directory)) {
            mkdir($upload_path . $directory, 0777, true);
        }

        $image->save($file_path);

        $app_url = env('APP_URL');
        $app_url = $app_url . (str_ends_with($app_url, '/') ? '' : '/');
        return $app_url . $upload_path . $directory . '/' . $file_name;
    }
}
