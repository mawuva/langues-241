<?php

namespace App\Actions;

use App\Models\Image;
use App\Support\Facades\HandleFileUpload;
use Illuminate\Support\Facades\Storage;

class HandleImageSavingAction
{
    /**
     * Execute action
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param Illuminate\Http\UploadedFile $file
     * @param string|null $folder
     * @param int|null $id
     *
     * @return void
     */
    public function execute($model, $file, $folder = null)
    {
        $info = HandleFileUpload::toLocal($file, $folder);

        if ($model ->image !== null) {
            $image = $model ->image;

            Storage::delete([
                $model ->image ->url, 
                $model ->image ->url_sm, 
                $model ->image ->url_md, 
                $model ->image ->url_lg
            ]);
        }

        else {
            $image = new Image();
        }

        $image->original_filename   = $info['original_filename'];
        $image->filename            = $info['filename'];
        $image->mime                = $info['mime'];
        $image->url                 = $info['url'];
        $image->url_sm              = ($info['sm_thumb_url'] !== null) ? $info['sm_thumb_url'] : null;
        $image->url_md              = ($info['md_thumb_url'] !== null) ? $info['md_thumb_url'] : null;
        $image->url_lg              = ($info['lg_thumb_url'] !== null) ? $info['lg_thumb_url'] : null;

        $model ->image() ->save($image);
    }
}