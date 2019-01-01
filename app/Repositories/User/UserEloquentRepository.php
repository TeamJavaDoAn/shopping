<?php

namespace App\Repositories\User;

use App\Repositories\EloquentRepository;
use Illuminate\Http\Request;

class UserEloquentRepository extends EloquentRepository implements UserRepositoryInterface
{
    /**
     * get model
     */
    public function getModel()
    {
        return \App\Models\User::class;
    }

    /**
     * [insertData description]
     * @return [type] [description]
     */
    public function insertData(array $input)
    {
      $this->_model->name           = $input['name'];
      $this->_model->email          = $input['email'];
      $this->_model->password       = \Crypt::encrypt($input['password']);
      $this->_model->re_password    = \Crypt::encrypt($input['confirm_password']);
      $this->_model->phone          = $input['phone'];
      $this->_model->remember_token = $input['_token'];
      $result = $this->_model->save();
      return $result;
    }

    /**
     * [findOnlyPublished description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function findOnlyPublished($id)
    {
        $result = $this
            ->_model
            ->where('id', $id)
            ->where('is_published', 1)
            ->first();
        return $result;
    }
}
