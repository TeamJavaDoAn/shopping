<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    protected $table      = 'product';
    protected $primaryKey = 'product_id';

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'created_at';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cat_id',
        'name',
        'description',
        'price',
        'quantity',
        'image',
        'thumbnail',
        'created_at',
        'updated_at'
    ];

    public $timestamp = true;
}
