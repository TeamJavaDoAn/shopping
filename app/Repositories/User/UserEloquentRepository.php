<?php

namespace App\Repositories\User;

use App\Repositories\EloquentRepository;

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
     * 
     * @return mixed
     */
    public function dataText()
    {
        return false;
    }
}
