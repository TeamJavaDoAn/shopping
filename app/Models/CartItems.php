<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class CartItems extends Model
{
    protected $table      = 'cart_items';
    protected $primaryKey = 'id';

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
        'user_id',
        'product_id',
        'quantity',
        'cart_id',
        'created_at',
        'updated_at'
    ];

    public $timestamp = true;
}
