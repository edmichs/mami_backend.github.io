<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\BaseRepository;
use App\Http\Requests\CreateProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProductRepository
 * @package App\Repositories
 * @version April 16, 2020, 5:49 pm UTC
*/

class ProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'price',
        'description',
        'picture'
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
        return Product::class;
    }
    public function upload(CreateProductRequest $request)
    {
        return $request->file('picture')->move(public_path('/images/uploads/products/'.Auth::user()->id.'/'), $request->file('picture')->getClientOriginalName());
    }
}
