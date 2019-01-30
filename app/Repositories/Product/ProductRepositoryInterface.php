<?php
namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
  /**
   * Get 5 posts hot in a month the last
   * @return mixed
   */
    public function getProductId($id);

  /**
   * [getAllAttributes description]
   * @return [type] [description]
   */
  public function getAllAttributes();

  public function getProductInCate();
}
