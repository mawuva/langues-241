<?php

namespace Domain\Training\Actions;

use App\Actions\HandleImageSavingAction;
use App\Support\Facades\DataHelper;
use Domain\Training\DataTransferObjects\LanguageDTO;
use Domain\Training\Models\Language;
use Illuminate\Database\Eloquent\Model;

class SaveLanguageAction
{
    /**
     * Execute action
     *
     * @param \Domain\Training\DataTransferObjects\LanguageDTO $languageDTO
     * @param int|string|null $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function execute(LanguageDTO $languageDTO, $id = null): Model
    {
        $language = DataHelper::resolveModelInstance(Language::class, $id);
        
        $language ->name                = $languageDTO ->name;
        $language ->slug                = ($languageDTO ->slug !== null) ? $languageDTO ->slug : $languageDTO ->name;
        $language ->short_description   = $languageDTO ->short_description;
        $language ->description         = $languageDTO ->description;

        $language ->save();

        if ($languageDTO ->image !== null)
            app(HandleImageSavingAction::class) ->execute($language, $languageDTO ->image, 'languages');

        return $language;
    }
}