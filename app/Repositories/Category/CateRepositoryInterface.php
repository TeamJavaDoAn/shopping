<?php
namespace App\Repositories\Category;

interface CateRepositoryInterface
{
    /**
     * get list product in category
     */
    public function getCateInProduct();

    /**
     * [getCate description]
     * @return [type] [description]
     */
    public function getCate($cat_id);
}
