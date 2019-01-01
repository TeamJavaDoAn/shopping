<?php
namespace App\Repositories\User;

interface UserRepositoryInterface
{
  /**
   * [insertData description]
   * @return [type] [description]
   */
  public function insertData(array $input);

  /**
   * [findOnlyPublished description]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function findOnlyPublished($id);
}
