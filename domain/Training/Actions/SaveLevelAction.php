<?php

namespace Domain\Training\Actions;

use App\Support\Facades\DataHelper;
use Domain\Training\DataTransferObjects\LevelDTO;
use Domain\Training\Models\Level;
use Illuminate\Database\Eloquent\Model;

class SaveLevelAction
{
    /**
     * Execute action
     *
     * @param \Domain\Training\DataTransferObjects\LevelDTO $levelDTO
     * @param int|string|null $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function execute(LevelDTO $levelDTO, $id = null): Model
    {
        $level = DataHelper::resolveModelInstance(Level::class, $id);

        $level ->name         = $levelDTO ->name;
        $level ->slug         = ($levelDTO ->slug !== null) ? $levelDTO ->slug : $levelDTO ->name;
        $level ->description  = $levelDTO ->description;

        $level ->save();

        return $level;
    }
}