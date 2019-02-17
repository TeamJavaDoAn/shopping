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
     * [getProductCate description]
     * @param  [type] $cat_id [description]
     * @return [type]         [description]
     */
    public function getProductCate($cat_id)
    {
        $result = $this->_model->where("cat_id", $cat_id)->paginate('5');
        return $result;
    }

    /**
     * get value product in category
     */
    public function getProductInCate($cat_id)
    {
      $data   = $this->_model->find($cat_id);
      $result = $data->belongsTo('App\Models\Category', 'product_id', 'cat_id')->first()->toArray();
      return $result;
    }
}
