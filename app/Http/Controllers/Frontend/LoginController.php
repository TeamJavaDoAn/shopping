<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;

class LoginController extends Controller
{
  /**
   * @var UserRepositoryInterface|\App\Repositories\User
   */
  protected $userRepository;

  /**
   * [__construct description]
   * @param UserRepositoryInterface $userRepository [description]
   */
  public function __construct(UserRepositoryInterface $userRepository)
  {
    $this->userRepository = $userRepository;
  }

  /**
   * [login description]
   * @return [type] [description]
   */
  public function login(Request $request)
  {
    try {
      $data = $this->userRepository->checkLogin($request);
      $key  = \Crypt::decrypt($data['password']);
      if($key == $request['password']) {
        // check user not active
        if($data['active'] == 0) {
          // Flash a successful message
          $request->session()->flash('danger', 'Bạn chưa click link kích hoạt tài khoản trong mail!');
          $request->session()->forget($request['username']);
        } else {
          $request->session()->flash('success', 'Bạn đăng nhập thành công!');
          $request->session()->put('user_id', $data->user_id);
          $request->session()->put('username', $request['username']);
        }
      }
    } catch (\Exception $e) {
      // Log error
      \Log::error($e->getMessage());

      // Flash a successful message
      $request->session()->flash('danger', 'Bạn chưa đăng nhập thành công!');
    }

    // Back to list page with flash message
    return redirect()->route('home');
  }
}
