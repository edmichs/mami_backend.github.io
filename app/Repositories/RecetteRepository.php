<?php

namespace App\Repositories;

use App\Models\Recette;
use App\Repositories\BaseRepository;

/**
 * Class RecetteRepository
 * @package App\Repositories
 * @version April 16, 2020, 5:49 pm UTC
*/

class RecetteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'dificulte',
        'recette'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Recette::class;
    }
}
