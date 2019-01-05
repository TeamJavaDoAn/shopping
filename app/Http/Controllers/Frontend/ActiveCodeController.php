<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;

class ActiveCodeController extends Controller
{
  /**
   * [$register description]
   * @var [type]
   */
  public $register = [];

  /**
   * @var UserRepositoryInterface|\App\Repositories\User
   */
  protected $userRepository;

  /**
   * [$repository description]
   * @var [type]
   */
  protected $repository;

  public function __construct(UserRepositoryInterface $userRepository)
  {
    $this->userRepository = $userRepository;
  }

  /**
   * [register description]
   * @return [type] [description]
   */
  public function activeCode(Request $request)
  {
    $dataArr = [
      'active' => '1'
    ];
    $this->userRepository->updateUserActiveCode($request['id'], $dataArr['active']);
    return redirect()->route('home');
  }
}
