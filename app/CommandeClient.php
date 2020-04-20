<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CommandeClient  extends Pivot
{
    protected $table = 'commande_clients';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const PIVOT_ATTRIBUTES = [
        'prix_unit', 
        'quantity',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'prix_unit', 'quantity', 'commande_id', 'client_id'
    ];

      /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */

    protected $casts = [
        'commande_id' => 'integer',
        'client_id' => 'integer',
        'prix_unit' => 'integer',
        'quantity' => 'integer'
    ];
   
}
