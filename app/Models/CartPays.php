<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class CartPays extends Model
{
    protected $table      = 'cart_pays';
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
        'name',
        'phone',
        'email',
        'city',
        'message',
        'created_at',
        'updated_at'
    ];

    public $timestamp = true;
}
