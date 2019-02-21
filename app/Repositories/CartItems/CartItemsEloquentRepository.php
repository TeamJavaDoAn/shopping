<?php

namespace App\Repositories\CartItems;

use App\Repositories\EloquentRepository;
use Illuminate\Http\Request;

class CartItemsEloquentRepository extends EloquentRepository implements CartItemsRepositoryInterface
{
    /**
     * get model
     */
    public function getModel()
    {
        return \App\Models\CartItems::class;
    }

    /**
     * [insertData description]
     * @return [type] [description]
     */
    public function insertData(array $input, $rowId)
    {
      $this->_model->cart_id      = $rowId['cart_id'];
      $this->_model->user_id      = $input['user_id'];
      $this->_model->product_id   = $input['id'];
      $this->_model->quantity     = $input['qty'];

      return $this->_model->save();
    }
}
