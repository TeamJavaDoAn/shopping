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
   * [getAllAttributes description]
   * @return [type] [description]
   */
  public function getAllAttributes();

  /**
   * [updateUserActiveCode description]
   * @param  [type] $user_id     [description]
   * @param  [type] $active_code [description]
   * @return [type]              [description]
   */
  public function updateUserActiveCode($user_id, $active_code);
}
