<?php

namespace App\Repositories\Product;

use App\Repositories\EloquentRepository;

class ProductEloquentRepository extends EloquentRepository implements ProductRepositoryInterface
{
    /**
     * get model
     */
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getProductId($id)
    {
        return $this->_model::where('product_id', $id)->first();
    }

    /**
     * [getAllAttributes description]
     * @return [type] [description]
     */
    public function getAllAttributes()
    {
      $columns = $this->_model->getFillable();
      $attributes = $this->_model->getAttributes();

      foreach ($columns as $column)
      {
          if (!array_key_exists($column, $attributes))
          {
              $attributes[$column] = null;
          }
      }
      return $attributes;
    }

    /**
     * [getProductInCate description]
     * @return [type] [description]
     */
    public function getProductInCate()
    {
      $result = $this->_model->hasOne('App\Models\Category', "cat_id", "product_id");
      return $result;
    }
}
