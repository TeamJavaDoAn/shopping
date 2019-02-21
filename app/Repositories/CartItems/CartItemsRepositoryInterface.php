<?php
namespace App\Repositories\CartItems;

interface CartItemsRepositoryInterface
{
  /**
   * [insertData description]
   * @return [type] [description]
   */
  public function insertData(array $input, $rowId);
}
