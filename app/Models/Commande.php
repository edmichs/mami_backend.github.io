<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Commande
 * @package App\Models
 * @version April 16, 2020, 5:49 pm UTC
 *
 * @property integer client_id
 * @property integer product_id
 * @property integer prix_unit
 * @property integer nombre_total
 * @property string numerp_commande
 */
class Commande extends Model
{

    public $table = 'commandes';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';





    public $fillable = [
        'client_id',
        'product_id',
        'prix_unit',
        'nombre_total',
        'numerp_commande'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_id' => 'integer',
        'product_id' => 'integer',
        'prix_unit' => 'integer',
        'nombre_total' => 'integer',
        'numerp_commande' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'client_id' => 'required',
        'product_id' => 'required',
        'prix_unit' => 'required',
        'nombre_total' => 'required',
        'numerp_commande' => 'required'
    ];


}
