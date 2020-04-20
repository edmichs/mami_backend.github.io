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
        'numero_commande'
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
        'numero_commande' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'lastname' => 'required',
        'email' => 'required|email',
        'telephone' => 'required',
        'numero_commande' => 'required'
    ];
    
    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }
    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'commande_clients', 'commande_id', 'product_id')->using('App\CommandeClient')->withPivot('prix_unit','quantity')->withTimestamps();
    }

}
