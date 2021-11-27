<?php

namespace Domain\Training\Actions;

use App\Support\Facades\DataHelper;
use Domain\Training\DataTransferObjects\GroupingDTO;
use Domain\Training\Models\Grouping;
use Illuminate\Database\Eloquent\Model;

class SaveGroupingAction
{
    /**
     * Execute action
     *
     * @param \Domain\Training\DataTransferObjects\GroupingDTO $groupingDTO
     * @param int|string|null $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function execute(GroupingDTO $groupingDTO, $id = null): Model
    {
        $grouping = DataHelper::resolveModelInstance(Grouping::class, $id);

        $grouping ->name         = $groupingDTO ->name;
        $grouping ->slug         = ($groupingDTO ->slug !== null) ? $groupingDTO ->slug : $groupingDTO ->name;
        $grouping ->description  = $groupingDTO ->description;

        $grouping ->save();

        return $grouping;
    }
}