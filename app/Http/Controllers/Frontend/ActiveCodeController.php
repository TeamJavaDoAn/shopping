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
    try {
      $dataArr = [
        'active' => '1'
      ];
      if($this->userRepository->updateUserActiveCode($request['id'], $dataArr['active'])){
        // Flash a successful message
        $request->session()->flash('success', 'Chào mừng bạn đến với trang shopping. <br> Vui lòng đăng nhập tài khoản!');
      }
    } catch (\Exception $e) {
      // Log error
      \Log::error($e->getMessage());

      // Flash a successful message
      $request->session()->flash('danger', 'Bạn chưa kích hoạt tài khoản!');
    }

    return redirect()->route('home');
  }
}
