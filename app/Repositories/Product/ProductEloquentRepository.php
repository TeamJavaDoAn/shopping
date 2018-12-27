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
    public function getPostHost()
    {
        // return $this->model::where('created_at', '>=', Carbon::now()->subMonth())->orderBy('view', 'desc')->take(5)->get();
        return false;
    }
}
