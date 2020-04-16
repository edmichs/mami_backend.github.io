<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Client
 * @package App\Models
 * @version April 16, 2020, 5:48 pm UTC
 *
 * @property string lastname
 * @property string firstname
 * @property string email
 * @property string telephone
 * @property string address
 */
class Client extends Model
{

    public $table = 'clients';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';





    public $fillable = [
        'lastname',
        'firstname',
        'email',
        'telephone',
        'address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lastname' => 'string',
        'firstname' => 'string',
        'email' => 'string',
        'telephone' => 'string',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'lastname' => 'required',
        'firstname' => 'required',
        'email' => 'required',
        'telephone' => 'required',
        'address' => 'required'
    ];


}
