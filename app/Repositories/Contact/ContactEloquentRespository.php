<?php

namespace App\Repositories\Contact;

use App\Repositories\EloquentRepository;

class ContactEloquentRespository extends EloquentRepository implements ContactRespositoryInterface
{
    /**
     * get model
     */
    public function getModel()
    {
        return \App\Models\Contact::class;
    }

    /**
     * [InsertDataContact description]
     */
    public function InsertDataContact(array $input)
    {
      $this->_model->name     = $input['name'];
      $this->_model->email    = $input['email'];
      $this->_model->phone    = $input['phone'];
      $this->_model->title    = $input['title'];
      $this->_model->content  = $input['content'];

      return $this->_model->save();
    }
}
