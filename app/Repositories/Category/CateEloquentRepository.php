<?php

namespace App\Repositories\Category;

use App\Repositories\EloquentRepository;

class CateEloquentRepository extends EloquentRepository implements CateRepositoryInterface
{
    /**
     * get model
     */
    public function getModel()
    {
        return \App\Models\Category::class;
    }

    /**
     * get list product in category
     * @return mixed
     */
    public function getCateInProduct()
    {
        $result = $this->_model->hasMany('App\Models\Product', "product_id", "cat_id");
        return $result;
    }

    /**
     * [getCate description]
     * @param  [type] $cat_id [description]
     * @return [type]         [description]
     */
    public function getCate($cat_id)
    {
      dd($cat_id);
      $result = $this->_model->where("cat_id", $cat_id)->get();
      return $result;
    }
}
