<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Contact extends Model
{
    protected $table      = 'contact';
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
        'email',
        'phone',
        'title',
        'content',
        'created_at',
        'updated_at'
    ];

    public $timestamp = true;
}
