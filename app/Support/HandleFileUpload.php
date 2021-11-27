<?php

namespace App\Support;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class HandleFileUpload
{
    /**
     * Upload file to local storage
     *
     * @param Illuminate\Http\UploadedFile $file
     * @param string|null $folder
     *
     * @return array
     */
    public function toLocal($file, $folder = null)
    {
        $folder = ($folder === null) ? 'uploads' : 'uploads/'.$folder;

        $name = time().'_'.$file->getClientOriginalName();
        $filePath = $file->storeAs($folder, $name, 'public');

        $data =  [
            'original_filename' => $file ->getClientOriginalName(),
            'filename'          => $name,
            'mime'              => $file ->getMimeType(),
            'url'               => $filePath,
        ];

        if (str_contains($file ->getMimeType(), 'image')) {
            $prefix = 'app/public/';
            $thumbsFolder = $folder . '/thumbs';
            $thumbsPath = $prefix . $thumbsFolder;
            
            if(File::exists(storage_path($thumbsPath)) === false) {
                File::makeDirectory(storage_path($thumbsPath), 0777, true, true);
            }

            $smThumbPath = $thumbsFolder . '/sm-thumb-'.$name;
            Image::make($file ->getRealPath()) ->resize(100, 100) ->save(storage_path($prefix . $smThumbPath));

            $mdThumbPath = $thumbsFolder . '/md-thumb-'.$name;
            Image::make($file ->getRealPath()) ->resize(250, 250) ->save(storage_path($prefix . $mdThumbPath));

            $lgThumbPath = $thumbsFolder . '/lg-thumb-'.$name;
            Image::make($file ->getRealPath()) ->resize(300, 200) ->save(storage_path($prefix . $lgThumbPath));

            $data = array_merge($data, [
                'sm_thumb_url' => $smThumbPath,
                'md_thumb_url' => $mdThumbPath,
                'lg_thumb_url' => $lgThumbPath,
            ]);
        }

        return $data;
    }
}