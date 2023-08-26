<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;

class ImageHelper
{
    public static function handleImageUpload(UploadedFile $image, $folderName='images')
    {

            $fileName = time() . '.' . $image->extension();
            $image->storeAs("public/{$folderName}", $fileName);        

        return "{$folderName}/{$fileName}";
    }
}
