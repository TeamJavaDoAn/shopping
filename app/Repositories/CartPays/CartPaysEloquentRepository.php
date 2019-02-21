<?php

namespace App\Repositories\CartPays;

use App\Repositories\EloquentRepository;
use Illuminate\Http\Request;

class CartPaysEloquentRepository extends EloquentRepository implements CartPaysRepositoryInterface
{
    /**
     * get model
     */
    public function getModel()
    {
        return \App\Models\CartPays::class;
    }

    /**
     * [insertData description]
     * @return [type] [description]
     */
    public function insertData($input)
    {
      $this->_model->name         = $input->name;
      $this->_model->phone        = $input->phone;
      $this->_model->email        = $input->email;
      $this->_model->city         = $input->city;
      $this->_model->message      = $input->message;

      return $this->_model->save();
    }
}
