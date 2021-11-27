<?php

namespace Domain\Training\Actions;

use App\Support\Facades\DataHelper;
use Domain\Training\DataTransferObjects\ContentTypeDTO;
use Domain\Training\Models\ContentType;
use Illuminate\Database\Eloquent\Model;

class SaveContentTypeAction
{
    /**
     * Execute action
     *
     * @param \Domain\Training\DataTransferObjects\ContentTypeDTO $contentTypeDTO
     * @param int|string|null $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function execute(ContentTypeDTO $contentTypeDTO, $id = null): Model
    {
        $contentType = DataHelper::resolveModelInstance(ContentType::class, $id);

        $contentType ->name         = $contentTypeDTO ->name;
        $contentType ->slug         = ($contentTypeDTO ->slug !== null) ? $contentTypeDTO ->slug : $contentTypeDTO ->name;
        $contentType ->description  = $contentTypeDTO ->description;

        $contentType ->save();

        return $contentType;
    }
}