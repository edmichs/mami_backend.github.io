<?php

namespace App\Repositories;

use App\Models\Commande;
use App\Repositories\BaseRepository;

/**
 * Class CommandeRepository
 * @package App\Repositories
 * @version April 16, 2020, 5:49 pm UTC
*/

class CommandeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_id',
        'product_id',
        'prix_unit',
        'nombre_total',
        'numerp_commande'
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
        return Commande::class;
    }
    public function groupByNumeroCommande()
    {
       return Commande::groupBy('numero_commande')->get();
    }
}
