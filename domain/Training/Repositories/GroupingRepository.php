<?php

namespace Domain\Training\Repositories;

use Domain\Training\Models\Grouping;
use Mawuekom\Repository\Eloquent\BaseRepository;
use Mawuekom\Repository\Logics\QueryLogic;

class GroupingRepository extends BaseRepository
{
    use QueryLogic;

    /**
     * Get the model on which works
     * 
     * @return Model|string
     */
    public function model()
    {
        return Grouping::class;
    }

    /**
     * Get the columns on which the search will be done
     * 
     * @return array
     */
    public function searchableFields()
    {
        return ['name', 'slug'];
    }

    /**
     * Columns on which filterig will be done
     * 
     * @return array
     */
    public function filterableFields(): array
    {
        return ['name', 'slug'];
    }

    /**
     * Determine by which property the results collection will be ordered
     * 
     * @return array
     */
    public function sortableFields(): array
    {
        return ['name', 'slug', 'created_at'];
    }

    /**
     * Determine the relation that will be load on the resulting model
     * 
     * @return array
     */
    public function includableRelations(): array
    {
        return [];
    }

    /**
     * Define a couple fields that will be fetch to reduce the overall size of your SQL query
     * 
     * @return array
     */
    public function selectableFields(): array
    {
        return ['name', 'slug'];
    }
}