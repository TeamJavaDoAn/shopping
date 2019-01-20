<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    protected $table      = 'category';
    protected $primaryKey = 'cate_id';

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
        'cat_name',
        'cat_description',
        'cat_image',
        'created_at',
        'updated_at'
    ];

    public $timestamp = true;

    public function products()
    {
      return $this->hasMany(Product::class, 'cat_id');
    }
}
