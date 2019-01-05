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
      $this->_model->name               = $input['name'];
      $this->_model->email              = $input['email'];
      $this->_model->password           = \Crypt::encrypt($input['password']);
      $this->_model->re_password        = \Crypt::encrypt($input['confirm_password']);
      $this->_model->phone              = $input['phone'];
      $this->_model->remember_token     = $input['_token'];
      $this->_model->verification_code  = str_random(20);
      return $this->_model->save();
    }

    /**
     * [getAllAttributes description]
     * @return [type] [description]
     */
    public function getAllAttributes()
    {
      $columns = $this->_model->getFillable();
      // Another option is to get all columns for the table like so:
      // $columns = \Schema::getColumnListing($this->table);
      // but it's safer to just get the fillable fields

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
     * [updateUserActiveCode description]
     * @param  [type] $user_id     [description]
     * @param  [type] $active_code [description]
     * @return [type]              [description]
     */
    public function updateUserActiveCode($user_id, $active_code)
    {
      $result = $this->_model->where('id', $user_id)
                  ->update(['active' => $active_code]);
      return $result;
    }
}
