<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Recette
 * @package App\Models
 * @version April 16, 2020, 5:49 pm UTC
 *
 * @property string name
 * @property integer dificulte
 * @property string recette
 */
class Recette extends Model
{

    public $table = 'recettes';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';





    public $fillable = [
        'name',
        'dificulte',
        'recette'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'dificulte' => 'integer',
        'recette' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'dificulte' => 'required',
        'recette' => 'required'
    ];


}
