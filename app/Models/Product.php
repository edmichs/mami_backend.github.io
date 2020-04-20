<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Product
 * @package App\Models
 * @version April 16, 2020, 5:49 pm UTC
 *
 * @property string name
 * @property integer price
 * @property string description
 * @property string picture
 */
class Product extends Model
{

    public $table = 'products';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';





    public $fillable = [
        'name',
        'price',
        'description',
        'picture'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'price' => 'integer',
        'description' => 'string',
        'picture' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'price' => 'required',
        'description' => 'required',
        'picture' => 'required'
    ];

    public function commandes()
    {
        return $this->hasMany('App\Models\Commande', 'client_id');
    }
    
}
